jQuery(document).ready(function($) {

	$(document).keydown(function(e) {  
		if(e.keyCode == 39) {  
			location.href = $('#day-next a').attr('href')
		}  
	});	 

});
