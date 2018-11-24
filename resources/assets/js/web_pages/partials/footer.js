

$(document).on('ready',function(){

	$(document).on('click','#send__subscription__btn',function(e){
		e.preventDefault();

		var form = $('.footer__form');
		var url = $('.footer__form').attr('action');
		var data = $('.footer__form').serialize();

        form.find('button').prop('disabled', true);

        var message = "<img src='/img/careers_page/24.gif'>"
        swal({
            title: "Sending Your Message",
            text: message,
            showConfirmButton: false,
            html: true
        });

		$.ajax({
			url: url,
			method: 'POST',
			data: data,
			statusCode: {
				200: function(response){
					swal({
                        title: '"Thank You for signing up to receive our newsletter"',
                        type: "success",
                        confirmButtonText: "OK"
                    });
                    form[0].reset();
                    form.find('button').prop('disabled', false);
				},
				422: function(response){
					showFooterFormError(error);
                    form.find('button').prop('disabled', false);
				},
			}
		});
	});
});

var showFooterFormError = function (errors) {
    var responseJSON = errors.responseJSON;

    for (var prop in responseJSON) {
        $("[name=" + prop + "]", $("form.footer__form")).addClass("invalid");
    }
    for (var prop in responseJSON) {

        $("[name=" + prop + "]", $("form.footer__form")).addClass("invalid");
        swal({
            title: "Oops!",
            text: responseJSON[prop][0],
            type: "error",
            confirmButtonText: "Okay"
        });
        return;
    }
};