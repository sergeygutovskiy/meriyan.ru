import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default class MobileTourSlider {
    id = null;
    
    swiper_container_el = null;
    swiper_wrapper_el = null;
    swiper_slide_els = [];
    
    swiper_slider = null;
    is_swiper_slider_created = false;
    
    constructor(id) {
        this.add_slider_to_dom = this.add_slider_to_dom.bind(this);
        this.remove_slider_from_dom = this.remove_slider_from_dom.bind(this);
        this.on_document_resized = this.on_document_resized.bind(this);

        this.id = id;
        
        this.swiper_container_el = document.getElementById(id);
        this.swiper_wrapper_el = this.swiper_container_el.childNodes[1];
        this.swiper_slide_els = Array.from(this.swiper_wrapper_el.childNodes).filter(e => { return e.localName == "div" });
        
        this.on_document_resized();
        window.addEventListener("resize", this.on_document_resized);
    }

    on_document_resized() {
        if (
            document.documentElement.clientWidth < window._grid_breakpoints.sm
            && !this.is_swiper_slider_created    
        ) {
            this.add_slider_to_dom();
        }
        else if (
            document.documentElement.clientWidth >= window._grid_breakpoints.sm
            && this.is_swiper_slider_created    
        ) {
            this.remove_slider_from_dom();
        }
    }

    add_slider_to_dom() {
        this.is_swiper_slider_created = true;

        this.swiper_container_el.classList.add("swiper-container");
        this.swiper_wrapper_el.classList.add("swiper-wrapper");
        this.swiper_wrapper_el.classList.remove("row");
    
        this.swiper_slide_els.forEach(slide => {
            slide.classList.add("swiper-slide");
            slide.classList.remove("col-sm");
            slide.classList.remove("mb-6");
        });
    
        this.swiper_slider = new Swiper("#" + this.id, {
            slidesPerView: "auto",
            spaceBetween: 24,
            pagination: {
                el: '.m-tours-mobile-slider-pagination',
                bulletClass: 'm-tours-mobile-slider-pagination__item',
                bulletActiveClass: 'm-tours-mobile-slider-pagination__item--active',
                clickable: true
            },
        });
    }

    remove_slider_from_dom() {
        this.is_swiper_slider_created = false;

        this.swiper_container_el.classList.remove("swiper-container");
        this.swiper_wrapper_el.classList.remove("swiper-wrapper");
        this.swiper_wrapper_el.classList.add("row");
    
        this.swiper_slide_els.forEach(slide => {
            slide.classList.remove("swiper-slide");
            slide.classList.add("col-sm");
            slide.classList.add("mb-6");
        });
    
        this.swiper_slider.destroy();
    }
}