//================================================================================
// Import Dependencies
//================================================================================

// Include config file
var config = require('./gulp-config.json');

// Load Gulp & plugins
var gulp  = require('gulp'),
    fs    = require('fs'),
    path  = require('path'),
    merge = require('merge-stream'),
    $     = require('gulp-load-plugins')({
        pattern: '*'
    });



//================================================================================
// Variables & Configuration
//================================================================================

// Paths
var separator          = config.path.src.base ? '/' : '',
    srcDir             = config.path.src.base + separator,
    buildDir           = config.path.build.base,
    sassDir            = srcDir + config.path.src.sass,
    cssDir             = srcDir + config.path.src.styles,
    imgDir             = srcDir + config.path.src.images,
    jsDir              = srcDir + config.path.src.scripts,
    buildstampPath     = '.buildstamp';


// Variables
var version            = config.version,
    versionIDs         = version.split('.'),
    preventVersionBump = false,
    isProduction       = config.production,
    isDev              = !isProduction;


// Exclude files from build folder
var excludeFromBuild = [
    config.ignoredFiles,
    srcDir + '*.php', // php files in src directory
    '{' + srcDir + 'includes,' + srcDir + 'includes/**}', // php includes
    '{' + imgDir + '/svg,' + imgDir + '/svg/**}', // svg sprite source directory
    '{' + imgDir + '/TinyPNG,' + imgDir + '/TinyPNG/**}', // TinyPNG directory
    '{' + jsDir + '/plugins,' + jsDir + '/plugins/**}', // js plugins directory
    '{' + jsDir + '/modules,' + jsDir + '/modules/**}', // js modules directory
    '{' + sassDir + ',' + sassDir + '/**}', // sass files
    '{node_modules,node_modules/**}', // node modules
    'package.json', // package.json
    'gulpfile.js', // gulpfile
    'gulp-config.json', // gulp config file
    'local-config.json', // local config file
    '*.sublime-project', // sublime project file
    '*.sublime-workspace', // sublime workspace file
    'TODO.md', // To-Do list
    'TODO.txt', // To-Do list (legacy)
    'README.md', // readme file
    '*.gitignore', // gitignore
    '{.vscode,.vscode/**}', // VS Code config
];


// Exclude files from PHP build
var excludeFromPhpBuild = [
    config.ignoredFiles,
    ''
];


// Exclude PHP files from HTML build
var excludeFromHtmlBuild = [
    config.ignoredPHP,
    srcDir + 'header.php',
    srcDir + 'footer.php'
];


// Watch extra folders
var watchedFiles = [
    config.watch,
    srcDir + 'root/**'
];


// Styles
var styles = config.styles;
var stylesheets = [];
var stylesheetSourceMaps = [];

if( !styles ){
    styles = {
        "main" : {
            "path"        : "",
            "rename"      : "style",
            "destination" : cssDir
        }
    }
}

for(var style in styles) {
    var stylesheetPath = styles[style]['destination'] ? styles[style]['destination'] : cssDir;
    var stylesheetName = styles[style]['rename'] ? styles[style]['rename'] : style;

    stylesheets.push(stylesheetPath + '/' + stylesheetName + '.css');
    stylesheetSourceMaps.push(stylesheetPath + '/' + stylesheetName + '.css.map');
}


// Scripts
var scripts = config.scripts;
var processedScripts = [];

if( !scripts ){
    scripts = {
        "scripts" : {
            "path" : [
                jsDir + "/libs/*.js",
                jsDir + "/plugins/*.js",
                jsDir + "/modules/*.js",
                "!./" + jsDir + "/libs/html5shiv.js",
                "!./" + jsDir + "/libs/jquery*.js"
            ],
            "rename"      : "scripts.js",
            "destination" : jsDir
        }
    }
}

if( config.minifyCustomJS ){
    scripts = Object.assign( {}, scripts, {
        "custom" : {
            "path"        : jsDir + "/custom.js",
            "rename"      : "custom.min.js",
            "destination" : jsDir
        }
    });
} else{
    processedScripts.push(jsDir + '/custom.js');
}

for(var script in scripts) {
    processedScripts.push(scripts[script]['destination'] + '/' + scripts[script]['rename']);
}


// Autoprefixer config
var autoprefixerConfig = {
    browsers: ['last 2 versions', '> 1%', 'IE 11'],
    cascade: false,
    remove: false
};


// Local config
try {
    var localConfig = require('./local-config.json');
} catch (error) {
    var localConfig = config;
    console.log('WARNING: Local configuration file not found. Some tasks may not function.');
}


// Browsersync config
var browsersyncConfig = {
    online: false,
    notify: {
        styles: {
            top: 'auto',
            bottom: '0',
            borderBottomLeftRadius: '0',
            borderTopLeftRadius: '5px',
        }
    }
};

if( localConfig.browsersync ){
    browsersyncConfig = Object.assign( {}, localConfig.browsersync, browsersyncConfig );
} else if( config.browsersync ){
    browsersyncConfig = Object.assign( {}, config.browsersync, browsersyncConfig );
} else{
    browsersyncConfig = Object.assign( {}, {proxy: 'localhost/' + config.project}, browsersyncConfig );
}


// FTP config
if( localConfig.ftp ){
    var ftpConfig = {
        host: localConfig.ftp.host,
        user: localConfig.ftp.user,
        password: localConfig.ftp.pass,
        parallel: 10,
        log: $.util.log
    };
    var ftpDestination = localConfig.ftp.dest === '' ? config.project + localConfig.ftp.destSuffix : localConfig.ftp.dest + localConfig.ftp.destSuffix;
}



//================================================================================
// Helper Functions
//================================================================================

// Get list of subdirectories
function getFolders(dir) {
    return fs.readdirSync(dir)
    .filter(function(file) {
        return fs.statSync(path.join(dir, file)).isDirectory();
    });
}

function buildstamp(path){
    var buildstamp = {};
    path = path.replace(srcDir, '');

    if (fs.existsSync(buildstampPath)) {
        buildstamp = JSON.parse(fs.readFileSync(buildstampPath), 'utf8');
    }

    buildstamp[path] = Date.now().toString();

    // console.log(JSON.stringify(buildstamp, null, 4));
    return fs.writeFileSync(buildstampPath, JSON.stringify(buildstamp));
}

//================================================================================
// Individual Tasks
//================================================================================

// Prevent start if source directory doesn't exist.
if( srcDir != '' && !fs.existsSync(srcDir) ){
    throw new Error('Source directory doesn\'t exist!');
}



// Buildstamp
gulp.task('buildstamp', function(cb){
    fs.writeFile(buildstampPath, JSON.stringify(buildstamp), cb);
});

// Build
gulp.task('build', ['css', 'js'], function(cb){
    $.runSequence('create-build-dir', 'php2html', ['prettify-html', 'optimize-images'], cb);
});

// Build with PHP
gulp.task('build-php', ['css', 'js'], function(cb){
    $.runSequence('create-build-dir', ['add-php', 'optimize-images'], cb);
});

// ZIP build
gulp.task('build-zip', ['build'], function(){
    var archiveName = config.project + '_build_v.' + version + '.zip';
    return gulp.src([
        buildDir + '/**',
        buildDir + '/.htaccess']
    )
    .pipe($.zip(archiveName))
    .pipe(gulp.dest(buildDir))
    .pipe($.notify({title: 'ZIP created', message: archiveName + ' was successfully created', sound: true}));
});

// ZIP css
gulp.task('css-zip', ['delete-build-dir', 'css'], function(){
    var files = stylesheets.concat(stylesheetSourceMaps);
    var archiveName = config.project + '_css_v.' + version + '.zip';
    return gulp.src(files)
    .pipe($.zip(archiveName))
    .pipe(gulp.dest(buildDir))
    .pipe($.notify({title: 'ZIP created', message: archiveName + ' was successfully created', sound: true}));
});

// ZIP css + js
gulp.task('css-js-zip', ['delete-build-dir', 'css', 'js'], function(){
    var files = stylesheets.concat(stylesheetSourceMaps, processedScripts);
    var archiveName = config.project + '_css+js_v.' + version + '.zip';
    return gulp.src(files)
    .pipe($.zip(archiveName))
    .pipe(gulp.dest(buildDir))
    .pipe($.notify({title: 'ZIP created', message: archiveName + ' was successfully created', sound: true}));
});

// Delete build directory
gulp.task('delete-build-dir', function(){
    return $.del.sync([
        buildDir,
        config.project + '_**.zip'
    ], {force: true});
});

// Create build directory
gulp.task('create-build-dir', ['delete-build-dir'], function(){
    return gulp.src([
        srcDir + '**/*', // copy all files except:
        '!{' + excludeFromBuild.join() + '}'
    ])
    .pipe(gulp.dest(buildDir));
});

// Add php files
gulp.task('add-php', function(){
    return gulp.src([
        srcDir + '*.php',
        '{' + srcDir + 'includes,' + srcDir + 'includes/**}',
        srcDir + '.htaccess',
        '!{' + excludeFromPhpBuild.join() + '}'
    ])
    .pipe(gulp.dest(buildDir));
});

// PHP to HTML
gulp.task('php2html', function(){
    return gulp.src([
        srcDir + '*.php', // process all PHP files except:
        '!{' + excludeFromHtmlBuild.join() + '}'
    ])
    .pipe($.php2html())
    .pipe(gulp.dest(buildDir));
});

// Prettify HTML
gulp.task('prettify-html', function() {
    return gulp.src(buildDir + '/**/*.html')
    .pipe($.jsbeautifier())
    .pipe(gulp.dest(buildDir));;
});



// Compile SASS
gulp.task('sass', function (cb) {

    var doneCounter = 0;
    function incDoneCounter() {
        doneCounter += 1;
        if (doneCounter >= Object.keys(styles).length) {
            cb();
        }
    }

    for (var style in styles) {
        if( config.autoPostCSS ){
            process_css(style, styles[style]['path'], styles[style]['rename'], styles[style]['destination'], incDoneCounter);
        } else{
            process_sass(style, styles[style]['path'], styles[style]['rename'], styles[style]['destination'], incDoneCounter);
        }
    }
});

function process_sass(sourceFileName, sourcePath = '', rename = '', destination = cssDir, cb = ()=>{}){
    sourcePath = sourcePath ? sassDir + '/' + sourcePath + '/' + sourceFileName + '.scss' : sassDir + '/' + sourceFileName + '.scss';
    rename = rename ? rename : sourceFileName;

    return gulp.src(sourcePath)
    .pipe($.plumber(function(error) {
        $.notify.onError({title: "SCSS Error", message: error.message, sound: true})(error);
        this.emit('end');
    }))
    .pipe($.sourcemaps.init())
    .pipe($.sass({
        sourceMap: true,
        sourceComments: false,
        outputStyle: 'expanded',
        indentWidth: 4
    }))
    .pipe($.rename({basename: rename}))
    .pipe($.sourcemaps.write('.', {includeContent: false, sourceRoot:'http://localhost/' + config.project + '/' + sassDir}))
    .pipe(gulp.dest(destination))
    .on('end', function(){
        if (config.buildstamp) {
            buildstamp(destination + '/' + rename + '.css');
        }
        cb();
    });
}

// Process CSS
gulp.task('css', function(cb){

    var doneCounter = 0;
    function incDoneCounter() {
        doneCounter += 1;
        if (doneCounter >= Object.keys(styles).length) {
            cb();
        }
    };

    for (var style in styles) {
        process_css(style, styles[style]['path'], styles[style]['rename'], styles[style]['destination'], incDoneCounter);
    }
});

function process_css(sourceFileName, sourcePath = '', rename = '', destination = cssDir, cb = ()=>{}){
    sourcePath = sourcePath ? sassDir + '/' + sourcePath + '/' + sourceFileName + '.scss' : sassDir + '/' + sourceFileName + '.scss';
    rename = rename ? rename : sourceFileName;

    var processors_development = [
        $.autoprefixer(autoprefixerConfig),
    ];
    var processors_production = [
        $.autoprefixer(autoprefixerConfig),
        $.cssMqpacker,
        $.csswring({
            preserveHacks: true
        })
    ];
    var devComment = ['/*!', 'Project: ' + config.project, 'Version: ' + version, '*/', ''].join('\n');

    return gulp.src(sourcePath)
    .pipe($.plumber(function(error) {
        $.notify.onError({title: "SCSS Error", message: error.message, sound: true})(error);
        this.emit('end');
    }))
    .pipe($.if(isDev, $.sourcemaps.init()))
    .pipe($.sass({
        sourceMap: true,
        sourceComments: false,
        outputStyle: 'expanded',
        indentWidth: 4
    }).on('error', $.sass.logError))
    .pipe($.rename({basename: rename}))
    .pipe($.if(isProduction, $.postcss(processors_production), $.postcss(processors_development)))
    .pipe($.header(devComment))
    .pipe($.if(isDev, $.sourcemaps.write('.')))
    .pipe(gulp.dest(destination))
    .on('end', function(){
        if (config.buildstamp) {
            buildstamp(destination + '/' + rename + '.css');
        }
        cb();
    });
}



// Process JS
gulp.task('js', function(cb){

    var doneCounter = 0;
    function incDoneCounter() {
        doneCounter += 1;
        if (doneCounter >= Object.keys(scripts).length) {
            cb();
        }
    };

    for (var script in scripts) {
        process_js(scripts[script]['path'], scripts[script]['rename'], scripts[script]['destination'], incDoneCounter);
    }
});

function process_js(path, rename, destination = jsDir, cb = ()=>{}){
    return gulp.src(path)
    .pipe($.plumber(function(error) {
        $.notify.onError({title: "JS Error", message: error.message, sound: true})(error);
        this.emit('end');
    }))
    .pipe($.concat(rename))
    .pipe($.uglify())
    .pipe(gulp.dest(destination))
    .on('end', function(){
        if (config.buildstamp) {
            buildstamp(destination + '/' + rename);
        }
        cb();
    });
}



// Optimize images
gulp.task('optimize-images', function(){
    var path = buildDir + '/' + config.path.src.images;
    return gulp.src(path + '/**/*.+(png|jpg|gif|svg|ico)')
    .pipe($.imagemin({
        progressive: true,
        svgoPlugins: [
            {removeViewBox: false},
            {cleanupIDs: false}
        ],
    }))
    .pipe(gulp.dest(path));
});

// Minify images with tinyPNG
gulp.task('tinypng', function () {
    gulp.src(imgDir + '/TinyPNG/*.{png,jpg,jpeg}')
    .pipe($.tinypngCompress({
        key: localConfig.tinyPNG.APIkey,
        checkSigs: true,
        sigFile: imgDir + '/TinyPNG/.tinypng-sigs',
        log: true,
        summarize: true
    }))
    .pipe(gulp.dest(imgDir + '/TinyPNG/minified'));
});



// Create SVG sprites
function spriteConfig(prefix){
    var fileName = prefix ? prefix + '-sprite.svg' : 'sprite.svg';

    var svgSpriteConfig = {
        shape: {
            id: {
                separator: '-',
            }
        },
        mode: {
            symbol: {
                dest: '.',
                prefix: '%s',
                sprite: fileName,
            }
        }
    };

    return svgSpriteConfig;
}

gulp.task('svg-sprite', function(){
    var folders = getFolders(imgDir + '/svg');

    var tasks = folders.map(function(folder) {
        return gulp.src(path.join(imgDir + '/svg', folder, '/**/*.svg'))
        .pipe($.svgSprite(spriteConfig(folder)))
        .pipe(gulp.dest(imgDir));
    });

    var root = gulp.src(imgDir + '/svg/*.svg')
        .pipe($.svgSprite(spriteConfig()))
        .pipe(gulp.dest(imgDir));

    return merge(tasks, root);
});



// Init Browser Sync
var bs = $.browserSync.create(config.project);
gulp.task('browser-sync', function(cb){
    bs.init(browsersyncConfig, cb);
});

// Inject CSS
gulp.task('inject-css', function () {
    return gulp.src(stylesheets)
    .pipe(bs.stream());
});

// Reload page
gulp.task('reload-page', function () {
    bs.reload();
});



// Deploy to FTP
gulp.task( 'ftp', function (cb){
    $.runSequence('build-php', 'ftp-transfer', cb);
});

gulp.task( 'ftp-transfer', function (){
    var ftp = $.vinylFtp.create(ftpConfig);

    return gulp.src([buildDir + '/**', buildDir + '/.htaccess'], { base: './' + buildDir, buffer: false })
    .pipe($.plumber(function(error) {
        $.notify.onError({title: "FTP Error", message: error.message, sound: true})(error);
        this.emit('end');
    }))
    .pipe(ftp.newerOrDifferentSize(ftpDestination))
    .pipe(ftp.dest(ftpDestination))
    .pipe($.notify({title: 'Upload finished', message: config.project + ' was successfully uploaded', sound: true, onLast: true}));
});

// Delete from FTP
gulp.task('ftp-del', function (cb){
    var ftp = $.vinylFtp.create(ftpConfig);

    ftp.rmdir(ftpDestination, cb);
});



// Versioning
gulp.task('version-bump-patch', function(){
    if(!preventVersionBump){
        preventVersionBump = false;
        version = versionIDs[0] + '.' + versionIDs[1] + '.' + (parseInt(versionIDs [2]) + 1);

        gulp.src('./gulp-config.json')
        .pipe($.bump({type:'patch'}))
        .pipe(gulp.dest('./'));
    }
});

gulp.task('version-bump-minor', function(){
    version = versionIDs[0] + '.' + (parseInt(versionIDs[1]) + 1) + '.0';

    gulp.src('./gulp-config.json')
    .pipe($.bump({type:'minor'}))
    .pipe(gulp.dest('./'));
});

gulp.task('version-bump-major', function(){
    version = (parseInt(versionIDs[0]) + 1) + '.0.0';

    gulp.src('./gulp-config.json')
    .pipe($.bump({type:'major'}))
    .pipe(gulp.dest('./'));
});



// Watch Task
gulp.task('watch', ['sass', 'js', 'browser-sync'], function(){

    // Watch SCSS files
    gulp.watch(sassDir + '/**/*.scss', ['sass']).on('change', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });

    // Watch CSS files
    gulp.watch(stylesheets, ['inject-css']);

    // Watch JS files
    gulp.watch(processedScripts, ['reload-page']);

    for (var script in scripts) {
        (function(script) {
            gulp.watch(scripts[script]['path'], function() {
                process_js(scripts[script]['path'], scripts[script]['rename'], scripts[script]['destination']);
            }).on('change', function(event) {
                console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
            });
        })(script);
    }

    // Watch image files
    gulp.watch([
        imgDir + '/**',
        '!' + imgDir + '/svg/**',
        '!' + imgDir + '/TinyPNG/**',
        '!' + imgDir + '/icons/**', // legacy
        '!' + imgDir + '/sprites/**' // legacy
    ], ['reload-page']);
    gulp.watch(imgDir + '/TinyPNG/*.*', ['tinypng']);
    gulp.watch(imgDir + '/svg/**/*.svg', ['svg-sprite']);

    // Watch HTML & PHP files
    gulp.watch([
        srcDir + '**/*.+(html|php|latte)',
        '!' + buildDir + '/**'
    ], ['reload-page']);

    // Watch other files & directories
    gulp.watch('{' + watchedFiles.join() + '}', ['reload-page']);
});



//================================================================================
// Aliases
//================================================================================
gulp.task('default', ['watch']);
gulp.task('serve', ['watch']);
gulp.task('clean', ['delete-build-dir']);