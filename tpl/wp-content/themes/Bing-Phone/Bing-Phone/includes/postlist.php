<?php
//主循环样式
function Bing_postlist_loop(){
	wp_reset_query();
	if( have_posts() ):
		if( Bing_is_ajax_list() ) echo '<ul class="postlist">';
		while( have_posts() ):
			the_post();
			Bing_postlist_li();
		endwhile;
		if( Bing_is_ajax_list() ) echo '</ul>';
		echo '<div class="nextpage">';
			next_posts_link( '' );
		echo '</div>';
	else:
		_e( '这里什么内容也没有' , 'Bing');
	endif;
}

//列表样式
function Bing_postlist_li(){
	global $post;
	$type = $post->post_type;
?>
	<li class="list <?php echo $type; ?>">
		<?php if( $type == 'announcement' ): ?>
			<div class="avatarbox"><?php echo get_avatar( get_the_author_email(), '120' ); ?></div>
			<span class="name"><?php the_author_posts_link(); ?>：</span>
			<div class="context"><?php echo $post->post_content; ?></div>
		<?php else: ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="listurl">
				<?php Bing_thumbnail(120); ?>
				<h3 class="title"><?php the_title(); ?></h3>
				<p class="summary"><?php echo mb_strimwidth( strip_tags ( $post->post_content ), 0, 50, "...");if( get_the_time( 'Y' ) == date( 'Y' ) ) $time = get_the_time('n-j');else $time = get_the_time('Y-n-j'); ?><time class="time" datetime="<?php echo $time; ?>"><?php echo $time; ?></time></p>
			</a>
		<?php endif; ?>
		<div class="clear"></div>
	</li>
<?php
}

?>
<?php

wp_reset_query();
if( have_posts() ):
	if( Bing_is_ajax_list() ) echo '<ul class="postlist">';
	while( have_posts() ):
		the_post();
		//文章样式，我用的一个函数
		Bing_postlist_li();
	endwhile;
	if( Bing_is_ajax_list() ) echo '</ul>';
	echo '<div class="nextpage">';
		next_posts_link( '' );
	echo '</div>';
endif;
	?>