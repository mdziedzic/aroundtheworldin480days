<?php get_header(); ?>

					<!-- ================================================= NAVIGATION -->	
					<div>	
						<ul class="nav">
							<li class="home"><a href="/aroundtheworldin480days/">Home</a></li>
							<li class="about"><a href="index.php?page_id=2">About</a></li>
							<li class="faq"><a href="index.php?page_id=1172">FAQ</a></li>
							<li class="press"><a href="index.php?page_id=1175">Press</a></li>
							<li class="map"><a href="index.php?cat=5">Map</a></li>
						</ul>
					</div>	

<div id="content"><div id="content-multiple">

	<div id="cont-container">

	<?php include (TEMPLATEPATH . '/location.php'); ?>
	
	<?php query_posts($query_string . '&order=ASC') ?>
	<?php if (have_posts()) : ?>
		<?php $counter = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="single-summary">
				<?php $counter++; ?>
				<div class="day-number" <?php if ($counter == '1') echo 'id="ie-day-number-fix"'; ?> >
					<p><?php $key="dayNumber"; echo get_post_meta($post->ID, $key, true); ?></p>
				</div>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<div class="comments-counter">
					<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
				</div>				
				<h2><?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?></h2>
				<p class="continue-reading"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Continue Reading</a></p>
				<div class="divider"></div>
			</div>
		<?php endwhile; ?>
		
	</div>
	

	<?php else : ?>
		Not found (no posts)
	<?php endif; ?>

</div></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>