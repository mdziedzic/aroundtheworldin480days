<?php


add_filter('comment_text', 'wp_filter_nohtml_kses');
add_filter('comment_text_rss', 'wp_filter_nohtml_kses');
add_filter('comment_excerpt', 'wp_filter_nohtml_kses');

if ( function_exists('register_sidebar') )
    register_sidebar();
    
/*
if (function_exists('wpp_get_mostpopular')) 
	wpp_get_mostpopular("range='all'&limit=20&order_by='views'"); 

*/


function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}



function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
   global $cmntCnt;
   $cmntCnt++;
?>
   
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="response">
		<div id="div-comment-<?php comment_ID(); ?>">
    	
			
			<?php if (($comment->comment_author == 'Name') || ($comment->comment_author == 'Name - Required'))
				$comment->comment_author = 'Anonymous'; ?>
				
			<div class="respondee">
				<p><span class="respondee-name">
				<?php if (get_comment_author_url() != "") { ?>
				
					<?php if ($comment->comment_author == "Emily Dziedzic" || $comment->comment_author == "Michael Dziedzic"){ ?>
						<a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a>
					<?php } else { ?>
						<a href="<?php comment_author_url(); ?>" class="external-link"><?php comment_author(); ?></a>
					<?php } ?>
					
				<?php } else { ?>
					<?php comment_author(); ?>
				<?php } ?></span>&nbsp;|&nbsp;&nbsp;<?php printf(__('%1$s'), get_comment_date()) ?></p>
			</div>
	
			<div <?php if ($comment->comment_approved == '0') echo 'class="response-box-moderation"'; ?> class="response-box">
			
		    	<div class="response-counter">
					<p><?php echo $cmntCnt; ?></p>
				</div>
			
				<?php comment_text() ?>
				
		      	<?php if ($comment->comment_approved == '0') : ?>
		         	<div class="comment-moderation">
		         		<?php _e('<p>Since you are new to the site, your comment is awaiting moderation.</p>') ?>
		         	</div>
		      	<?php endif; ?>				
				
			</div>
	
			<?php if ($comment->comment_author == "Emily Dziedzic"){ ?>
				<div class="respondee-emily">
					<img src="<?php bloginfo('template_url'); ?>/images/content/response-emily2x.png" width="45" height="29" alt="Emily's Response" />
				</div>
			<?php } ?>
			<?php if ($comment->comment_author == "Michael Dziedzic"){ ?>
				<div class="respondee-michael">
					<img src="<?php bloginfo('template_url'); ?>/images/content/response-michael2x.png" width="45" height="29" alt="Michael's Response" />
				</div>
			<?php } ?>		
	
	
	<!--
	      	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
	      	<div class="reply">
	         	<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	      	</div>
	-->
      	
     </div>
     </div>

<?php } ?>