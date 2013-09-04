<?php
	$noTodayPhotoSeries = array("003", "004", "005");

	$key="dayNumber";

	if (!in_array(get_post_meta($post->ID, $key, true), $noTodayPhotoSeries)) { ?>
		<p class="body-text-photo-series"><a href="http://www.flickr.com/photos/aroundtheworldin480days/archives/date-taken/<?php echo get_the_date('Y/m/d'); ?>/detail/?view=lg">Today's Photo Series Photos Bitches</a></p>
	<?php } ?>
