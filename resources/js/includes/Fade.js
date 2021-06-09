export default class Fade {
    el = null;

    constructor() {
        this.el = document.getElementById("fade");
    }

    open() {
        this.el.classList.add("active");
    }

    close() {
        this.el.classList.remove("active");
    }
}