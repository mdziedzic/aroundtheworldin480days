/*global $, jQuery, document, navigator, location */

jQuery(document).ready(function($) {
    
    "use strict";

	$(document).keydown(function(e) {  
		if ((e.which == 37) && (!$("input,textarea").is(":focus"))) {  
			location.href = $('#day-prev a').attr('href');
		}  
	});	 

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

		$("html").swipe({
			swipeRight:function(event, direction, distance, duration, fingerCount) {
				location.href = $('#day-prev a').attr('href');
			},
			threshold:400

		});	
	}
});
