<?php get_header(); ?>

					<!-- ================================================= NAVIGATION -->	
					<?php include (TEMPLATEPATH . '/navigation.php'); ?>



<div id="content"><div id="content-multiple">

	<div id="cont-container">

	
	<?php query_posts($query_string . '&order=ASC') ?>
	<?php if (have_posts()) : ?>
		<?php $counter = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
		
			<?php if ($counter == 0) { ?>		
			<script type="text/javascript">
				var mapWhereAmI = "<?php echo get_the_ID(); ?>"; // sets map location to first post in category, when $counter = 0
			</script>
			<?php } ?>
		
			<div class="single-summary">
			<?php include (TEMPLATEPATH . '/location.php'); ?>
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