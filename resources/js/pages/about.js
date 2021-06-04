import Swiper, { Navigation, Pagination } from 'swiper';

const tours_slider_mobile = require("../modules/tours_slider_modile");

document.addEventListener("DOMContentLoaded", function(event) { 
    tours_slider_mobile.init("tours-slider");

    const reviews_slider = new Swiper("#reviews-slider", {
        slidesPerView: 'auto',
        centeredSlides: false,
        loop: true,
        spaceBetween: 24,
        pagination: {
            el: '.reviews-slider-pagination',
            bulletClass: 'reviews-slider-pagination__item',
            bulletActiveClass: 'reviews-slider-pagination__item--active',
            clickable: true
        },
        breakpoints: {
            [window._grid_breakpoints.lg]: {
                slidesPerView: 2,
                centeredSlides: false
            },

            [window._grid_breakpoints.xxl]: {
                slidesPerView: 3,
                centeredSlides: true
            }
        }
    });
});