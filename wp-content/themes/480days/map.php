<?php
/*
Template Name: Map
*/
?>

<?php

	if ($_GET['mapLocation'] != "5000") {
		echo GeoMashup::map('map_content=global&open_object_id=' . $_GET['mapLocation'] . 
    							'&marker_select_center=true&marker_select_highlight=false' . 
    							'&marker_select_info_window=true&marker_select_attachments=true&auto_info_open=true');
	} else {
		echo GeoMashup::map('map_content=global&' . 
    							'&marker_select_center=false&marker_select_highlight=false' . 
    							'&marker_select_info_window=false&marker_select_attachments=true&auto_info_open=false');
	}

?>

    							
    							
