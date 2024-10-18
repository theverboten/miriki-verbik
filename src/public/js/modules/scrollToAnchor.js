var scrollToAnchor = (function() {

    var config = {
        defaultSelector: 'a.js-scroll, .js-scroll a',
        options: {
            offset: 0, // menu height
            speed: 800
        }
    };

    var init = function () {
        $(config.defaultSelector).click(function(e){
            e.preventDefault();
            if ($(this.hash).length) {
                $('html,body').animate({scrollTop:$(this.hash).offset().top - config.options.offset}, config.options.speed);
            }
        });
    };

    return {
        init: init
    }
})();