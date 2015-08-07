<div id="map-container"></div>

<!-- ================================================= FOOTER -->

	<div id="footer">
		<div class="container">
			<div id="ship"></div>
			<div id="up-arrow">
				<a href="#top"><img src="<?php bloginfo('template_url'); ?>/images/footer/up2x.png" width="18" height="18" alt="Top of Page" /></a>
			</div>
	
			<div id="footer-content">
				<div id="search">
					<img src="<?php bloginfo('template_url'); ?>/images/footer/search2x.png" width="60" height="18"	alt="Search" />
					<form method="get" id="searchform" action="http://localhost.local/aroundtheworldin480days/" >
						<p><input type="text" id="search-input" name="s" tabindex="5" /></p><div><input type="submit" id="search-submit" /></div>
					</form>
				</div>
				<div id="contact">
					<img src="<?php bloginfo('template_url'); ?>/images/footer/contact2x.png" width="60" height="18"	alt="Contact" /><br />
					<p>Feel free to send us an <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/email.js"></script><br />
					Or look for us in the great Pacific Northwest, USA</p>
				</div>
				<div id="follow">
					<img src="<?php bloginfo('template_url'); ?>/images/footer/follow2x.png" width="60" height="18" alt="Follow" /><br />
					<p><a href="https://www.facebook.com/AroundTheWorldIn480Days" class="external-link">FACEBOOK</a>  &nbsp;|&nbsp;  <a href="https://twitter.com/480days" class="external-link">TWITTER</a>  </p>
				</div>
				<div id="eggfoo">
					<a href="http://www.eggfoo.com" class="external-link"><img src="<?php bloginfo('template_url'); ?>/images/footer/eggfoo2x.png" width="96" height="24"	alt="EGGFOO" /></a><br />				
				</div>
				<div id="copyright-footer">
					<p>&copy; Michael Dziedzic 2015<br /><a href="index.php?page_id=16058">Terms of Use</a> / <a href="index.php?page_id=29627">Privacy Policy</a></p>		
				</div>
				<div id="xhtml-css-wordpress">
					<p>Powered by <a href="http://wordpress.org" class="external-link">WordPress</a></p>			
				</div>				
			</div>
		</div>
	</div>

    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAABirsfoKq35Bh2fyEpxTGYxTMrxmENqKxPChPlSpAGCDWPT-A7hRLudVBOuQXaOaZ7zh5U7aqZn4MIA" type="text/javascript"></script>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>              
    <script type="text/javascript">
        //<![CDATA[
        window.jQuery || document.write('<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-2.1.4.min.js"><\/script>')
        //]]>
    </script>
	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cookie.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/480days.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/map.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.touchSwipe.min.js"></script>
		
	<?php if (is_single()) {
        $key="dayNumber"; 
        $dayNumber = get_post_meta($post->ID, $key, true); ?>
		<?php if (($dayNumber != "001") && ($dayNumber != "FAQ")) { ?>
			<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prev-day.js"></script>
		<?php } ?>
		<?php if (($dayNumber != "480") && ($dayNumber != "FAQ")) { ?>
			<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/next-day.js"></script>
		<?php } ?>
	<?php } ?>
	
</body>
</html>
