<?php
	$noTodayPhotoSeries = array("001", "002", "003", "004", "011",								// March 2004
								"018", "035", "037", "042", "043", "045",						// April
								"049", "052", "053", "071", "072", "073", "074", "075", "077",	// May
								"078", "085", "100", "101", "102", "103", "105",				// June
								"109", "129", "132", "134", "136", "137", "138",				// July
								"139", "140", "143", "147", "148", "155", "159", "167",			// August
								"173", "184", "199",											// September
								"207", "220", "224", "225", "226", "227", "228", "230",			// October
								"240", "247", "248", "250", "252",								// November
								"261", "263", "268", "271", "273", "274", "275", "276",			// December 
								"279", "281", "283", "289",		
								"292", "293", "295", "309", "321", "322",						// January 2005
								"323", "324", "327", "328", "329", "331", "336", "338", 		// February
								"339", "350",	
								"362", "367", "377",											// March
								"386", "388", "393", "394", "395", "397", "398", "399",			// April 
								"401", "402", "403", "405", "408", "409",						// May
								"414", "415", "419", "430", "436", "437", "441",
								"444", "445", "447", "449", "459", "461", "464", "467", 		// June
								"470", "471",
								"476", "478", "479", "480");									// July


	// $onlyUsTodayPhotoSeries = array("005", "006", "007",										// March 2004
	// 							"019", "020", "023", "027", "031", "033", "041", "046",			// April
	// 							"047", "048",													// May
	// 							"079", "081", "083", "086", "094", "099", "104"					// June

	// 										);


	$key="dayNumber";


	$tomorrow = new DateTime(get_the_date('Ymd'));
	$tomorrow->modify('+1 day');
	$tomorrow->format('Y-m-d');

	if (!(in_array(get_post_meta($post->ID, $key, true), $noTodayPhotoSeries) or in_array(get_post_meta($post->ID, $key, true), $onlyUsTodayPhotoSeries))) { ?>
<!-- 		<span id="todayphotos"><a href="http://www.flickr.com/photos/aroundtheworldin480days/archives/date-taken/<?php echo get_the_date('Y/m/d'); ?>/detail/?view=md">Photo Series Photos</a></span>
		<span id="todayphotos"><a href="http://www.flickr.com/search/?q=travel&m=tags&d=taken-<?php echo get_the_date('Ymd'); ?>-<?php echo get_the_date('Ymd'); ?>&ss=2&ct=0&mt=all&w=45697284%40N04&adv=1">Photo Series Photos</a></span>
 -->		<span id="todayphotos"><a href="https://www.flickr.com/search/?d=taken-<?php echo get_the_date('Ymd'); ?>-<?php echo $tomorrow->format('Ymd'); ?>&ss=0&ct=0&mt=all&w=45697284%40N04&adv=1&tags="><p>Photo Series Photos</p></a></span>

 <?php } ?>
