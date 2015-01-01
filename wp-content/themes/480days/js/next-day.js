jQuery(document).ready(function($) {

	$(document).keydown(function(e) {  
		if ((e.which == 39) && (!$("input,textarea").is(":focus"))) {  
			location.href = $('#day-next a').attr('href')
		}  
	});	 

	$("body").swipe({
		swipeLeft:function(event, direction, distance, duration, fingerCount) {
			location.href = $('#day-next a').attr('href');
		},
		threshold:400

	});

});
