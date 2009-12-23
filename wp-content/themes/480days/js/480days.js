jQuery(document).ready(function($) {
	
	/* 
		------------------------------------------------------------------ EXTERNAL LINKS
	*/
	
	$(".external-link").attr("target", "_blank");
	$("a[href^=http://www.flickr.com]").attr("target", "flickr-view");
	
	$("a[href^=http://www.flickr.com]").each(function() {
		var ssUrl = $(this).attr("href");
		ssUrl += "/show/";
		var ssAlt = $(this).attr("title");
		$(this).after('<a href="' + ssUrl + '" title="' + ssAlt 
						+ ' Slideshow" target="flickr-view"><span class="slideshow-icon">&nbsp;&nbsp;&nbsp;</span></a>');
	});
	
	
	

	/* 
		------------------------------------------------------------------ NAVIGATION
	*/

	$(".nav").children("li").each(function() {
	    var current = "nav current-" + ($(this).attr("class"));
    	var parentClass = $(".nav").attr("class");
    	if (parentClass != current) {
    		$(this).children("a").css({backgroundImage:"none"});
	    }
	});  	
	
	// create events for each nav item
	attachNavEvents(".nav", "home");
	attachNavEvents(".nav", "about");
	attachNavEvents(".nav", "faq");
	attachNavEvents(".nav", "press");
	attachNavEvents(".nav", "map");

	function attachNavEvents(parent, myClass) {
		$(parent + " ." + myClass).mouseover(function() {
			$(this).append('<div class="nav-' + myClass + '"></div>');
			$("div.nav-" + myClass).css({display:"none"}).fadeIn(200);
		}).mouseout(function() {
			// fade out & destroy pseudo-link
			$("div.nav-" + myClass).fadeOut(200, function() {
				$(this).remove();
			});
		});
	}





	/* 
		------------------------------------------------------------------ DAY NUMBER
	*/

	$('#day-prev').css('opacity', .25);
	$('#day-prev').hover(
		function() {
			$(this).fadeTo(200, 1);
		},
		function() {
			$(this).fadeTo(200, .25);
		}
	);

	$('#day-next').css('opacity', .25);
	$('#day-next').hover(
		function() {
			$(this).fadeTo(200, 1);
		},
		function() {
			$(this).fadeTo(200, .25);
		}
	);




	/* 
		------------------------------------------------------------------ FONT SIZE
	*/
		
	// places bg indicator on currently selected font size
	function moveCurrentFontSizeIndicator(newCurrentFontSize) {
		currentFontSize = newCurrentFontSize;
		$(".font").children("li").each(function() {
			var xoffset = 0;
			switch ($(this).attr("class")) {
				case 'normal':
					xoffset = -14;
					break;
				case 'bigger':
					xoffset = -33;
					break;
			}
			
			if ($(this).attr("class") != newCurrentFontSize) {
				var bgPosition = xoffset + "px -100px";
				$(this).children("a").css('background-position', bgPosition);	
			} else {
				var bgPosition = xoffset + "px -18px";
				$(this).children("a").css('background-position', bgPosition);
			}
		});
	}
	
	// update the font size and line spacing on the page
	function changeFontSize(fontSize) {
		switch (fontSize) {
			case 'smaller':
				$('.body-text, .body-text-first').css('font-size', '10px');
				$('.body-text, .body-text-first').css('line-height', '18px');							
				break;
			case 'normal':
				$('.body-text, .body-text-first').css('font-size', '12px');
				$('.body-text, .body-text-first').css('line-height', '18px');			
				break;
			case 'bigger':
				$('.body-text, .body-text-first').css('font-size', '14px');
				$('.body-text, .body-text-first').css('line-height', '24px');						
				break;
		}
	}

	function attachFontEvents(parent, myClass) {
		$(parent + " ." + myClass).mouseover(function() {
			$(this).append('<div class="font-' + myClass + '"></div>');
			$("div.font-" + myClass).css({display:"none"}).fadeIn(200);
		}).mouseout(function() {
			// fade out & destroy pseudo-link
			$("div.font-" + myClass).fadeOut(200, function() {
				$(this).remove();
			});
		}).click(function() {
			currentFontSize = myClass;
			changeFontSize(myClass);
			moveCurrentFontSizeIndicator(myClass);
			$.cookie(cookieName, currentFontSize, { expires: 100 });
		})
	}



	var currentFontSize = "normal";
	var cookieName = "aroundtheworldin480days-FontSize";

	// if exists load saved value, otherwise store it
	if ($.cookie(cookieName)) {
		currentFontSize = $.cookie(cookieName);
		changeFontSize(currentFontSize);
	} else {
		$.cookie(cookieName, currentFontSize, { expires: 100 });
	}

	moveCurrentFontSizeIndicator(currentFontSize);

	// create events for each font size selector
	attachFontEvents(".font", "smaller");
	attachFontEvents(".font", "normal");
	attachFontEvents(".font", "bigger");
	
	
	
	
	
	/* 
		------------------------------------------------------------------ PARTICULARLY NOTEWORTHY
	*/
	
	// places bg indicator on currently selected font size
	function moveCurrentPartNoteIndicator(newCurrentPartNote) {
		currentPartNote = newCurrentPartNote;
		$(".partNoteOpt").children("li").each(function() {
			var xoffset = 0;
			switch ($(this).attr("class")) {
				case 'mostViews':
					xoffset = -84;
					break;
				case 'mostComments':
					xoffset = -160;
					break;
			}
			
			if ($(this).attr("class") != newCurrentPartNote) {
				var bgPosition = xoffset + "px -100px";
				$(this).children("a").css('background-position', bgPosition);	
			} else {
				var bgPosition = xoffset + "px -18px";
				$(this).children("a").css('background-position', bgPosition);
			}
		});
	}

	function changePartNote(partNote) {
		switch (partNote) {
			case 'ourFavorites':
				$('#pnc-ourFavorites').fadeIn(200);
				$('#pnc-mostViews').css('display', 'none');
				$('#pnc-mostComments').css('display', 'none');
				break;
			case 'mostViews':
				$('#pnc-ourFavorites').css('display', 'none');
				$('#pnc-mostViews').fadeIn(200);
				$('#pnc-mostComments').css('display', 'none');			
				break;
			case 'mostComments':
				$('#pnc-ourFavorites').css('display', 'none');
				$('#pnc-mostViews').css('display', 'none');
				$('#pnc-mostComments').fadeIn(200);						
				break;
		}
	}
	
	function attachPartNoteEvents(parent, myClass) {
		$(parent + " ." + myClass).mouseover(function() {
			$(this).append('<div class="partNoteOpt-' + myClass + '"></div>');
			$("div.partNoteOpt-" + myClass).css({display:"none"}).fadeIn(200);
		}).mouseout(function() {
			// fade out & destroy pseudo-link
			$("div.partNoteOpt-" + myClass).fadeOut(200, function() {
				$(this).remove();
			});
		}).click(function() {
			currentPartNote = myClass;
			changePartNote(myClass);
			moveCurrentPartNoteIndicator(myClass);
			$.cookie(partNoteCookieName, currentPartNote, { expires: 100 });
		})
	}



	var currentPartNote = "ourFavorites";
	var partNoteCookieName = "aroundtheworldin480days-PartNote";

	// if exists load saved value, otherwise store it
	if ($.cookie(partNoteCookieName)) {
		currentPartNote = $.cookie(partNoteCookieName);
		changePartNote(currentPartNote);
	} else {
		$.cookie(partNoteCookieName, currentPartNote, { expires: 100 });
	}

	moveCurrentPartNoteIndicator(currentPartNote);

	// create events for each font size selector
	attachPartNoteEvents(".partNoteOpt", "ourFavorites");
	attachPartNoteEvents(".partNoteOpt", "mostViews");
	attachPartNoteEvents(".partNoteOpt", "mostComments");
	


});
