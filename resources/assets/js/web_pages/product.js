$(document).on('ready', function () {
	if ($(".products__listing").is(":visible")) {

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
    }
});
