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
					<form method="get" id="searchform" action="<?php bloginfo('template_url'); ?>/../../../" >
						<p><input type="text" id="search-input" name="s" tabindex="5" /></p><div><input type="submit" id="search-submit" /></div>
					</form>
				</div>
				<div id="contact">
					<img src="<?php bloginfo('template_url'); ?>/images/footer/contact2x.png" width="60" height="18"	alt="Contact" /><br />
					<p>Feel free to send us an <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/email.js"></script><br />
					Or take a bottled message to the sea...</p>
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
    
    <script type="text/javascript">
        //<![CDATA[
        window.jQuery || document.write('<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-2.1.4.min.js"><\/script>')
        //]]>
    </script>
	
    <!-- build:jsfooter -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cookie.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/480days.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/map.js"></script>	
	<!-- endbuild -->
	
    <!-- Google Analytics-->
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-66177009-1', 'auto');
        ga('send', 'pageview');
    </script>	
		
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
