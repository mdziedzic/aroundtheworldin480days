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


<?php 
	$key="dayNumber";
	if (get_post_meta($post->ID, $key, true) == "FAQ") { ?>
	
<div id="content"><div id="content-faq-entry">
	<img src="<?php bloginfo('template_url'); ?>/images/content/faq/title.png" width="380" height="90" alt="FAQ" />
	
<?php } else { ?>

<div id="content"><div id="content-single">

<?php } ?>



	


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php if (get_post_meta($post->ID, $key, true) != "FAQ") { ?>
		<script type="text/javascript">
			var mapWhereAmI = "<?php echo get_the_ID(); ?>";
		</script>
		<?php } ?>
	
		<?php 
			$key="dayNumber"; 
			if (get_post_meta($post->ID, $key, true) == "FAQ") { ?>

	<div id="iefaqfix">			
		<div id="cont-container">
		
				<div class="search-unleashed-patch"><?php the_title(); ?></div>
			
				<div class="comments-counter">
					<p><a href="#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
				</div>	
				<h2><?php the_title(); ?></h2>	
				<?php include (TEMPLATEPATH . '/font-size.php'); ?>
				<?php the_content(); ?>
		</div>
	</div>
		
		<?php } else { ?>
	
		<div id="cont-container">
		
				<?php include (TEMPLATEPATH . '/location.php'); ?>		

				<div class="search-unleashed-patch"><?php the_title(); ?></div>
	
				<div class="day-number" id="ie-day-number-fix">
					<?php	
						$key="dayNumber"; 
						if (get_post_meta($post->ID, $key, true) != "001") { ?>
							<div id="day-prev">
								<?php 
									$previous_image_link = "<img src='" . get_bloginfo('template_url') . "/images/content/day-prev.gif' width='30' height='61' alt='Previous Day' />";
									previous_post(' %', $previous_image_link, 'no');
					
									$prev_post = get_previous_post();				
									$key = "dayNumber";
									$previous_text_link = "";
								?>
								<p><?php previous_post(' %', $previous_text_link, 'no'); ?></p>	
							</div>
					<?php } ?>
					<?php	
						$key="dayNumber"; 
						if (get_post_meta($post->ID, $key, true) != "479") { ?>
							<div id="day-next">
								<?php 
									$next_image_link = "<img src='" . get_bloginfo('template_url') . "/images/content/day-next.gif' width='30' height='61' alt='Next Day' />";
									next_post(' %', $next_image_link, 'no');
					
									$next_post = get_next_post();				
									$key = "dayNumber";
									$next_text_link = "";
								?>
								<p><?php next_post(' %', $next_text_link, 'no'); ?></p>	
							</div>
					<?php } ?>
					<p><?php $key="dayNumber"; echo get_post_meta($post->ID, $key, true); ?></p>
				</div>
				<h1><?php the_title(); ?></h1>
				<div class="comments-counter">
					<p><a href="#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
				</div>				
				<h2><?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?></h2>
				<?php include (TEMPLATEPATH . '/font-size.php'); ?>
				<?php the_content(); ?>
		</div>
		
			<div id="previous-next">
				<?php	
					$key="dayNumber"; 
					if (get_post_meta($post->ID, $key, true) != "001") { ?>
					<div id="previous">
						<?php 
							$previous_image_link = "<img src='" . get_bloginfo('template_url') . "/images/content/single/previous.gif' width='150' height='23' alt='Previous Day' />";
							previous_post(' %', $previous_image_link, 'no');
			
							$prev_post = get_previous_post();				
							$key = "dayNumber";
							$previous_text_link = get_post_meta($prev_post->ID, $key, true) . ": " . $prev_post->post_title;
						?>
						<p><?php previous_post(' %', $previous_text_link, 'no'); ?></p>	
					</div>
				<?php } ?>
				
				<?php	
					$key="dayNumber"; 
					if (get_post_meta($post->ID, $key, true) != "477") { ?>
					<div id="next">
						<?php 
							$next_image_link = "<img src='" . get_bloginfo('template_url') . "/images/content/single/next.gif' width='150' height='23' alt='Next Day' />";
							next_post(' %', $next_image_link, 'no');
			
							$next_post = get_next_post();				
							$key = "dayNumber";
							$next_text_link = get_post_meta($next_post->ID, $key, true) . ": " . $next_post->post_title;
						?>
						<p><?php next_post(' %', $next_text_link, 'no'); ?></p>	
					</div>
				<?php } ?>
			</div>	
		
		
		
		<?php } ?>
			
			
												
</div></div>

	<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>



<?php get_sidebar(); ?>
<?php get_footer(); ?>