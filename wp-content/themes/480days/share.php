              <?php 

                if (is_single()) { 
                  $key="dayNumber"; 
                  $dayNumber = get_post_meta($post->ID, $key, true);
                  $title = get_bloginfo('name') . " &raquo; " . $dayNumber . ": " . get_the_title();
                } else if (is_category()) { 
                } else { 
                  $title = get_bloginfo('name');
                }
              ?>

						<div id="share">
							<ul>
								<li><a href="#" onclick="window.open(
      									'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
      									'facebook-share-dialog', 
      									'width=626,height=436'); 
    									return false;"><img src="<?php bloginfo('template_url'); ?>/images/content/share/facebook2x.png" width="16" height="16" alt="Facebook Share" /></a></li>

								<li><a href="#" onclick="window.open(
      									'https://twitter.com/share?url=' +  <?php echo "'" . site_url() . "'"; ?>, 
      									'twitter-share-dialog',
      									'width=626,height=436'); 
    									return false;"><img src="<?php bloginfo('template_url'); ?>/images/content/share/twitter2x.png" width="16" height="16" alt="Twitter Share" /></a></li>

								<li><a href="https://plus.google.com/share?url={URL}" onclick=
										"javascript:window.open(this.href,
  										'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php bloginfo('template_url'); ?>/images/content/share/google2x.png" width="16" height="16" alt="Google Plus Share" /></a></li>

								<li><a href="" onclick="window.open(
      									'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location), 
      									'twitter-share-dialog'); 
    									return false;"><img src="<?php bloginfo('template_url'); ?>/images/content/share/reddit2x.png" width="16" height="16" alt="Reddit Share" /></a></li>

								<li><a href="mailto:?subject=<? echo $title; ?>&amp;body=<?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']; ?>"><img src="<?php bloginfo('template_url'); ?>/images/content/share/mail2x.png" width="16" height="16" alt="Mail Share" /></a></li>
							</ul>
						</div>


