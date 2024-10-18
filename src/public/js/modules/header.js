var header = (function() {

    var menuWrapper = $('#header-mobile'),
        menu = $('.menu-mobile'),
        header = $('#header'),
        menuExpander = $('#header-expander');

    var config = {
        options: {
            expandedClass: 'is-expanded',
            scrolledClass: 'is-scrolled',
            mobileBreakpoint: 'md',
            speed: 300
        }
    };

    var refresh = function () {
        if (breakpoint.down(config.options.mobileBreakpoint)) {
            menu.hide();
        } else {
            menu.show();
        }

        menuWrapper.removeClass(config.options.expandedClass);
    };

    var toggle = function () {
        menuWrapper.toggleClass(config.options.expandedClass);
        menu.slideToggle(config.options.speed);
    };

    var open = function () {
        if( !menuWrapper.hasClass(config.options.expandedClass) ){
            menu.slideDown(config.options.speed);
            menuWrapper.addClass(config.options.expandedClass);
        }
    };

    var close = function () {
        if( menuWrapper.hasClass(config.options.expandedClass) ){
            menu.slideUp(config.options.speed);
            menuWrapper.removeClass(config.options.expandedClass);
        }
    };

    var bindFunctions = function() {
        // open/close
        menuExpander.click(function() {
            toggle();
        });

        // close with clicking on body
        $('body').click(function(){
            close();
        });

        menuWrapper.click(function(e){
            e.stopPropagation();
        });

        // close with escape
        $(document).keyup(function(e) {
            if( menuWrapper.hasClass(config.options.expandedClass) && e.keyCode === 27 ){ // escape
                close();
            }
        });

        // scroll
        if(config.options.scrolledClass){
            $(window).scroll(function() {
                var scroll = $(window).scrollTop(),
                    scrollOffset = 0;

                if( scroll > scrollOffset ) {
                    header.addClass(config.options.scrolledClass);
                } else {
                    header.removeClass(config.options.scrolledClass);
                }
            });
        }

        // on ready & resize
        refresh();

        $(window).resize(function () {
            refresh();
        });
    };

    var init = function () {
        bindFunctions();
        refresh();
    };

    return {
        init: init,
        refresh: refresh,
        open: open,
        close: close,
        toggle: toggle
    }
})();
