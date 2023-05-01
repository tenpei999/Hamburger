window.addEventListener("DOMContentLoaded", function() {
  const hamburger = document.querySelector(".js-hamburger");
  const pGmenuFead = document.querySelector(".p-gmenu--fead");
  const body = document.querySelector("body");
  const aside = document.querySelector("aside");
  const footer = document.querySelector("footer");

  hamburger.addEventListener("click", function() {
    this.classList.toggle("is-open");
    pGmenuFead.classList.toggle("is-open");
    body.classList.toggle("is-open");
    aside.classList.toggle("is-open");
    footer.classList.toggle("is-open");
  });
});