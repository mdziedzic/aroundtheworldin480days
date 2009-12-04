jQuery(document).ready(function($) {

	var mapStatus = false;
	var mapBgOpacity = .70;
	var mapViewed = false;





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





	function centerMap()  
		{  
			var windowWidth = document.documentElement.clientWidth;  
			var windowHeight = document.documentElement.clientHeight;  
			var mapWidth = $('#map').width();  		
			var mapHeight = $('#map').height();  

			$('#map').css({  
				'position': 'absolute',  
				'top': (windowHeight/2-mapHeight/2) + getScrollXY()[1] +10,  
				'left': windowWidth/2-mapWidth/2 + 2
			});  

			// only need force for IE6  
			$('#map-background').css({  
				'height': $.getDocHeight()  
			});  		
		}	

	function loadMap() 
		{  		
			if(!mapStatus) {  
				$('#map-background').css({  
					'opacity': mapBgOpacity  
				});  
				
				if(!$.browser.msie) {
					$('#map-background').fadeIn(150, function() {
						$('#map').fadeIn(150);  
					});  
				} else {
					$('#map-background').show();
					$('#map').show();
				}
				
				mapStatus = true;  
			}
			
			
			// if (GBrowserIsCompatible()) {
			// 	if (!mapViewed) {
			// 		        	map = new GMap2(document.getElementById("map-canvas"), { size: new GSize(901,525) } );
			//         map.setCenter(new GLatLng(32, 25), 2);		
			// 		map.setUIToDefault();
			// 		
			// 		mapViewed = true;
			// 		
			// 		map.addControl(new GOverviewMapControl(new GSize(234,140)));
			// 		map.setMapType(G_PHYSICAL_MAP);	
			// 								
			// 	}
			// } 			 
		}	

	function disableMap()
		{  
			if(mapStatus){  
				
				if(!$.browser.msie) {
					$('#map').fadeOut(150, function() {
						$('#map-background').fadeOut(150);  
					}); 
				} else {
					$('#map').hide();
					$('#map-background').hide();
				} 
				mapStatus = false;  
			}
		}	



	// -------------------------------------------------------------------- CODE



	// -------------------------------------------------------------------- EVENT HANDLERS

	$('.map a').click(function(event) {
		event.preventDefault();
	});

	$('.map').click(function() {  
		if (!mapViewed) {

			$("<div id=\"map\"><div id=\"map-canvas\"></div><div id=\"map-close\"></div></div><div id=\"map-background\"></div>").insertAfter("#map-container");
									
			$("#map-canvas").load("index.php?page_id=1748&mapLocation=" + mapWhereAmI);
			mapViewed = true;
			
			$('#map-close').click(function() {  
				disableMap();  
			});  

			$('#map-background').click(function() {  
				disableMap();  
			}); 

			$(document).keydown(function(e) { 
				if ((e.which == 27) && mapStatus) {  
					disableMap();  
				}  
			});	 
		}

		centerMap();  
		loadMap(); 
	});	


});





// function to display map iframe once it is fully loaded
// necessar to avoid white background while iframe is loading

function displayIframe()
	{
		document.getElementsByTagName("iframe")[0].style.visibility = "visible";
	}




