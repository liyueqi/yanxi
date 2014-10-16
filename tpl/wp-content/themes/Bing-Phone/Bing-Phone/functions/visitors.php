<?php
/*
    *Bing - function - visitors
    *Form:www.bgbk.org
    *一般主题用户不需要修改	
*/

//访问计数
function Bing_record_visitors(){
	if (is_singular()) {
		global $post;
		$post_ID = $post->ID;
		if($post_ID){
			$post_views = (int)get_post_meta($post_ID, 'views', true);
			if(!update_post_meta($post_ID, 'views', ($post_views+1))) add_post_meta($post_ID, 'views', 1, true);
		}
	}
}
add_action('wp_head', 'Bing_record_visitors');

//输出计数
function Bing_post_views($before = false, $after = false)
{
	if(function_exists('the_views')) the_views();
	else{
	global $post;
		$post_ID = $post->ID;
		$views = (int)get_post_meta($post_ID, 'views', true);
		echo $before, number_format($views), $after;
	}
};

//Page End.
