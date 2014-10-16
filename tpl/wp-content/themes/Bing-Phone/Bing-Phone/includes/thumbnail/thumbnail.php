<?php
/*
	*Bing - 缩略图
	*From：http://www.bgbk.org
	*一般主题用户不需要修改
*/

//添加特色缩略图支持
if(function_exists('add_theme_support')) add_theme_support('post-thumbnails');

//输出缩略图地址
function Bing_post_thumbnail_src(){
    global $post;
	if($values = get_post_custom_values("thumb")){
		$values = get_post_custom_values("thumb");
		$post_thumbnail_src = $values [0];
	}elseif(has_post_thumbnail()){
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_src = $thumbnail_src[0];
    }else{
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$post_thumbnail_src = $matches [1] [0];
		if(empty($post_thumbnail_src)){
			$random = mt_rand(1, 10);
			echo get_bloginfo('template_url').'/includes/thumbnail/img/'.$random.'.png';
		}
	};
	echo $post_thumbnail_src;
}

//定义缩略图
function Bing_thumbnail($picw,$pich=''){
	if($pich=='') $pich = $picw;
?>
	<div class="picbox">
		<img src="<?php bloginfo('template_directory'); ?>/images/load.png" data-src="<?php if( Bing_get_panel('timthumb') ): ?><?php bloginfo('template_directory'); ?>/includes/thumbnail/timthumb.php?src=<?php endif; ?><?php echo Bing_post_thumbnail_src() ?><?php if( Bing_get_panel('timthumb') ): ?>&h=<?php echo $pich ?>&w=<?php echo $picw ?>&q=90&zc=1<?php endif; ?>" class="pic" width="<?php echo $picw; ?>" height="<?php echo $pich; ?>" alt="<?php the_title(); ?>" />
	</div>
<?php
}

//本页设置结束
?>