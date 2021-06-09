export default class Navigation {
    pc_el = null;
    
    mobile_el = null;
    mobile_dropdown_el = null;
    mobile_btn_el = null;

    is_dropdown_opened = false;

    current_scroll = null;

    constructor() {
        this.pc_el = document.getElementById("navigation");
        this.mobile_el = document.getElementById("navigation-mobile");

        this.mobile_dropdown_el = this.mobile_el.getElementsByClassName("navigation-mobile__dropdown-wrapper")[0];
        this.mobile_btn_el = this.mobile_el.getElementsByClassName("navigation-mobile__menu-button")[0];
    
        this.mobile_btn_el.addEventListener("click", (e) => {
            this.is_dropdown_opened ? this.close_dropdown() : this.open_dropdown();
        });

        this.current_scroll = window.scrollY;

        window.addEventListener("scroll", (e) => {    
            if (this.current_scroll > window.scrollY)
            {
                this.pc_el.classList.remove("hide");
                this.mobile_el.classList.remove("hide");
            }
            else if (this.current_scroll < window.scrollY)
            {
                this.pc_el.classList.add("hide");
                this.mobile_el.classList.add("hide");
            }

            this.current_scroll = window.scrollY;
        });
    }

    open_dropdown() {
        this.mobile_el.classList.add("active");
        this.mobile_btn_el.classList.add("active");

        setTimeout(() => {
            this.mobile_dropdown_el.classList.add("active");
        
            this.is_dropdown_opened = true;
        }, 200);
    }

    close_dropdown() {        
        this.mobile_dropdown_el.classList.remove("active");
        this.mobile_btn_el.classList.remove("active");
        
        setTimeout(() => {
            this.mobile_el.classList.remove("active");
        
            this.is_dropdown_opened = false;
        }, 200);
    }
}
