import Modal from "./Modal";

export default class ModalFadeManager {
    modals = [];
    fade = [];
    
    constructor(fade) {
        this.fade = fade;

        let modal_1_el = document.getElementById("modal-tour-booking");
        let modal_2_el = document.getElementById("modal-help-chose-tour");

        let modal_1_trigger_els = [];
        let modal_2_trigger_els = [];

        modal_1_trigger_els = document.getElementsByClassName("m-tour-card__booking-btn");
        modal_2_trigger_els.push(document.getElementById("trigger-modal-help-chose-tour"));

        let modal_1 = new Modal(modal_1_el, modal_1_trigger_els);
        let modal_2 = new Modal(modal_2_el, modal_2_trigger_els);

        this.modals.push(modal_1);
        this.modals.push(modal_2);

        for (let modal of this.modals) {
            for (let trigger_el of modal.trigger_els) {
                trigger_el.addEventListener("click", (e) => { this.fade.open(); });
            }
            
            modal.btn_el.addEventListener("click", (e) => { this.fade.close(); });

            for (let container_el of modal.container_els) {
                container_el.addEventListener("click", (e) => {
                    if (e.target !== container_el) return;    
                    this.fade.close();
                });
            }
        }
    }
}