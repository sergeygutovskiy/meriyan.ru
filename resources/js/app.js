require('./bootstrap');

import Navigation from './includes/Navigation';
import Modal from './includes/Modal';
import Fade from './includes/Fade';
import ModalFadeManager from './includes/ModalFadeManager';
import Form from './includes/Form';

window._grid_breakpoints = {
    xs:  0,
    sm:  576,
    md:  768,
    lg:  992,
    xl:  1200,
    xxl: 1400
};

window.app = {};
window.app.config = {};

window.app.navigation = new Navigation();
window.app.fade = new Fade();
window.app.modal_fade_manager = new ModalFadeManager(window.app.fade);

// init default modals

// 1
let modal_el = document.getElementById("modal-tour-booking");
let modal_trigger_els = document.getElementsByClassName("m-tour-card__booking-btn");
let modal = new Modal(modal_el, modal_trigger_els);

window.app.modal_fade_manager.add_modal(modal);

// init forms

// 1
let footer_form_el = document.getElementById("footer-form");
let footer_form =  null;
if (footer_form_el)
{
    footer_form = new Form(
        footer_form_el,
        "/requests/questions", [
            { name: "name", input: footer_form_el.elements.name },
            { name: "email", input: footer_form_el.elements.email },
            { name: "question", input: footer_form_el.elements.question }
        ]
    );
}

// 2
let booking_form_el = document.getElementById("tour-booking-form");
let booking_form =  null;
if (booking_form_el)
{
    booking_form = new Form(
        booking_form_el,
        "/requests/tour-bookings", [
            { name: "name", input: booking_form_el.elements.name },
            { name: "email", input: booking_form_el.elements.email },
            { name: "phone", input: booking_form_el.elements.phone }
        ]
    );
}
