
$(document).on('ready', function () {
	if ($(".projects__page").is(":visible")) {

        var offset = 800;
        var duration = 500;

        var is_scrolling = false;
        setInterval(function () {
            if (is_scrolling == true) {
                if ($(this).scrollTop() > offset) {
                    $('.scroll-top').fadeIn(duration);
                } else {
                    $('.scroll-top').fadeOut(duration);
                }

                var sidebar_width = $(".calculate-width").width();
                if ($(window).scrollTop() > 368) {
                    $(".projects__nav__menu").addClass("fixed-sidebar").width(sidebar_width);

                    if ($("#sct_footer:visible").visible(true)) {
                        $(".projects__nav__menu").removeClass("fixed-sidebar");
                    }
                } else {
                    $(".projects__nav__menu").removeClass("fixed-sidebar");
                }
                is_scrolling = false;
            }
        }, 50);

        $(window).scroll(function () {
            is_scrolling = true;
            
        });


        $('.scroll-top').click(function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, duration);
            return false;
        });
    }
});