var dotAnimation = (function() {

    var init = function () {
        
        // Dots animation
        gsap.registerPlugin(ScrollTrigger);

        ScrollTrigger.defaults({
            markers: false,
            toggleActions: 'play complete reverse reset',
            scrub: 1,
        })

        const ballAnimationStart = $('.ball-wrapper');

        if (ballAnimationStart.length) {
            
            const tl = new gsap.timeline;
            
            var target1Y = $('.dottarget1 .dotted').offset().top;
            var target1X = "+=" + $('.dottarget1 .dotted').offset().left;
            var target2Y = $('.dottarget2 .dotted').offset().top;
            var target2X = "+=" + $('.dottarget2 .dotted').offset().left;
            var target3Y = $('.dottarget3 .dotted').offset().top;
            var target3X = "+=" + $('.dottarget3 .dotted').offset().left;
            
            tl.from(ballAnimationStart, {opacity: 1})
            
            tl.to('.dot1', 1.5, {y: target1Y, ease:Bounce.easeOut})
            .to('.dot1', 2.5, {x: target1X,  left: 0, top: 0, scale: 1}, "-=1.55")
            .to('.dot2', 1.5, {y: target2Y, ease:Bounce.easeOut}, ">-1.55")
            .to('.dot2', 2.5, {x: target2X, left: 0, top: 0}, ">-1.55")
            .to('.dot3', 1.5, {y: target3Y, ease:Bounce.easeOut}, ">-1.55")
            .to('.dot3', 2.5, {x: target3X, left: 0, top: 0}, ">-1.55");
        }
    }

    return {
        init: init
    }
})();