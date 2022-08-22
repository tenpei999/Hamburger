jQuery(function( $ ) {
  $(".js-hamburger").on("click", function() {
    $( this ).toggleClass("is-open");
    $(".p-gmenu").toggleClass("is-open");
    $(".p-gmenu--fead").toggleClass("is-open");
    $(".list").toggleClass("is-open");
    $("body").toggleClass("is-open");
    $("aside").toggleClass("is-open");
  });  
});
