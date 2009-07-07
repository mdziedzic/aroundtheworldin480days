jQuery(document).ready(function($) {

	var mapStatus = false;
	var mapBgOpacity = .65;



	// -------------------------------------------------------------------- FUNCTIONS
	
	function getScrollXY() 
		// thanks to http://james.padolsey.com/
		{
			var scrOfX = 0, scrOfY = 0;
			if (typeof(window.pageYOffset) == 'number') {
		    	//Netscape compliant
				scrOfY = window.pageYOffset;
				scrOfX = window.pageXOffset;
		  	} else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
		    	//DOM compliant
		    	scrOfY = document.body.scrollTop;
		    	scrOfX = document.body.scrollLeft;
		  	} else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
		    	//IE6 standards compliant mode
		    	scrOfY = document.documentElement.scrollTop;
		    	scrOfX = document.documentElement.scrollLeft;
		  	} 
		  	return [ scrOfX, scrOfY ];
		}

	$.getDocHeight = function() 
		{
		    return Math.max(
		        $(document).height(),
		        $(window).height(),
		        document.documentElement.clientHeight // for opera
		    );
		};





	function loadMap() 
		{  		
			if(!mapStatus) {  
				$('#mapBackground').css({  
					'opacity': mapBgOpacity  
				});  
				$('#mapBackground').fadeIn(150, function() {
					$('#map').fadeIn(150);  
				});  
				mapStatus = true;  
			} 
		}	

	function disableMap()
		{  
			if(mapStatus){  
				$('#map').fadeOut(150, function() {
					$('#mapBackground').fadeOut(150);  
				});  
				mapStatus = false;  
			}
		}	

	function centerMap()  
		{  
			var windowWidth = document.documentElement.clientWidth;  
			var windowHeight = document.documentElement.clientHeight;  
			var mapWidth = $('#map').width();  		
			var mapHeight = $('#map').height();  

			$('#map').css({  
				'position': 'absolute',  
				'top': (windowHeight/2-mapHeight/2) + getScrollXY()[1] -25,  
				'left': windowWidth/2-mapWidth/2 + 2
			});  

			// only need force for IE6  
			$('#mapBackground').css({  
				'height': $.getDocHeight()  
			});  		
		}	



		// -------------------------------------------------------------------- EVENT HANDLERS

		$('.map a').click(function(event) {
			event.preventDefault();
		});

		$('.map').click(function() {  
			centerMap();  
			loadMap(); 
		});	




});

