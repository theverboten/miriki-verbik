var backToTop = (function() {

    var init = function () {
        
        $('button.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
    }

    return {
        init: init
    }
})();