$(document).on('ready', function () {
	if ($(".careers__page").is(":visible")) {

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

        $(".openings").on("init", function () {
            $(".openings").removeClass("dont-break");
        });

        $('.openings').slick({
            draggable: false,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 8000,
            fade: true,
            prevArrow: '<span class="nav__arrow__prev nav__arrow"><i class="glyphicon glyphicon-menu-left"></i></span>',
            nextArrow: '<span class="nav__arrow__next nav__arrow"><i class="glyphicon glyphicon-menu-right"></i></span>',

        });

        $('.content__cta .sc_btn__cta').on('click', function (event) {
            event.preventDefault();

            $link = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $($link).offset().top - 92
            }, 800);

            var jobProfile = $('.slick-current .content__title').text();
            $('#job__apply__form').find('input[name="position_applied_for"]').val(jobProfile);
        });

        /*Resume Upload*/
        $('.inputfile').each(function () {
            var $input = $(this),
                $label = $input.next('label'),
                labelVal = $label.html();

            $input.on('change', function (e) {
                var fileName = '';

                if (this.files && this.files.length > 1)
                    fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
                else if (e.target.value)
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    $label.find('span').html(fileName);
                else
                    $label.html(labelVal);
            });

            // Firefox bug fix
            $input
                .on('focus', function () {
                    $input.addClass('has-focus');
                })
                .on('blur', function () {
                    $input.removeClass('has-focus');
                });
        });

        $('#job__apply__form').on('submit', function (e) {

            e.preventDefault();
            var form = $(this);
            var data = new FormData();

            if (form.find('input[name="upload_resume"]')[0].files.length != 0) {
                data.append("upload_resume", form.find('input[name="upload_resume"]')[0].files[0]);
            }

            var otherFields = form.serializeArray();

            $.each(otherFields, function (key, input) {
                data.append(input.name, input.value);
            });

            form.find('button').prop('disabled', true);
            var message = "<img src='/img/careers_page/24.gif'>"
            swal({
                title: "Sending Your Message",
                text: message,
                showConfirmButton: false,
                html: true
            });

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                enctype: 'multipart/form-data',
                data: data,
                contentType: false,
                processData: false,
                statusCode: {
                    200: function (response) {
                        swal({
                            title: "Thank you for Getting in Touch!",
                            text: "We will try to respond as soon as possible, so one of our associate will get back to you within a few hours. Have a great day ahead!",
                            type: "success",
                            confirmButtonText: "Done"
                        });

                        form[0].reset();
                        form.find('button').prop('disabled', false);
                        $('#file-name').html('Upload Resume');
                    },
                    422: function (error) {
                        showFirstError(error);
                        form.find('button').prop('disabled', false);
                    }
                }
            });
        });
    }
});

var showFirstError = function (errors) {
    var responseJSON = errors.responseJSON;

    for (var prop in responseJSON) {
        $("[name=" + prop + "]", $("form#job__apply__form")).addClass("invalid");
    }
    for (var prop in responseJSON) {

        $("[name=" + prop + "]", $("form#job__apply__form")).addClass("invalid");
        swal({
            title: "Oops!",
            text: responseJSON[prop][0],
            type: "error",
            confirmButtonText: "Okay"
        });
        return;
    }
};