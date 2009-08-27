<?php
/*
Template Name: Map
*/
?>

<?php echo "<h1><i>hello there</i></h1>"; ?>


<?php echo "bob"; ?>

<?php

query_posts('showposts=1&cat=190');
if (have_posts()) :
  while (have_posts()) : the_post();
    the_title();
    the_excerpt(); ?>
    <p><a href="<?php the_permalink(); ?>">Read the rest of this entry &raquo;</a></p>
<?php
endwhile;
endif;
?>

<?php echo GeoMashup::map('map_content=global&open_object_id=' . get_the_ID() . 
    							'&marker_select_center=true&marker_select_highlight=false' . 
    							'&marker_select_info_window=true&marker_select_attachments=true&auto_info_open=true'); ?> 
    							
    							
