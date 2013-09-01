<?php
/*
Template Name: FAQ
*/
?>


<?php get_header(); ?>

					<!-- ================================================= NAVIGATION -->	
					<div>	
						<ul class="nav current-faq">
							<li class="home"><a href="/aroundtheworldin480days/">Home</a></li>
							<li class="about"><a href="index.php?page_id=2">About</a></li>
							<li class="faq"><a href="index.php?page_id=1172">FAQ</a></li>
							<li class="press"><a href="index.php?page_id=1175">Press</a></li>
							<li class="map"><a href="index.php?cat=5">Map</a></li>
						</ul>
					</div>	

					<!-- ================================================= CONTENT -->	

					<div id="content"><div id="content-faq">
						<img src="<?php bloginfo('template_url'); ?>/images/content/faq/title.png" width="380" height="90" alt="FAQ" />
						<div id="cont-container">
						
						
							<div class="faq-section">
								<h2>Planning</h2>
								<?php query_posts("cat=193&order=ASC") ?>
								<?php if (have_posts()) : ?>
									<?php $counter = 0; ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="faq-question">
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="faq-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x.png" width="7" height="7" alt="x" />
											</div>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>			
										</div>
									<?php endwhile; ?>								
								<?php else : ?>
									Not found (no posts)
								<?php endif; ?>																		
							</div>

							<div class="faq-section">
								<h2>Life on the Road</h2>
								<?php query_posts("cat=194&order=ASC") ?>
								<?php if (have_posts()) : ?>
									<?php $counter = 0; ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="faq-question">
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="faq-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x.png" width="7" height="7" alt="x" />
											</div>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>			
										</div>
									<?php endwhile; ?>								
								<?php else : ?>
									Not found (no posts)
								<?php endif; ?>																		
							</div>

							<div class="faq-section">
								<h2>Photography</h2>
								<?php query_posts("cat=226&order=ASC") ?>
								<?php if (have_posts()) : ?>
									<?php $counter = 0; ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="faq-question">
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="faq-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x.png" width="7" height="7" alt="x" />
											</div>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>			
										</div>
									<?php endwhile; ?>								
								<?php else : ?>
									Not found (no posts)
								<?php endif; ?>																		
							</div>

							<div class="faq-section">
								<h2>Travel</h2>
								<?php query_posts("cat=227&order=ASC") ?>
								<?php if (have_posts()) : ?>
									<?php $counter = 0; ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="faq-question">
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="faq-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x.png" width="7" height="7" alt="x" />
											</div>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>			
										</div>
									<?php endwhile; ?>								
								<?php else : ?>
									Not found (no posts)
								<?php endif; ?>																		
							</div>

							<div class="faq-section">
								<h2>A Few of Our Favorite Things</h2>
								<?php query_posts("cat=195&order=ASC") ?>
								<?php if (have_posts()) : ?>
									<?php $counter = 0; ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="faq-question">
											<div class="comments-counter">
												<p><a href="<?php the_permalink() ?>#comments-link"><img src="<?php bloginfo('template_url'); ?>/images/content/bubble.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></a></p>
											</div>
											<div class="faq-x">
												<img src="<?php bloginfo('template_url'); ?>/images/content/x.png" width="7" height="7" alt="x" />
											</div>
											<p class="entry-link"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>			
										</div>
									<?php endwhile; ?>								
								<?php else : ?>
									Not found (no posts)
								<?php endif; ?>																		
							</div>


						
						</div>
					</div></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>