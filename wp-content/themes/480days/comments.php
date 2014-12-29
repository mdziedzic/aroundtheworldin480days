<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

	<div id="comments"><a id="comments-link"></a>
		<div class="comments-counter">
			<p><img src="<?php bloginfo('template_url'); ?>/images/content/bubble-black2x.png" width="11" height="10" alt="Comments" /> <?php comments_number('0', '1', '%' );?></p>
		</div>
		<div id="comments-title">
			<?php $themePath = get_bloginfo('template_url'); ?>
			<?php $imagePath = '<img src="' . $themePath . '/images/content/rss2x.png" width="42" height="25" alt="RSS - This Post&rsquo;s Comments" title="RSS - This Post&rsquo;s Comments" />'; ?>		
			<img src="<?php bloginfo('template_url'); ?>/images/content/comments2x.png" width="118" height="25" alt="Comments" />
			<?php post_comments_feed_link( $link_text = $imagePath) ?>
		</div>


<?php if ( have_comments() ) : ?>

	<ul class="commentlist">
	<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ul>
	
	<?php if ('open' != $post->comment_status) { ?>
		<div id="comments-closed">
			<p>No longer taking comments on this post.</p>
		</div>
	<?php } ?>
	
<!--
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
-->
	
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<div id="no-comments"></div>
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<div id="comments-closed-no-responses">
			<p>Comments for this post have been closed.</p>
		</div>
	<?php endif; ?>
<?php endif; ?>



<?php if ('open' == $post->comment_status) : ?>

	<div id="respond">

<!-- 		<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3> -->

		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<div id="post-comments">
			
				<?php if ( $user_ID ) : ?>
					<div id="logged-in">
						<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a>.</p>
					</div>
				<?php else : ?>

					<div id="post-comments-name">
						<input type="text" name="author" id="author" value="Name" tabindex="1" maxlength="40" onclick="this.focus();this.select()" />
					</div>
					<div id="post-comments-email">
						<input type="text" name="email" id="email" value="Email - Required" size="22" tabindex="2" maxlength="150" onclick="this.focus();this.select()" />
					</div>
					<div id="post-comments-url">
						<input type="text" name="url" id="url" value="http://" size="22" tabindex="3" maxlength="300" onclick="this.focus();this.select()" />
					</div>
		
				<?php endif; ?>
		
				<div id="post-comments-comments">
					<textarea name="comment" id="comment" rows="10" cols="80" tabindex="4"></textarea>
				</div>
	
				<input name="submit" type="image" id="submit" src="<?php bloginfo('template_url'); ?>/images/content/post-comments2x.png" tabindex="5" value="Submit Comment" />
				<p id="comments-inappropriate">We reserve the right to remove any off-topic or inappropriate comments.</p>

				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
				
			</div>
			</form>

		<?php endif; // If registration required and not logged in ?>
		
	</div>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>
