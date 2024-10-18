// Breakpoints Helper
var breakpointSizes = ['xs', 'sm', 'md', 'lg', 'xl', 'xxl'];
var breakpoint = {
    setValue: function () {
        this.value = getComputedStyle(document.documentElement).getPropertyValue('--breakpoint').trim();
    },
    getValue: function () {
        return this.value;
    },
    is: function (size) {
        return this.value === size;
    },
    only: function (size) {
        return this.is(size);
    },
    up: function (size) {
        return breakpointSizes.indexOf(this.value) >= breakpointSizes.indexOf(size);
    },
    down: function (size) {
        return breakpointSizes.indexOf(this.value) <= breakpointSizes.indexOf(size);
    },
    between: function (sizeMin, sizeMax) {
        return (breakpointSizes.indexOf(this.value) >= breakpointSizes.indexOf(sizeMin)) && (breakpointSizes.indexOf(this.value) <= breakpointSizes.indexOf(sizeMax));
    }
};

$(document).ready( function(){
    breakpoint.setValue();
});

$(window).resize(function () {
    breakpoint.setValue();
});


// Set --vh css variable
window.addEventListener('load', updateVhVariable);
window.addEventListener('resize', updateVhVariable);

function updateVhVariable() {
    var vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', vh + 'px');
}
