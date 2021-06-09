require('./bootstrap');
import Navigation from './includes/Navigation';
import Modal from './includes/Modal';
import Fade from './includes/Fade';
import ModalFadeManager from './includes/ModalFadeManager';

window._grid_breakpoints = {
    xs:  0,
    sm:  576,
    md:  768,
    lg:  992,
    xl:  1200,
    xxl: 1400
};

document.addEventListener("DOMContentLoaded", function(e) { 
    
    window.app = {};
    window.app.config = {};

    window.app.navigation = new Navigation();
    window.app.fade = new Fade();
    window.app.modal_fade_manager = new ModalFadeManager(window.app.fade);

    // window.app.navigation = new Navigation();
    
    // Navigation.init();
    // init_modals();    
    // init_help_chose_tour_modal();
    // init_tour_booking_modal();
});

function init_modals() {
    let modals_el = document.getElementsByClassName("m-modal");
    
    window.modals = [];

    for (let modal_el of modals_el) {
        window.modals[modal_el.id] = new Modal(modal_el);
    }
}

function init_help_chose_tour_modal() {
    let modal_el = document.getElementById("modal-help-chose-tour");
    let modal_close_btn_el = modal_el.getElementsByClassName("m-modal__close-btn")[0];
    let modal_trigger_el = document.getElementById("trigger-modal-help-chose-tour");

    modal_trigger_el.addEventListener("click", function(e) {
        e.preventDefault();

        window.active_modal = modal_el;

        modal_el.classList.add("active");
        window.fade.open();
    });

    // modal_close_btn_el.addEventListener("click", function() {
    //     modal_el.classList.remove("active");
    //     window.fade.close();
    // });
}

function init_tour_booking_modal() {
    let tours_cards = document.getElementsByClassName("m-tour-card");
    
    let modal_el = document.getElementById("modal-tour-booking");    
    let modal_close_btn_el = modal_el.getElementsByClassName("m-modal__close-btn")[0];

    // modal_close_btn_el.addEventListener("click", function() {
    //     modal_el.classList.remove("active");
    //     window.fade.close();
    // });

    for (let card of tours_cards) {
        let link = card.getElementsByClassName("m-tour-card__booking-btn")[0];
        link.addEventListener("click", function(e) {
            e.preventDefault();

            window.active_modal = modal_el;

            modal_el.classList.add("active");
            window.fade.open();
        });
    }
}