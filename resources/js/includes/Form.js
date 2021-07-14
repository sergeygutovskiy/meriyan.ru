export default class Form {
    el = null;
    submit_btn_el = null;
    
    endpoint_url = null;
    request_params = null;

    constructor(el, endpoint_url, request_params) {
        this.el = el;
        this.submit_btn_el = this.el.getElementsByClassName("m-form-submit")[0];
    
        this.el.addEventListener("submit", (e) => {
            e.preventDefault();
            this.on_submit(e);
        });

        this.endpoint_url = endpoint_url;
        this.request_params = request_params;
    }

    on_submit(e) {
        this.el.classList.remove("success");
        for (let input of this.el.elements) 
            input.classList.remove("error");

        let post_params = {};
        for (let param of this.request_params)
            post_params[param.name] = param.input.value;

        axios.post(this.endpoint_url, post_params)
            .then((response) => {
                this.el.classList.remove("success");
                this.el.offsetHeight; // reflow 
                this.el.classList.add("success");
                this.el.reset();
            })
            .catch((error) => {
                if (error.response.status == 400) {
                    let data = error.response.data;
                    for (let input of Object.keys(data))
                        this.el.elements[input].classList.add("error"); 
                }
            });
    } 
}