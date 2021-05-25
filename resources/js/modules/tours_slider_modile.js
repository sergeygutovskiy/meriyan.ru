import Swiper from 'swiper';

let swiper_container = null;
let swiper_wrapper   = null;
let swiper_slides    = [];
let tours_slider     = null;
let id               = null;

function init(elem_id)
{
    id = elem_id;

    swiper_container = document.getElementById(id);
    swiper_wrapper = swiper_container.childNodes[1];
    swiper_slides = Array.from(swiper_wrapper.childNodes).filter(e => { return e.localName == "div" });
    
    document_resize_listener(id);
    window.addEventListener("resize", document_resize_listener);
}

function add_tours_slider()
{   
    if (swiper_container.classList.contains("swiper-container")) return;

    swiper_container.classList.add("swiper-container");
    swiper_wrapper.classList.add("swiper-wrapper");
    swiper_wrapper.classList.remove("row");

    swiper_slides.forEach(slide => {
        slide.classList.add("swiper-slide");
        slide.classList.remove("col-sm");
    });

    tours_slider = new Swiper("#" + id, {
        slidesPerView: "auto",
        spaceBetween: 24
    });
}

function remove_tours_slider()
{
    if (!swiper_container.classList.contains("swiper-container")) return;

    swiper_container.classList.remove("swiper-container");
    swiper_wrapper.classList.remove("swiper-wrapper");
    swiper_wrapper.classList.add("row");

    swiper_slides.forEach(slide => {
        slide.classList.remove("swiper-slide");
        slide.classList.add("col-sm");
    });

    tours_slider.destroy();
}

function document_resize_listener()
{
    if (document.documentElement.clientWidth < window._grid_breakpoints.sm)
    {
        add_tours_slider();
    }
    else
    {
        remove_tours_slider();
    }
}

export { init };