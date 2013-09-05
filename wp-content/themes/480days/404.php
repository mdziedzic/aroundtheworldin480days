<?php get_header(); ?>

					<!-- ================================================= NAVIGATION -->	
					<div>	
						<ul class="nav current-about">
							<li class="home"><a href="/aroundtheworldin480days/">Home</a></li>
							<li class="about"><a href="index.php?page_id=2">About</a></li>
							<li class="faq"><a href="index.php?page_id=1172">FAQ</a></li>
							<li class="press"><a href="index.php?page_id=1175">Press</a></li>
							<li class="map"><a href="index.php?cat=5">Map</a></li>
						</ul>
					</div>	

					<!-- ================================================= CONTENT -->	

					<div id="content"><div id="content-about">
						<img src="<?php bloginfo('template_url'); ?>/images/content/notfound/title.png" width="440" height="90" alt="404 Page Not Found" />
						<div id="emily-michael-photo">
							<img src="<?php bloginfo('template_url'); ?>/images/content/notfound/notfound.jpg" width="442" height="284" class="photo-horiz" alt="Michael reading the New Testament" />
							<p class="photo-tagline-horiz">"I once was lost but now... still lost."</p>
						</div>
						
						<div id="cont-container">
						</div>
					</div></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>