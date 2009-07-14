<?php
/**
 * This is the default template for the info window in Geo Mashup maps. 
 *
 * Don't modify this file! It will be overwritten by upgrades.
 *
 * Instead, copy this file to "geo-mashup-info-window.php" in your theme directory, 
 * or info-window.php in the Geo Mashup Custom plugin directory, if you have that 
 * installed. Those files take precedence over this one.
 *
 * For styling of the info window, see map-style-default.css.
 */

// A potentially heavy-handed way to remove shortcode-like content
add_filter( 'the_excerpt', array( 'GeoMashupQuery', 'strip_brackets' ) );

?>

<div class="locationinfo post-location-info">

<?php /* query_posts($query_string."&orderby=date&order=ASC");  */ ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
	
		<div class="map-info-window">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php $key="dayNumber"; echo get_post_meta($post->ID, $key, true); ?>: <?php the_title(); ?></a></h2>
			<p><?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?></p>
			
			<?php if ($wp_query->post_count == 1) : ?>
			
			<?php endif; ?>	
				
		</div>	
		

	<?php endwhile; ?>

<?php else : ?>

	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
