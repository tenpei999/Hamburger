jQuery(function( $ ) {
  $(".js-hamburger").on("click", function() {
    $( this ).toggleClass("is-open");
    $(".p-gmenu").toggleClass("is-open");
    $(".p-gmenu--fead").toggleClass("is-open");
    $(".list").toggleClass("is-open");
    $("body").toggleClass("is-open");
    $("aside").toggleClass("is-open");
  });
  $(window).on('resize', function() {
    let w = window.innerWidth;
    let point = 370;
      //画面サイズが370px以下のときの処理
      if (w <= point) {
        $(".wp-block-gallery").addClass(".is-mq").removeClass(".is-tb");
      } else {
        $(".wp-block-gallery").addClass(".is-tb").removeClass(".is-mq");
      }
  });  
});
