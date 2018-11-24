

$(document).on('ready', function () {
	if ($(".homepage").is(":visible")) {

        $.each($('.height-equalizer-wrapper'), function () {
            var totalChildEqualizers = $(this).find('.height-equalizer');
            var totalChildrenHeightArr = new Array();
            var indexOfMax;
            $.each(totalChildEqualizers, function () {
                totalChildrenHeightArr.push($(this).outerHeight());
            });
            indexOfMax = totalChildrenHeightArr.indexOf(Math.max.apply(Math, totalChildrenHeightArr));
            if ($('.testimonial-text .height-equalizer').is(":visible")) {
                totalChildEqualizers.outerHeight($(totalChildEqualizers[indexOfMax]).outerHeight() + 10);
            }
            else {
                totalChildEqualizers.outerHeight($(totalChildEqualizers[indexOfMax]).outerHeight());
            }
        });

        if ($(window).width() < 600) {
            $('.sct__slider').find('.valign').removeClass('valign');
        };

        $(".card").mouseenter(function () {
            $(this).find(".card__reveal").css("display", "block").stop().animate({
                top: "0%"
            }, 500);
        });

        $(".card").mouseleave(function () {
            $(this).find(".card__reveal").stop().animate({top: "100%"}, function () {
                $(this).css("display", "none");
            });
        });

        $(".activator").on("click", function () {
            $(this).closest(".card").find(".card__reveal").css("display", "block").stop().animate({
                top: "0%"
            }, 500);
        });

        $(".card__close").on("click", function () {
            $(this).closest(".card").find(".card__reveal").stop().animate({top: "100%"}, function () {
                $(this).css("display", "none");
            });
        });

        $(".sct__slider,.testimonials,.partners").on("init", function () {
            $(".sct__slider").removeClass("dont-break");
            $(".testimonials").removeClass("dont-break");
            $(".partners").removeClass("dont-break");
        });

        $('.sct__slider').slick({
            centerMode: false,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed:5000,
            fade: true,
            arrows: true,
            prevArrow: '<span class="nav__arrow__prev nav__arrow"><i class="glyphicon glyphicon-menu-left"></i></span>',
            nextArrow: '<span class="nav__arrow__next nav__arrow"><i class="glyphicon glyphicon-menu-right"></i></span>',
        });

        $('.equipment__slider').slick({
            draggable: false,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<span class="nav__arrow__prev nav__arrow"><i class="glyphicon glyphicon-menu-left"></i></span>',
            nextArrow: '<span class="nav__arrow__next nav__arrow"><i class="glyphicon glyphicon-menu-right"></i></span>',
        });

        $('.testimonials').slick({
            draggable: false,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<span class="nav__arrow__prev nav__arrow"><i class="glyphicon glyphicon-menu-left"></i></span>',
            nextArrow: '<span class="nav__arrow__next nav__arrow"><i class="glyphicon glyphicon-menu-right"></i></span>',
        });

        $('.partners').slick({
            arrows: true,
            draggable: false,
            centerMode: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: false,
            prevArrow: '<span class="nav__arrow__prev nav__arrow"><i class="glyphicon glyphicon-menu-left"></i></span>',
            nextArrow: '<span class="nav__arrow__next nav__arrow"><i class="glyphicon glyphicon-menu-right"></i></span>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        initialSlide: 1,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true
                    }
                }
            ]
        });
    }
});