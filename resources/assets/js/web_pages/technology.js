$(document).on('ready', function () {
    if ($(".technology__page").is(":visible")) {

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
                    $(".technology__nav__menu").addClass("fixed-sidebar").width(sidebar_width);

                    if ($("#sct_footer:visible").visible(true)) {
                        $(".technology__nav__menu").removeClass("fixed-sidebar");
                    }
                } else {
                    $(".technology__nav__menu").removeClass("fixed-sidebar");
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

        var product_slug = getQueryVariable('product');
        if (product_slug != null) {
            $('.products').slick('slickGoTo', $("[product_slug=" + product_slug + "]").attr("data-slick-index"), true);
            setTimeout(function () {
                $("html, body").animate({
                    scrollTop: $('.technology__nav__content').offset().top + $('.technology__nav__content').height() - 80
                });
            }, 300);
        }
    }
});

function getQueryVariable(name) {
    var url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}