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

// $(window).resize(function() {
//   let windowWidth = window.innerWidth;
//   let point = 1220;
//   if (windowWidth >= point)  //画面サイズが1200px以上のときの処理