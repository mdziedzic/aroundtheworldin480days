				</div>
				
				<!-- ================================================= SUBNAVIGATION -->									
				<div id="subnav">
				
					<div id="journal-photo-container">
						<div id="journal-photo">
							<div id="journal">
								<img src="<?php bloginfo('template_url'); ?>/images/subnav/journal.png" width="81" height="40" alt="Daily Journal" />
								<div id="journal-content">
								
										<?php 
											if (function_exists('wp_dtree_get_categories')){
												wp_dtree_get_categories();
											}else{
												wp_list_categories('show_count=1');
											} 
										?>				

								</div>
							</div>
							<div id="photo">
								<img src="<?php bloginfo('template_url'); ?>/images/subnav/photo.png" width="63" height="36" alt="Photo Series" />
								<div id="photo-content">
								
										<?php 
											if (function_exists('wp_dtree_get_links')){
												wp_dtree_get_links();
											}else{
												wp_list_categories('show_count=1');
											} 
										?>				

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
											<li><a href="">133 Flight to Yangon, Myanmar</a></li>
											<li><a href="">FAQ: What did you bring with you?</a></li>
											<li><a href="">402: Zanzibar and the Cerebral Malaria episode</a></li>
											<li><a href="">35: Want boat?</a></li>
											<li><a href="">FAQ: What medical precautions and perparations did you take?</a></li>
											<li><a href="">333: Cairo and the mistaken case of meat</a></li>
											<li><a href="">375: Large bags of pot in Uganda</a></li>
											<li><a href="">185: Streetfight on the streets of Hanoi and the case of the questionable luggage</a></li>
											<li><a href="">95: What the fuck is that monkey doing to my leg?</a></li>
											<li><a href="">FAQ: What was your travelling philosphy?</a></li>																			<li><a href="">133 Flight to Yangon, Myanmar</a></li>
											<li><a href="">FAQ: What did you bring with you?</a></li>
											<li><a href="">402: Zanzibar and the Cerebral Malaria episode</a></li>
											<li><a href="">35: Want boat?</a></li>
											<li><a href="">FAQ: What medical precautions and perparations did you take?</a></li>
											<li><a href="">333: Cairo and the mistaken case of meat</a></li>
											<li><a href="">375: Large bags of pot in Uganda</a></li>
											<li><a href="">185: Streetfight on the streets of Hanoi and the case of the questionable luggage</a></li>
											<li><a href="">95: What the fuck is that monkey doing to my leg?</a></li>
											<li><a href="">FAQ: What was your travelling philosphy?</a></li>
										</ul>	
									</div>		
									<div id="pnc-mostViews">
										<?php get_mostpopular(); ?>										
									</div>																	
									<div id="pnc-mostComments">
										<ul>
											<?php mdv_most_commented(20); ?>
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


