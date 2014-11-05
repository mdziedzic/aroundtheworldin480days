<?php
/*
Template Name: Map
*/
?>

<?php
	$mapLoc = $_GET['mapLocation'];
	
	if ($mapLoc != "5000") {
		echo GeoMashup::map('map_content=global&open_object_id=' . $mapLoc . '&object_id=' . $mapLoc .
    							'&marker_select_center=false&marker_select_highlight=false' . 
    							'&marker_select_info_window=true&marker_select_attachments=true&auto_info_open=true');
	} else {
		echo GeoMashup::map('map_content=global&open_object_id=848' . '&zoom=2' . '&center_lat=25&center_lng=105' .
    							'&marker_select_center=false&marker_select_highlight=false' . 
    							'&marker_select_info_window=true&marker_select_attachments=true&auto_info_open=false');
	}

?>

