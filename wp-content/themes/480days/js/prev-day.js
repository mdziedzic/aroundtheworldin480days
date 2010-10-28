jQuery(document).ready(function($) {

	$(document).keydown(function(e) {  
		if(e.keyCode == 37) {  
			location.href = $('#day-prev a').attr('href')
		}  
	});	 

});
