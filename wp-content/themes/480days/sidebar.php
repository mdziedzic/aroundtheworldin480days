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
									<ul>
										<li class="close"><a href="">Australia</a></li>
										<li class="close"><a href="">Indonesia</a></li>
										<li class="close"><a href="">Malaysia</a></li>
										<li class="off"><a href="">Singapore</a></li>
										<li class="close"><a href="">Thailand</a></li>
										<li class="open"><a href="">Myanmar</a>
											<ul>
												<li class="off"><a href="">Yangon</a></li>
												<li class="off"><a href="">Mandalay</a></li>
												<li class="off"><a href="">Kalaw</a></li>
												<li class="off"><a href="">Mandalay</a></li>
												<li class="off"><a href="">Pyin U Lwin</a></li>
												<li class="off"><a href="">Hsipaw</a></li>
												<li class="off"><a href="">Mawlamyine</a></li>
												<li class="off"><a href="">Hpa An</a></li>
											</ul>
										</li>											
										<li class="close"><a href="">Laos</a></li>
										<li class="close"><a href="">Cambodia</a></li>
										<li class="close"><a href="">Vietnam</a></li>
										<li class="close"><a href="">China</a></li>
										<li class="off"><a href="">Mongolia</a></li>
										<li class="close"><a href="">Russia</a></li>
										<li class="off"><a href="">Estonia</a></li>
										<li class="off"><a href="">Latvia</a></li>
										<li class="off"><a href="">Lithuania</a></li>
										<li class="close"><a href="">Poland</a></li>
										<li class="close"><a href="">Turkey</a></li>
										<li class="close"><a href="">Syria</a></li>
										<li class="off"><a href="">Jordan</a></li>
										<li class="close"><a href="">Egypt</a></li>
										<li class="close"><a href="">Sudan</a></li>
										<li class="close"><a href="">Ethiopia</a></li>
										<li class="off"><a href="">Kenya</a></li>
										<li class="close"><a href="">Uganda</a></li>
										<li class="close"><a href="">Rwanda</a></li>
										<li class="off"><a href="">Burundi</a></li>
										<li class="close"><a href="">Tanzania</a></li>
										<li class="off"><a href="">Zambia</a></li>
										<li class="close"><a href="">Namibia</a></li>
										<li class="close"><a href="">South Africa</a></li>
										<li class="off">&nbsp;</li>											
										<li class="off"><a href="">Food</a></li>	
										<li class="off"><a href="">Transportation</a></li>	
										<li class="off"><a href="">Architecture</a></li>	
										<li class="off"><a href="">Us</a></li>	
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
										<ul>
											<li><a href="">185: Streetfight on the streets of Hanoi and the case of the questionable luggage</a></li>
											<li><a href="">95: What the fuck is that monkey doing to my leg?</a></li>
											<li><a href="">FAQ: What was your travelling philosphy?</a></li>		
											<li><a href="">133 Flight to Yangon, Myanmar</a></li>
											<li><a href="">FAQ: What did you bring with you?</a></li>
											<li><a href="">402: Zanzibar and the Cerebral Malaria episode</a></li>
											<li><a href="">35: Want boat?</a></li>
											<li><a href="">FAQ: What medical precautions and perparations did you take?</a></li>
											<li><a href="">333: Cairo and the mistaken case of meat and when I Have Fears that I may cease to Be Before My Pen has Gleaned my Teeming Brain</a></li>
											<li><a href="">375: Large bags of pot in Uganda</a></li>
											<li><a href="">185: Streetfight on the streets of Hanoi and the case of the questionable luggage</a></li>
											<li><a href="">95: What the fuck is that monkey doing to my leg?</a></li>
											<li><a href="">FAQ: What was your travelling philosphy?</a></li>	
										
											<li><a href="">133 Flight to Yangon, Myanmar</a></li>
											<li><a href="">FAQ: What did you bring with you?</a></li>
											<li><a href="">402: Zanzibar and the Cerebral Malaria episode</a></li>
											<li><a href="">35: Want boat?</a></li>
											<li><a href="">FAQ: What medical precautions and perparations did you take?</a></li>
											<li><a href="">333: Cairo and the mistaken case of meat</a></li>
											<li><a href="">375: Large bags of pot in Uganda</a></li>
										</ul>	
									</div>																	
									<div id="pnc-mostComments">
										<ul>
											<li><a href="">400 My Wilburs have Gone Nutty and But So Who The Fuck Do You Think You Are?</a></li>
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
								</div>
								
							</div>	
						</div>
						<div id="noteworthy-footer"></div>
					</div>
				</div>

			</div> <!-- container -->
		</div>
	</div>


