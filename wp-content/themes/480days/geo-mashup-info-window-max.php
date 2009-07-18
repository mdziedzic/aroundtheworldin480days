<?php
/**
 * This is the default template for full post display of a clicked marker
 * in a Geo Mashup map. 
 *
 * Don't modify this file! It will be overwritten by upgrades.
 *
 * Instead, copy this file to "full-post.php" in this directory,
 * or "geo-mashup-full-post.php" in your theme directory. Those files will
 * take precedence over this one.
 *
 */

// Avoid nested maps
add_filter( 'the_content', array( 'GeoMashupQuery', 'strip_map_shortcodes' ), 1, 9 );
?>
<div class="info-window-max">
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>


	
		<div id="cont-container">

				<div class="search-unleashed-patch"><?php the_title(); ?></div>
	
				<div class="day-number" id="ie-day-number-fix">
					<p><?php $key="dayNumber"; echo get_post_meta($post->ID, $key, true); ?></p>
				</div>
				<h1><?php the_title(); ?></h1>
				<h2><?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?></h2>
				<?php the_content(); ?>
		</div>


	<?php endwhile; ?>

<?php else : ?>

	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>
</div>
