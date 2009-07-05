<?php get_header(); ?>

					<!-- ================================================= NAVIGATION -->	
								
					<div>	
						<ul class="nav current-press">
							<li class="home"><a href="/aroundtheworldin480days/">Home</a></li>
							<li class="about"><a href="index.php?page_id=2">About</a></li>
							<li class="faq"><a href="index.php?page_id=1172">FAQ</a></li>
							<li class="press"><a href="index.php?page_id=1175">Press</a></li>
							<li class="map"><a href="index.php?cat=5">Map</a></li>
						</ul>
					</div>	

					<!-- ================================================= CONTENT -->									

					<div id="content"><div id="content-search-results">
						<img src="<?php bloginfo('template_url'); ?>/images/content/search-results/title.png" width="380" height="90" alt="Search Results" />
						
						<div id="cont-container">
						
							<div class="search-results-section">
								<h2>Searched for: <?php the_search_query(); ?></h2>



								<?php if (have_posts()) : ?>
							
									<?php while (have_posts()) : the_post(); ?>
									
										<div class="search-results-entry">		
								
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="search-results-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x.png" width="7" height="7" alt="x" />
											</div>
											<?php
												$key="dayNumber";
												$ddaynnumber =  get_post_meta($post->ID, $key, true);
											?>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo ($ddaynnumber . ": "); the_title(); ?></a></p>
											<small class="datetimehide"><?php the_time('l, F jS, Y') ?></small>
										</div>
									
									<?php endwhile; ?>
							
									<div class="navigation">
										<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
										<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
									</div>
							
								<?php else : ?>
							
									<p>No posts found. Perhaps you would like to try a different search?</p>

									<div id="search">
										<form method="get" id="searchform" action="http://localhost.local/aroundtheworldin480days/" >
											<p><input type="text" id="search-input-noresults" name="s" /><input type="submit" id="search-submit-noresults" /></p>
										</form>
									</div>
							
								<?php endif; ?>



							</div> <!-- .search-results-section -->
						
						</div>
					</div></div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
