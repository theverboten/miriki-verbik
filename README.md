# JH boilerplate

**Table of Contents**

- [Quick start](#quick-start)
- [Features](#features)
- [Usage](#usage)
- [Configuration](#configuration)
- [Requirements](#requirements)
- [Changelog](CHANGELOG.md)

## Requirements

- [Node.js](https://nodejs.org) & npm (works on NODE 11.15.0 npm 6.7.0)
- Optionally:
    - Local development server ([XAMPP](https://www.apachefriends.org) / [MAMP](https://www.mamp.info/en/) / [WAMP](http://www.wampserver.com/en/)...)
    - PHP executable location set in the PATH environment variable - [Tutorial](https://www.php.net/manual/en/faq.installation.php#faq.installation.addtopath)

## Quick start
* `mkdir C:\XAMPP\htdocs\PROJECT-NAME` create new project folder on your local server
* `cd C:\XAMPP\htdocs\PROJECT-NAME` navigate to newly created folder
* `git clone https://gitlab.com/USER-NAME/PROJECT-NAME.git .` clone contents of this repository
* `npm install --global gulp-cli` install gulp globaly (first-time)
* `npm install` install all dependencies via npm
*  navigate to `gulp-config.json` and change `project variable` to `PROJECT-NAME`
* `gulp serve` start development server


## Features
* **Blazing fast development**
    * `browsersync` integration
        * live page reloading
        * css injecting
        * remote debugging using Weinre
        * etc.
    * tracking all file changes using `gulp.watch`
    * run multiple instances at the same time (without any extra configuration - automatic port selection)
* **Custom file structure**
    * easily change project structure using gulp-config.json
* **PHP as templating engine**
    * pretty URLs like `localhost:3000/PROJECT-NAME`
    * use imports, conditions etc. as you're used to
    * build with PHP or export as static HTML files using `php2html`
    * prettify code using `js-beautify`
* **SASS compilation**
    * blazing fast compilation using `node-sass`
    * automatic source maps
    * multiple stylesheet support
* **CSS post-processing**
    * autoprefixing using `autoprefixer`
    * minification using `csswring`
    * combining media queries using `css-mqpacker`
    * ~~properties sorting~~ *(coming soon)*
* **JS optimization**
    * minification using `UglifyJS`
    * concatenation for fewer http requests
* **Image optimization**
    * automatic minification using `imagemin`, `pngquant` & `svgo`
    * minify selected images via `tinyPNG` API
    * automagically generate any number of SVG sprites
* **Buildstamps**
    * automatically generated timestamps which can be used for cache busting
* **One-click deployment**
    * to FTP
    * ~~to GIT~~ (deprecated in version 1.5.0)
* **One-click ZIP archive export**
    * quickly export all files as ZIP archive for those colleagues not using GIT or Node
    * export CSS/JS only
* **~~Automatic versioning~~**
    * ~~keeps track of all changes in your project by adding version number to your CSS~~ (deprecated in version 1.5.0)
* **Easy configuration**
    * all options live separate from gulpfile.js for easy updates
    * optional local-config.json (to keep private credentials separate from version control)
* **Nice error handling with native notifications**
    * catch any error using `gulp-plumber` & `gulp-notify`
    * no need to restart local server every time you make a typo in your SASS files


## Usage

### Development
* `gulp serve` starts local server on port 3000, starts watching files & runs tasks based on file changes

### Building
* `gulp build` default build with static HTML
* `gulp build-php` build with PHP
* `gulp build-zip` runs default build + creates ZIP archive

### Individual tasks
* `gulp sass` compile SASS
* `gulp css` process CSS
* `gulp js` process JS
* `gulp svg-sprite` update SVG sprites
* `gulp tinypng` minify images in `path.src.images + /src/` folder
* `gulp clean` delete all build files

### Deployment
* **FTP**
    * `gulp ftp` build with PHP & send to FTP server
    * `gulp ftp-transfer` restart FTP transfer after crash
    * `gulp ftp-del` delete all files from FTP server
* **ZIP archive**
    * `gulp build-zip` runs default build + creates ZIP archive
    * `gulp css-zip` compile SASS, process CSS & create ZIP archive with all CSS files
    * `gulp css-js-zip` same as `gulp css-zip` but adds `custom.js`

### Versioning
* `gulp version-bump-patch` build number bump
* `gulp version-bump-minor` minor version bump
* `gulp version-bump-major` major version bump


## Configuration

**Important:** In order for any configuration changes to take effect restart all running Gulp tasks.

### Options (gulp-config.json)

Main configuration file.

#### project
* Type: `String`

Must be same as the project directory name.

URL should be `localhost/project`

#### version
* Type: `String`
* Default: `0.0.0`

#### wordpress
* Type: `Boolean`
* Default: `false`

Applies WordPress specific settings.

#### autoPostCSS
* Type: `Boolean`
* Default: `false`

Whether to apply post-processing every time SCSS file is saved.

#### minifyCustomJS
* Type: `Boolean`
* Default: `false`

Whether to create custom.min.js

#### buildstamp
* Type: `Boolean`
* Default: `false`

Creates .buildstamp file in the root directory

#### production
* Type: `Boolean`
* Default: `false`

Effects minification settings.

#### path
* Type: `Object`

Example:
```js
{
    "path" : {
        "src" : {                     // source directory
            "base"    : "src",        // path relative to project root
            "sass"    : "sass",       // path to SASS files, relative to base
            "styles"  : "assets/css", // path to CSS files, relative to base
            "images"  : "assets/img", // path to images, relative to base
            "scripts" : "assets/js"   // path to scripts, relative to base
        },
        "build" : {                   // build directory
            "base"    : "dist"
        }
    }
}
```

#### styles
* Type: `Object`
* Default: `{"main" : {"rename" : "style"}}`

Example with multiple stylesheets:
```js
{
    "styles" : {
        "main" : {                           // source file name
            "path"        : "",              // source path, relative to SASS directory
            "rename"      : "style",         // output file name (defaults to source file name)
            "destination" : "src/assets/css" // destination path, relative to project root (defaults to styles directory)
        },
        "stylesheet-2" : {
            "path"        : "",
            "rename"      : "",
            "destination" : ""
        }
    }
}
```

#### scripts
* Type: `Object`

Example with default configuration:
```js
{
    "scripts" : {
        "scripts" : {                               // script ID (currently not used for anything)
            "path" : [                              // required, string/array of paths, relative to project root
                "src/assets/js/libs/*.js",
                "src/assets/js/plugins/*.js",
                "src/assets/js/modules/*.js",
                "!src/assets/js/libs/html5shiv.js",
                "!src/assets/js/libs/jquery*.js"
            ],
            "rename"      : "scripts.js",           // required, output file name
            "destination" : "src/assets/js"         // destination path, relative to project root (defaults to scripts directory)
        },
        "custom" : {
            "path"        : "src/assets/js/custom.js",
            "rename"      : "custom.min.js",
            "destination" : "src/assets/js"
        }
    }
}
```

#### watch
* Type: `Array`

Add extra files to watch task. Any change triggers app reload.

Example:
```js
{
    "watch" : [
        "src/root/**" // full path
    ]
}
```

#### ignoredFiles
* Type: `String/Array`

Files that should be excluded from build process (i.e. very large files that would slow down FTP upload).
Don't forget to add these also to gitignore.

Example:
```js
{
    "ignoredFiles" : [
        "src/assets/videos/large-video.mp4", // full path
        "src/assets/videos/large-video.webm"
    ]
}
```

#### ignoredPHP
*   Type: `String/Array`

PHP files that should be excluded from html2php build process (i.e. helper functions).

Example:
```js
{
    "ignoredPHP" : [
        "src/helper-functions.php", // full path
        "src/another-php-file.php"
    ]
}
```

#### browsersync
* Type: `Object`
* Default: `{"proxy" : "localhost/project_name"}`

Add any custom [Browsersync options](https://browsersync.io/docs/options)

Example:
```js
{
    "browsersync" : {
        "server" : "./src",
        "port"   : 8080
    }
}
```

### Local options (local-config.json)

Optional config file used to keep private login credentials outside source control.

#### ftp
* Type: `Object`

Example:
```js
{
    "ftp" : {
        "host"       : "example.com",
        "user"       : "user_name",
        "pass"       : "password_here",
        "dest"       : "www/", // path relative to server root, defaults to project name
        "destSuffix" : ""      // i.e. ".example.com" to create subdomain
    }
}
```

#### tinyPNG
* Type: `Object`

Example:
```js
{
    "tinyPNG" : {
        "APIkey": ""
    }
}
```

#### browsersync
* Type: `Object`

Rewrites the browsersync config in gulp-config.json. Useful for alternative dev environments like Laravel Valet.

Example:
```js
{
    "browsersync" : {
        "proxy" : "example.test"
    }
}
```
