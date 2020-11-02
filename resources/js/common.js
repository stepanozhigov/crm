$(document).ready(function(){

    $(".tabs-nav>a").click( function () {

        $(".tabs-nav>a").removeClass("active");
        $(this).addClass("active");

        $(".tabs_content>div").hide();
        t_content=$(this).attr("href");
        $(".tabs-box-item").removeClass("active");
        $(t_content).addClass("active");

        return false
    })


    $(".tabs_nav_more").click(function () {
        $('.tabs-nav_inner').slideToggle('fast');
        $(".tabs_nav_more_arrow").toggleClass('active');
      });


    $(".tabs-nav>a").click(function () {
      $('.tabs-nav_inner').slideUp('fast');
      $(".tabs_nav_more_arrow").removeClass('active');
    });




  $(document).mouseup(function (e){
		var div = $(".tabs-nav_inner");
    var div2 = $(".tabs_nav_more");
		if (!div.is(e.target)
		    && div.has(e.target).length === 0
        && !div2.is(e.target)
        && div2.has(e.target).length === 0) {
			  div.slideUp('fast');
       $(".tabs_nav_more_arrow").removeClass('active');
		}
	});



});
