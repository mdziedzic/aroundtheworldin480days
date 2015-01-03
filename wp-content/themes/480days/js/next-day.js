jQuery(document).ready(function($) {

	$(document).keydown(function(e) {  
		if ((e.which == 39) && (!$("input,textarea").is(":focus"))) {  
			location.href = $('#day-next a').attr('href')
		}  
	});	 

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

		$("body").swipe({
			swipeLeft:function(event, direction, distance, duration, fingerCount) {
				location.href = $('#day-next a').attr('href');
			},
			threshold:400
		});
	}

});
