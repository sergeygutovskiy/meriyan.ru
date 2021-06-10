export default class Form {
    el = null;
    submit_btn_el = null;
    submit_action = null;

    constructor(id, submit_action) {
        this.el = document.getElementById(id);
        this.submit_action = submit_action;
        this.submit_btn_el = this.el.getElementsByClassName("m-form-submit")[0];
    
        this.el.addEventListener("submit", (e) => {
            e.preventDefault();
            
            console.log("Submited 1 !!!");
            
            this.submit(e);
        });
    }

    submit(e) {
        this.submit_action(e, this.el);
    } 
}