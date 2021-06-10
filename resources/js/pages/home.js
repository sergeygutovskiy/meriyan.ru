import Modal from '../includes/Modal';
import MobileTourSlider from '../modules/MobileToursSlider';

// const tours_slider_mobile = require("../modules/tours_slider_modile");

document.addEventListener("DOMContentLoaded", function(event) { 
    // tours_slider_mobile.init("tours-slider");

    // init mobile tours sldier

    let tours_slider = new MobileTourSlider("tours-slider");

    // init modals

    // 1
    let modal_el = document.getElementById("modal-help-chose-tour");
    let modal_trigger_els = [document.getElementById("trigger-modal-help-chose-tour")];
    let modal = new Modal(modal_el, modal_trigger_els);

    window.app.modal_fade_manager.add_modal(modal);
});