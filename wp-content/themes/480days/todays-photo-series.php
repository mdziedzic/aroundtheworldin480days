<?php
	$noTodayPhotoSeries = array("001", "002", "003", "004", "011",							// March 2004
								"018", "035", "037", "042", "043", "045",					// April
								"049", "52", "53", "71", "72", "73", "74", "75", "77",		// May
								"78", "85", "100", "101", "102", "103", "105",				// June
								"109", "129", "132", "134", "136", "137", "138",			// July
								"139", "140", "143", "147", "148", "155", "159", "167",		// August
								"173", "184", "199",										// September
								"207", "220", "224", "225", "226", "227", "228", "230",		// October
								"240", "247", "248", "250", "252",							// November
								"261", "263", "268", "271", "273", "274", "275", "276",		// December 
								"279", "281", "283", "289",		
								"292", "293", "295", "309", "321", "322",					// January 2005
								"323", "324", "327", "328", "329", "331", "336", "338", 	// February
								"339", "350",	
								"362", "367", "377",										// March
								"386", "388", "393", "394", "395", "397", "398", "399",		// April 
								"401", "402", "403", "405", "408", "409",					// May
								"414", "415", "419", "430", "436", "437", "441",
								"444", "445", "447", "449", "459", "461", "464", "467", 	// June
								"470", "471",
								"476", "478", "479", "480");


	$key="dayNumber";

	if (!in_array(get_post_meta($post->ID, $key, true), $noTodayPhotoSeries)) { ?>
		<p class="body-text-photo-series"><a href="http://www.flickr.com/photos/aroundtheworldin480days/archives/date-taken/<?php echo get_the_date('Y/m/d'); ?>/detail/?view=lg">Today's Photo Series Photos Bitches</a></p>
	<?php } ?>