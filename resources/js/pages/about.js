import Swiper, { Navigation, Pagination } from 'swiper';
import MobileToursSlider from '../modules/MobileToursSlider';

document.addEventListener("DOMContentLoaded", function(event) { 
    let tours_slider = new MobileToursSlider("tours-slider");

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