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
add_filter( 'the_content', array( 'GeoMashupQuery', 'strip_map_shortcodes' ), 1, 9 ); ?>

<div class="info-window-max">

<div id="content"><div id="content-single">

	<div id="cont-container">
	
	<?php $postCount = 0; ?>
	
	<?php if (have_posts()) : ?>
		
		<?php // to reverse the order of the posts
		$wp_query->posts = array_reverse( $wp_query->posts ); ?> 
		
		<?php while (have_posts()) : the_post(); ?>
		
			<?php $postCount++; ?>
	
			<div class="individual-post">
				
				<?php include (TEMPLATEPATH . '/location.php'); ?>
								
					<div class="search-unleashed-patch"><?php the_title(); ?></div>
		
					<div class="day-number" id="ie-day-number-fix">
						<p><?php $key="dayNumber"; echo get_post_meta($post->ID, $key, true); ?></p>
					</div>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<div class="comments-counter">
						<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
					</div>				
					<h2><?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?></h2>
					<?php the_content(); ?>
					<?php if ($postCount != sizeof($wp_query->posts)) { ?>
						<div class="divider"></div>
					<?php } ?>
			</div>			

		<?php endwhile; ?>
	
	<?php else : ?>
	
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	
	<?php endif; ?>
	
	</div> <!-- #cont-container -->

</div></div> <!-- #content & #content-single -->

</div>
