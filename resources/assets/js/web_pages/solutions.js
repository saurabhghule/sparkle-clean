
$(document).on('ready', function () {
	if ($(".solutions__page").is(":visible")) {

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
                    $(".solution__nav__menu").addClass("fixed-sidebar").width(sidebar_width);

                    if ($("#sct_footer:visible").visible(true)) {
                        $(".solution__nav__menu").removeClass("fixed-sidebar");
                    }
                } else {
                    $(".solution__nav__menu").removeClass("fixed-sidebar");
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
        $('.technology').slick({
            autoplay: false,
            autoplaySpeed:5000,
            fade: true,
            arrows: true,
            infinite: true,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: '<span class="nav__arrow__prev nav__arrow"><i class="glyphicon glyphicon-menu-left"></i></span>',
            nextArrow: '<span class="nav__arrow__next nav__arrow"><i class="glyphicon glyphicon-menu-right"></i></span>',
        });
    }
});