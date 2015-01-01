jQuery(document).ready(function($) {

	$(document).keydown(function(e) {  
		if ((e.which == 37) && (!$("input,textarea").is(":focus"))) {  
			location.href = $('#day-prev a').attr('href')
		}  
	});	 

	$("html").swipe({
		swipeRight:function(event, direction, distance, duration, fingerCount) {
			location.href = $('#day-prev a').attr('href');
		},
		threshold:400

	});	

});
