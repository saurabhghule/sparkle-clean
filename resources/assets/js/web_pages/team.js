
$(document).on('ready', function () {
	if ($(".team__page").is(":visible")) {

        $.each($('.height-equalizer-wrapper'), function () {
            var totalChildEqualizers = $(this).find('.height-equalizer');
            var totalChildrenHeightArr = new Array();
            var indexOfMax;
            $.each(totalChildEqualizers, function () {
                totalChildrenHeightArr.push($(this).outerHeight());
            });
            indexOfMax = totalChildrenHeightArr.indexOf(Math.max.apply(Math, totalChildrenHeightArr));
            if ($('.height-equalizer').is(":visible")) {
                totalChildEqualizers.outerHeight($(totalChildEqualizers[indexOfMax]).outerHeight() + 10);
            }
            else {
                totalChildEqualizers.outerHeight($(totalChildEqualizers[indexOfMax]).outerHeight());
            }
        });

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
    }
});