const navigation = document.getElementsByClassName("navigation-mobile")[0];
const navigation_btn = document.getElementsByClassName("navigation-mobile__menu-button")[0];

navigation_btn.addEventListener("click", function() {
    navigation.classList.toggle("active");
    this.classList.toggle("active");
});