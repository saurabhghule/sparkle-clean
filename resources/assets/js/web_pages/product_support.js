
$(document).ready(function(){
	if ($(".product__support__page").is(":visible")) {

		$('.product__select__options').SumoSelect({
	        okCancelInMulti: false,
	        selectAll: true,
	        floatWidth: 768,
	        nativeOnDevice: ['Android', 'BlackBerry', 'iPhone', 'iPad', 'iPod', 'Opera Mini', 'IEMobile', 'Silk'],
	    });

	    $('#productsupportpage__form').on('submit', function (e) {
	        e.preventDefault();
	        var form = $(this);
	        form.find('button').prop('disabled', true);

	        var message = "<img src='/img/careers_page/24.gif'>"
	        swal({
	            title: "Sending Your Request",
	            text: message,
	            showConfirmButton: false,
	            html: true
	        });

	        $.ajax({
	            url: form.attr('action'),
	            method: 'POST',
	            data: form.serialize(),
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
	                    $('.product__select__options')[0].sumo.unSelectAll();
	                },
	                422: function (error) {
	                    showContactPageError(error);
	                    form.find('button').prop('disabled', false);
	                }
	            }
	        });
	    });
	}
});

var showContactPageError = function (errors) {
    var responseJSON = errors.responseJSON;

    for (var prop in responseJSON) {
        $("[name=" + prop + "]", $("form#contactpage__form")).addClass("invalid");
    }
    for (var prop in responseJSON) {

        $("[name=" + prop + "]", $("form#contactpage__form")).addClass("invalid");
        swal({
            title: "Oops!",
            text: responseJSON[prop][0],
            type: "error",
            confirmButtonText: "Okay"
        });
        return;
    }
};