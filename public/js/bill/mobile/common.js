$(document).ready(function(){

    $(".order_info_more").click(function () {
        $(this).text($(this).text()=="Скрыть детали платежа" ? "Показать детали платежа" : "Скрыть детали платежа");
        $(this).toggleClass('active');
        $(".order_info_inner").slideToggle('slow');
    });

    $('#carousel').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: 150,
      itemMargin: 0,
      asNavFor: '#slider',
      touch: true,
      prevText: "",
      nextText: ""
    });

    $('#slider').flexslider({
        animation: "fade",
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        slideshow: false,
        touch: false,
        sync: "#carousel"
    });
    var nav = $('.singleBut');

    // $(window).scroll(function () {
    //   if ($(this).scrollTop() > 100) {
    //     nav.removeClass("f-btn");
    //   } else {
    //     nav.addClass("f-btn");
    //   }
    // });
});