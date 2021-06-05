function init()
{
    let current_scroll = window.scrollY;
 
    const navigation_el = document.getElementsByClassName("navigation")[0];
    const navigation_mobile_el = document.getElementsByClassName("navigation-mobile")[0];
    const navigation_mobile_dropdown_el = document.getElementsByClassName("navigation-mobile__dropdown-wrapper")[0];
    const navigation_mobile_btn_el = document.getElementsByClassName("navigation-mobile__menu-button")[0];
    
    navigation_mobile_btn_el.addEventListener("click", function() {
        this.classList.toggle("active");

        if (this.classList.contains("active"))
        {
            navigation_mobile_el.classList.toggle("active");
            setTimeout(() => {
                navigation_mobile_dropdown_el.classList.toggle("active");
            }, 200);
        }
        else
        {
            navigation_mobile_dropdown_el.classList.toggle("active");
            setTimeout(() => {
                navigation_mobile_el.classList.toggle("active");
            }, 200);
        }
    });

    window.addEventListener("scroll", function () {    
        if (current_scroll > window.scrollY)
        {
            navigation_el.classList.remove("hide");
            navigation_mobile_el.classList.remove("hide");
        }
        else if (current_scroll < window.scrollY)
        {
            navigation_el.classList.add("hide");
            navigation_mobile_el.classList.add("hide");
        }

        current_scroll = window.scrollY;
    });
}

export default { init }