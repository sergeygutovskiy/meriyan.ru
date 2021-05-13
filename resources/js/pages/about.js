const { default: Swiper } = require("swiper");

var tours = null;

function add_tours_slider()
{   
    if (tours != null) return;


    let swiper_container = document.getElementById("tours");
    swiper_container.classList.add("swiper-container");

    let swiper_wrapper = swiper_container.childNodes[1];
    swiper_wrapper.classList.add("swiper-wrapper");
    swiper_wrapper.classList.remove("row");

    for (let i = 0; i < swiper_wrapper.children.length; i++)
    {
        swiper_wrapper.childNodes[i * 2 + 1].classList.add("swiper-slide");
    }

    tours = new Swiper("#tours", {
        slidesPerView: "auto",
        spaceBetween: 24
    });
}

function remove_tours_slider()
{
    if (tours == null || tours.destroyed) return;

    let swiper_container = document.getElementById("tours");
    swiper_container.classList.remove("swiper-container");

    let swiper_wrapper = swiper_container.childNodes[1];
    swiper_wrapper.classList.remove("swiper-wrapper");
    swiper_wrapper.classList.add("row");

    for (let i = 0; i < swiper_wrapper.children.length; i++)
    {
        swiper_wrapper.childNodes[i * 2 + 1].classList.remove("swiper-slide");
    }

    tours.destroy();
    tours = null;
}

if (window.innerWidth < window._grid_breakpoints.sm)
{
    add_tours_slider();
}

window.addEventListener("resize", function () {
    if (window.innerWidth < window._grid_breakpoints.sm)
    {
        add_tours_slider();
    }
    else
    {
        remove_tours_slider();
    }
});