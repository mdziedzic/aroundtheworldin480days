				</div>
				
				<!-- ================================================= SUBNAVIGATION -->									
				<div id="subnav">
				
					<div id="journal-photo-container">
						<div id="journal-photo">
							<div id="journal">
								<img src="<?php bloginfo('template_url'); ?>/images/subnav/journal.png" width="81" height="40" alt="Daily Journal" />
								<div id="journal-content">
								
									<div class="dtree">
										<?php 
											if (function_exists('wpdt_list_categories'))
												wpdt_list_categories('exclude=1, 3,192,193,194,195, 226, 227, 228&orderby=name&depth=1&useicons=0&uselines=0&oclinks=0&listposts=0');
										?>				
									</div>

								</div>
							</div>
							<div id="photo">
								<div id="photo-series-title">
									<a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/"><img src="<?php bloginfo('template_url'); ?>/images/subnav/photo.png" width="63" height="36" alt="Photo Series" /></a>
								</div>
								<div id="photo-content">
								
									<div class="dtree">
										<?php 
											if (function_exists('wpdt_list_links'))
												wpdt_list_links('sortby=ID&catsorderby=ID&depth=1&useicons=0&uselines=0&oclinks=0&listposts=0');
										?>				
									</div>
										
										<br />
										<ul>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157624185415868/" title="Architecture">Architecture</a></li>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157635484723021/" title="Detail">Detail</a></li>	
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157624185440774/" title="Favorites">Favorites</a></li>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157624185407928/" title="Food">Food</a></li>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157635492199404/" title="Markets">Markets</a></li>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157624185410090/" title="People">People</a></li>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157624061071723/" title="Transportation">Transportation</a></li>
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157635484865407/" title="Typography">Typography</a></li>	
											<li><a href="http://www.flickr.com/photos/aroundtheworldin480days/sets/72157624443442383/" title="Us">Us</a></li>
										</ul>


								</div> <!-- photo-content -->
							</div> <!-- photo -->
						</div> <!-- journal-photo -->
					</div> <!-- journal-photo-container -->
					
					<div id="noteworthy-container">
						<div id="noteworthy">
							<div id="particularly-noteworthy">
								<img src="<?php bloginfo('template_url'); ?>/images/subnav/noteworthy.png" width="273" height="18" alt="Particularly Noteworthy" />
								
								<ul class="partNoteOpt current-ourFavorites current-mostViews current-mostComments">
									<li class="ourFavorites"><a href="#pnote"></a></li>
									<li class="mostViews"><a href="#pnote"></a></li>
									<li class="mostComments"><a href="#pnote"></a></li>
								</ul>

								<div id="particularly-noteworthy-content">
									<div id="pnc-ourFavorites">
										<ul>
											<li><a href="index.php?page_id=244">034: Want Sarong?</a></li>
											<li><a href="index.php?page_id=276">050: Indonesian Jones</a></li>
											<li><a href="index.php?page_id=280">052: O Canada</a></li>
											<li><a href="index.php?page_id=429">122: Best Cowboy</a></li>
											<li><a href="index.php?page_id=468">140: I Like it Authentic</a></li>
											<li><a href="index.php?page_id=492">152: Happy Herb’s Pizza</a></li>
											<li><a href="index.php?page_id=542">176: Maybe Next Time</a></li>
											<li><a href="index.php?page_id=564">187: Chinese-Mexican Standoff</a></li>
											<li><a href="index.php?page_id=566">188: Not Your Problem, Our Problem</a></li>
											<li><a href="index.php?page_id=599">204: Everybody Dance Now</a></li>
											<li><a href="index.php?page_id=643">226: A Very Dangerous Man</a></li>
											<li><a href="index.php?page_id=792">299: Go Away!</a></li>
											<li><a href="index.php?page_id=814">310: Whitney Houston, I Love Her</a></li>
											<li><a href="index.php?page_id=826">316: The Golden Age of Travel</a></li>
											<li><a href="index.php?page_id=832">319: They’re Like That, Aren’t They?</a></li>
											<li><a href="index.php?page_id=894">350: Have a Good Life!</a></li>
											<li><a href="index.php?page_id=899">352: Nous Sommes Embarqués</a></li>
											<li><a href="index.php?page_id=909">357: Pyramid Scheme</a></li>
											<li><a href="index.php?page_id=913">359: Much Bad Happened</a></li>
											<li><a href="index.php?page_id=915">360: So Many Can’t Have a Dream</a></li>
											<li><a href="index.php?page_id=939">372: The Prime Directive</a></li>
											<li><a href="index.php?page_id=957">381: Welcome to Kenya!</a></li>
											<li><a href="index.php?page_id=1039">421: Run For It!</a></li>
											<li><a href="index.php?page_id=1041">422: Muzungu Use Phone</a></li>
											<li><a href="index.php?page_id=1077">440: False Negatives</a></li>										
										</ul>	
									</div>		
									<div id="pnc-mostViews">
										<?php wpp_get_mostpopular("range='all'&limit=25&order_by='views'&stats_comments=0&stats_views=1&pages=0&pid='2,1172,1748,28,1175'"); ?>		
									</div>																	
									<div id="pnc-mostComments">
										<ul>
											<?php mdv_most_commented(25); ?>
										</ul>
									</div>																	
								</div>
								
							</div>	
						</div>
						<div id="noteworthy-footer"></div>
					</div>
				</div>

			</div> <!-- container -->
		</div>
	</div>


