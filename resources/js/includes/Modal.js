export default class Modal {
    el = null;
    btn_el = null;
    trigger_els = [];
    container_els = [];

    constructor(el, trigger_els) {
        this.el = el;
        this.btn_el = this.el.getElementsByClassName("m-modal__close-btn")[0];
    
        this.btn_el.addEventListener("click", (e) => {
            this.close();
        });
    
        this.trigger_els = trigger_els;
        for (let trigger_el of trigger_els) {
            trigger_el.addEventListener("click", (e) => {
                e.preventDefault();

                this.open();
            });
        }

        this.container_els = this.el.getElementsByClassName("m-modal__fade-container");
        for (let container_el of this.container_els) {
            container_el.addEventListener("click", (e) => {
                if (e.target !== container_el) return;
                
                this.close();
            });
        }
    }

    open() {
        this.el.classList.add("active");
    }

    close() {
        this.el.classList.remove("active");
    }

    set_trigger_els(trigger_els) {
        this.trigger_els = trigger_els;
        for (let trigger_el of trigger_els) {
            trigger_el.addEventListener("click", (e) => {
                e.preventDefault();

                this.open();
            });
        }
    }
}


// let modal_el = null;
// let modal_close_btn_el = null;

// window.modals = [];

// function init(el) {
//     modal_el = el;
//     modal_close_btn_el = el.getElementsByClassName("m-modal__close-btn")[0];

//     modal_close_btn_el.addEventListener("click", function() {
//         close();
//         window.fade.close();
//     });

//     let fade_container_els = modal_el.getElementsByClassName("m-modal__fade-container");

//     for (let fade_container_el of fade_container_els) {
//         fade_container_el.addEventListener("click", function(e) {
//             if (e.target !== this) return;
            
//             close();
//             window.fade.close();
//         });
//     }

//     window.modals[modal_el.id] = {
//         open,
//         close
//     }
// }

// function open() {
//     modal_el.classList.add("active");
// }

// function close() {
//     console.log(1);
//     console.log(modal_el);
//     modal_el.classList.remove("active");
// }