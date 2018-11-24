$(document).on('ready', function () {
	var prev_anchor_index = 0;

 	$(document).on("click",'.navbar-nav .dropdown-toggle',function(e){
		e.preventDefault();

		var index = parseInt($(this).data('index'));

		if(prev_anchor_index == 0){
			if(!$('.sct__navbar__collapse').hasClass('overflow-y')){
				$('.sct__navbar__collapse').addClass('overflow-y');
			}

			prev_anchor_index = index;
		}
		else{
			if(prev_anchor_index != index){
				if(!$('.sct__navbar__collapse').hasClass('overflow-y')){
					$('.sct__navbar__collapse').addClass('overflow-y');
				}
			}
			else{
				if(!$('.sct__navbar__collapse').hasClass('overflow-y')){
					$('.sct__navbar__collapse').addClass('overflow-y');
				}
				else{
					$('.sct__navbar__collapse').removeClass('overflow-y');
				}
			}
			prev_anchor_index = index;
		}
		
    });
});