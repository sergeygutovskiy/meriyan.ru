import Form from '../includes/Form';
import Modal from '../includes/Modal';
import MobileToursSlider from '../modules/MobileToursSlider';

document.addEventListener("DOMContentLoaded", function(event) { 
    // init header's learn more button for smooth scrolling to first section
    
    let learn_more_btn = document.body.getElementsByTagName("header")[0];
    learn_more_btn.addEventListener("click", function(e) {
        window.scrollTo({
            top: learn_more_btn.getBoundingClientRect().bottom,
            behavior: "smooth"
        });
    });
    
    // init mobile tours sldier

    let tours_slider = new MobileToursSlider("tours-slider");

    // init modals

    // 1
    let modal_el = document.getElementById("modal-help-chose-tour");
    let modal_trigger_els = [document.getElementById("trigger-modal-help-chose-tour")];
    let modal = new Modal(modal_el, modal_trigger_els);

    window.app.modal_fade_manager.add_modal(modal);

    // init forms

    // 1
    let form_el = document.getElementById("form-help-chose-tour");
    let form = new Form(
        form_el,
        "/requests/tour-selections", [
            { name: "name", input: form_el.elements.name },
            { name: "phone", input: form_el.elements.phone },
            { name: "email", input: form_el.elements.email },
            { name: "wishes", input: form_el.elements.wishes }
        ]
    );
});