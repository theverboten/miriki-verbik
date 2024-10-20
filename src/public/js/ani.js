

// ================================================
//     GSAP
// ================================================

// reveal animations
function animateFrom(elem, direction, index) {
    direction = direction || 1;
    var x = 0,
        y = direction * 100;
    if(elem.classList.contains("gs_reveal_fromLeft")) {
      x = -100;
      y = 0;
    } else if (elem.classList.contains("gs_reveal_fromRight")) {
      x = 100;
      y = 0;
    }
    elem.style.transform = "translate(" + x + "px, " + y + "px)";
    elem.style.opacity = "0";
    gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
      duration: 1.35,
      delay: 0.08 + (0.08 * index),
      x: 0,
      y: 0, 
      autoAlpha: 1, 
      ease: "expo", 
      overwrite: "auto",
    });
  }
  function hide(elem) {
    gsap.set(elem, {autoAlpha: 0});
  }
  
  document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray(".gs_reveal").forEach(function(elem, index) {
      hide(elem); // assure that the element is hidden when scrolled into view
      ScrollTrigger.create({
        trigger: elem,
        scrub: .8,
        once: true,
        //markers: true,
        onEnter: function() { animateFrom(elem, "", index) }, 
        // onEnterBack: function() { animateFrom(elem, -1) },
        // onLeave: function() { hide(elem) } // assure that the element is hidden when scrolled into view
      });
    });
  });