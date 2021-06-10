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

document.addEventListener("DOMContentLoaded", function(e) { 
    
    window.app = {};
    window.app.config = {};

    window.app.navigation = new Navigation();
    window.app.fade = new Fade();
    window.app.modal_fade_manager = new ModalFadeManager(window.app.fade);

    // init default modals

    // 1
    let modal_el = document.getElementById("modal-help-chose-tour");
    let modal_trigger_els = document.getElementsByClassName("m-tour-card__booking-btn");
    let modal = new Modal(modal_el, modal_trigger_els);
    
    window.app.modal_fade_manager.add_modal(modal);

    // let form1 = new Form("form-help-chose-tour", function(event, form) {
    //     console.log(form.elements);

    //     axios.post('/requests/tour-selections', {
    //         name: form.elements.name.value,
    //         phone: form.elements.phone.value,
    //         email: form.elements.email.value,
    //         wishes: form.elements.wishes.value
    //     })
    //     .then(function (response) {
    //         console.log(response);
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // });
});