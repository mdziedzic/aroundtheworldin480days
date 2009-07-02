<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><div class="wrap">
	<h2><?php _e ('Search Unleashed | Index', 'search-unleashed'); ?></h2>
	<?php $this->submenu (true); ?>
	
	<?php if ($total == 0) : ?>
		<p style="clear: both"><?php _e ('You have no items in the search index.  Please re-index soon!', 'search-unleashed'); ?></p>
	<?php else : ?>
		<p style="clear: both"><?php printf (__ngettext ('You have <strong>%d</strong> item in the search index.', 'You have <strong>%d</strong> items in the search index.', $total, 'search-unleashed'), $total) ?>
		</p>
	<?php endif; ?>
	
	<p><?php printf (__ngettext ('<strong>%d search</strong> has been performed using this plugin. ', '<strong>%d searches</strong> have been performed using this plugin. ', $options['count'], 'search-unleashed'), $options['count'])?></p>

	<?php if ($options['kitten'] == false) : ?>
	 <?php _e ('You can help support the author by sending a donation..', 'search-unleashed'); ?>
	 <?php _e ('All it takes is <strong>$8</strong> to act as an incentive for me to carry on writing other free software.', 'search-unleashed'); ?>
	</p>
	
	<p><img class="kitten" src="<?php echo $this->url () ?>/images/kitten.jpg" width="150" height="204" alt="Kitten"/></p>
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="admin@urbangiraffe.com">
	<input type="hidden" name="item_name" value="Search Unleashed">
	<input type="hidden" name="amount" value="8.00">
	<input type="hidden" name="buyer_credit_promo_code" value="">
	<input type="hidden" name="buyer_credit_product_category" value="">
	<input type="hidden" name="buyer_credit_shipping_method" value="">
	<input type="hidden" name="buyer_credit_user_address_change" value="">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="return" value="http://urbangiraffe.com/plugins/search-unleashed/">
	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="tax" value="0">
	<input type="hidden" name="lc" value="US">
	<input type="hidden" name="bn" value="PP-DonationsBF">
	<input type="image" class="kitten" style="border: none" src="https://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
	</form>
	<?php else : ?>
	<?php endif; ?>

</div>

<div class="wrap">
	<h2><?php _e ('Re-Index Search Unleashed', 'search-unleashed'); ?></h2>
	
	<p><?php _e ('You need to re-index the search database when', 'search-unleashed'); ?>:</p>
	<ul>
		<li><?php _e ('You first install this plugin', 'search-unleashed'); ?></li>
		<li><?php _e ('You change what to include in the search', 'search-unleashed'); ?></li>
		<li><?php _e ('You install another plugin that may alter posts or comments', 'search-unleashed'); ?></li>
	</ul>
	
	<p><?php _e ('Changes to individual posts &amp; comments will be automatically re-indexed - <strong>you do not need to re-index after editing posts</strong>.', 'search-unleashed'); ?></p>
	
	<p>
		<input class="button-secondary" type="submit" name="reindex" value="<?php _e ('Re-index posts', 'search-unleashed'); ?>" onclick="return index (0,'posts');" id="index_posts"/>
		<input class="button-secondary" type="submit" name="reindex" value="<?php _e ('Re-index comments', 'search-unleashed'); ?>" onclick="return index (0,'comments');" id="index_comments"/>
	</p>
	
	<div id="wrapper">
		<div id="outer" style="display: none">
		</div>
		
		<input class="button-secondary" type="submit" name="cancel" value="<?php _e ('Cancel', 'search-unleashed'); ?>" id="cancel" onclick="return cancel_index ()" style="display: none"/>
	</div>
</div>

