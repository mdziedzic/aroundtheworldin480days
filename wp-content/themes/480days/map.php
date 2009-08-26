<?php echo "<h1><i>hello there</i></h1>"; ?>

<?php echo GeoMashup::map('map_content=global&open_object_id=' . get_the_ID() . 
    							'&marker_select_center=true&marker_select_highlight=false' . 
    							'&marker_select_info_window=true&marker_select_attachments=true&auto_info_open=true'); ?> 
