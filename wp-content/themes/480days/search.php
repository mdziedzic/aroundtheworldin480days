<?php get_header(); ?>

					<!-- ================================================= NAVIGATION -->	
					<?php include (TEMPLATEPATH . '/navigation.php'); ?>



					<!-- ================================================= CONTENT -->									

					<div id="content"><div id="content-search-results">
						<img src="<?php bloginfo('template_url'); ?>/images/content/search-results/title.png" width="380" height="90" alt="Search Results" />
						
						<div id="cont-container">
						
							<div class="search-results-section">
								<h2>Searched for: <?php the_search_query(); ?></h2>

								<?php // to reverse the order of the posts
								$wp_query->posts = array_reverse( $wp_query->posts ); ?> 


								<?php if (have_posts()) : ?>
							
									<?php while (have_posts()) : the_post(); ?>
									
										<div class="search-results-entry">		
								
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble2x.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="search-results-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x2x.png" width="7" height="7" alt="x" />
											</div>
											<?php
												$key="dayNumber";
												$ddaynnumber =  get_post_meta($post->ID, $key, true);
											?>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo ($ddaynnumber . ": "); the_title(); ?></a></p>
											<small class="datetimehide"><?php the_time('l, F jS, Y') ?></small>
											<?php the_excerpt(); ?>
										</div>
									
									<?php endwhile; ?>
							
								<?php else : ?>
							
									<h2 id="noresults-h2">Alas, no posts found. Common words ("the," "while," "somehow," etc.) are not included in the search.</h2>

									<div>
										<form method="get" action="http://localhost.local/aroundtheworldin480days/" >
											<p><input type="text" id="search-input-noresults" name="s" tabindex="1" /></p><div><input type="submit" id="search-submit-noresults" /></div>
										</form>
									</div>
							
								<?php endif; ?>



							</div> <!-- .search-results-section -->
						
						</div>
					</div></div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
