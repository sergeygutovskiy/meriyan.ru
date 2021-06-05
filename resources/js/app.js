require('./bootstrap');
import NavigationModule from './includes/navigation';


window._grid_breakpoints = {
    xs:  0,
    sm:  576,
    md:  768,
    lg:  992,
    xl:  1200,
    xxl: 1400
};

document.addEventListener("DOMContentLoaded", function(event) { 
    NavigationModule.init();
});