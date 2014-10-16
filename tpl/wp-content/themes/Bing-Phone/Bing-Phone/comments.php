<?php
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
			?>
			<p class="nocomments">必须输入密码，才能查看评论！</p>
			<?php
			return;
		}
	}
	$oddcomment = '';
?>
<section class="comments" id="comments">
	<h3>留言板</h3>
	<div class="main">
		<?php if ($comments) : ?>
			<div class="commentshow">
				<ol class="commentlist">
					<?php wp_list_comments('type=comment&callback=Bing_comment&end-callback=Bing_end_comment&max_depth=23'); ?>
				</ol>
				<nav class="commentnav" data-post-id="<?php echo $post->ID; ?>">
					<div class="pagenavi"><?php paginate_comments_links('prev_text=«&next_text=»'); ?><div class="clear"></div></div>
					<div class="clear"></div>
				</nav>
			</div>
		<?php else : ?>
			<?php if ('open' != $post->comment_status) : ?>
				<p class="nocomments">评论被关闭啦！</p>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ('open' == $post->comment_status) : ?>
			<div id="respond_box">
				<div id="respond">
					<div class="cancel-comment-reply">
						<div id="real-avatar">
							<?php if(isset($_COOKIE['comment_author_email_'.COOKIEHASH])) : ?>
								<?php echo get_avatar($comment_author_email, 40);?>
							<?php else :?>
								<?php global $user_email;?><?php echo get_avatar($user_email, 46); ?>
							<?php endif;?>
							<h3>发表评论</h3>
						</div>	
						<div class="cancel"><small><?php cancel_comment_reply_link(); ?></small></div>
						<div class="clear"></div>
					</div>
				<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
			    <?php else : ?>
				    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
						<div class="clear"></div>
						<div class="comment-textarea">
							<textarea name="comment" class="enter textarea" id="comment" placeholder="<?php _e( '输入评论内容...' , 'Bing' ); ?>" tabindex="4" cols="50" rows="5"></textarea>
							<?php if ( ! $user_ID ): ?>
								<div class="clear"></div>
								<div id="comment-author-info">
									<p>
										<input type="text" name="author" id="author" class="commenttext enter" placeholder="<?php _e( '昵称' , 'Bing' );if ($req) echo " *"; ?>" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
										<label for="author">昵称<?php if ($req) echo " *"; ?></label>
									</p>
									<p>
										<input type="text" name="email" id="email" class="commenttext enter" placeholder="<?php _e( '邮箱' , 'Bing' );if ($req) echo " *"; ?>" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
										<label for="email">邮箱<?php if ($req) echo " *"; ?> </label>
									</p>
									<p class="last">
										<input type="text" name="url" id="url" class="commenttext enter" placeholder="<?php _e( '网址' , 'Bing' ); ?>" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
										<label for="url">网址</label>
									</p>
									<div class="clear"></div>
								</div>
							<?php endif; ?>
							<div class="clear"></div>
						</div>
						<p>
							<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e(提交); ?>" />
							<?php comment_id_fields(); ?>
						</p>
						<p class="smiley"><i class="icon-smiley"></i><div class="smileyimg"><?php include(TEMPLATEPATH.'/includes/smiley.php'); ?></div></p>
				    	<?php if ( $user_ID ) : ?><p id="user"><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a></p><?php endif; ?>
						<?php do_action('comment_form', $post->ID); ?>
				    </form>
					<div class="clear"></div>
			    <?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	</div>
</section>