/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/pages/tours.js ***!
  \*************************************/
// init header's buttons for smooth scrolling to tags
var tags_btns = document.getElementsByTagName("header")[0].getElementsByTagName("button");
tags_btns[0].addEventListener("click", function (e) {
  window.scrollTo({
    top: document.getElementById("tag1").getBoundingClientRect().top - 120,
    behavior: "smooth"
  });
});
tags_btns[1].addEventListener("click", function (e) {
  window.scrollTo({
    top: document.getElementById("tag2").getBoundingClientRect().top - 120,
    behavior: "smooth"
  });
});
tags_btns[2].addEventListener("click", function (e) {
  window.scrollTo({
    top: document.getElementById("tag3").getBoundingClientRect().top - 120,
    behavior: "smooth"
  });
});
/******/ })()
;