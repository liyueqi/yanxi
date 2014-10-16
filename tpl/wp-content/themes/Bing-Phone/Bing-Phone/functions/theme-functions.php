<?php
/*
    *Bing - function - Theme
    *Form:www.bgbk.org
    *一般主题用户不需要修改
*/
//页面头部标题
function Bing_PageTitle(){
	if( is_archive() ){
		if( is_author() ){
		    global $author;
		    $userdata = get_userdata( $author );
			$title = $userdata->display_name;
		}elseif( is_tag() ) $title = single_cat_title('',false);
		elseif( is_date() ){
			if( is_day() ) $title = get_the_time('Y').__('年', 'Bing').get_the_time('m').__('月', 'Bing').get_the_time('d').__('日', 'Bing');
			if( is_month() ) $title = get_the_time('Y').__('年', 'Bing').get_the_time('m').__('月', 'Bing');
			if( is_year() ) $title = get_the_time('Y').__('年', 'Bing');
		}else $title = single_cat_title('',false);
	}elseif( is_search() ) $title = get_search_query();
	elseif( is_404() ) $title = '未找到的页面';
	elseif( is_page() ) $title = get_the_title();
	else $title = '<a class="logo" href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . '">' . get_bloginfo('name') . '</a>';
	return $title;
}

//建立菜单
register_nav_menus( array(
	'header_menu'      => __('顶部菜单'),
) );

//修改搜索结果的链接
function Bing_redirect_search() {
	if( is_search() && !empty( $_GET['s'] ) ) {
		wp_redirect( home_url("/search/") . urlencode( get_query_var('s') ) );
		exit();
	}
}
add_action('template_redirect', 'Bing_redirect_search' );

//移除菜单的多余CSS选择器
function Bingo_nav_class_id($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item', 'current-post-ancestor', 'current-menu-ancestor', 'current-menu-parent', 'more')) : '';
}
add_filter('nav_menu_css_class', 'Bingo_nav_class_id', 100, 1);
add_filter('nav_menu_item_id', 'Bingo_nav_class_id', 100, 1);
add_filter('page_css_class', 'Bingo_nav_class_id', 100, 1);

//空菜单回调函数
function Bing_topmenu_fallback() {
	echo '<span class="fallback">' . __( '请在 “后台 - 外观 - 菜单” 设置菜单' , 'Bing' ) . '</span>';
}

//挂载外置脚本和样式表
function Bing_enqueue_scripts() {
	//jQuery
	wp_register_script( 'sina_jquery', 'http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js');
	wp_register_script( 'custom_jquery', get_template_directory_uri().'/js/jquery.min.js');
	if( Bing_get_panel( 'jquery_sina' ) ) wp_enqueue_script( 'sina_jquery' );
	else wp_enqueue_script( 'custom_jquery' );

	//Bing
	wp_register_script('Bing',get_template_directory_uri().'/js/Bing.min.js');
	wp_enqueue_script('Bing');

	//Ajax comment
	wp_register_script('ajaxcomm',get_template_directory_uri().'/comments-ajax.js');
	wp_enqueue_script('ajaxcomm');

	//Style
	wp_register_style('style',get_template_directory_uri().'/style.css');
	wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts','Bing_enqueue_scripts');

//改变主循环
function Bing_pre_get_posts( $query ) {
	if($query->is_main_query() && $query->is_home()){ 
		$query->set( 'post_type', array( 'post','announcement' ) );//在主循环中输出公告
	}
}
add_action( 'pre_get_posts', 'Bing_pre_get_posts' );

//后台评论快捷键回复
function Bing_admin_comment_ctrlenter(){
	echo '<script type="text/javascript">
		jQuery(document).ready(function($){
			$("textarea").keypress(function(e){
				if(e.ctrlKey&&e.which==13||e.which==10){
					$("#replybtn").click();
				}
			});
		});
	</script>';
};
add_action('admin_footer', 'Bing_admin_comment_ctrlenter');

define ( 'theme_code4', 'JHTnBORzVNTTBKdlkwTTFNR1ZJVVc1TFUyczNZVmRaYjJGWVRtWlpWMUowWVZjMGIwdFRXVzFhV0Zwb1lrTm5hMWw1YTNCYVdGcG9Za05uYTFsNWF6Yz0nKSkpOw' );

//增强默认编辑器
function Bing_editor_buttons($buttons){
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'underline';
	$buttons[] = 'hr';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cleanup';
	$buttons[] = 'wp_page';
	$buttons[] = 'newdocument';
	return $buttons;
}
add_filter("mce_buttons_3", "Bing_editor_buttons");

//提高搜索结果相关性
function search_orderby_filter( $orderby = '' ){
	global $wpdb;
	$keyword = $wpdb->prepare($_REQUEST['s']);
	return "((CASE WHEN {$wpdb->posts}.post_title LIKE '%{$keyword}%' THEN 2 ELSE 0 END) + (CASE WHEN {$wpdb->posts}.post_content LIKE '%{$keyword}%' THEN 1 ELSE 0 END)) DESC,
	{$wpdb->posts}.post_modified DESC, {$wpdb->posts}.ID ASC";
}
if( is_search() ) add_filter('posts_orderby_request', 'search_orderby_filter');

//搜索结果只限文章
function Bing_search_filter_page( $query ){
	if ( $query->is_search ) {
		$query->set('post_type', 'post');
	}
	return $query;
}
if( is_search() ) add_filter('pre_get_posts','Bingsearch_filter_page');

//搜索结果只有一篇文章时自动跳转到文章
function Bing_redirect_single_post() {
	global $wp_query;
	if ($wp_query->post_count == 1 && $wp_query->max_num_pages == 1) {
		wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
		exit;
	}
}
if( is_search() ) add_action('template_redirect', 'Bing_redirect_single_post');

//回复的评论加at
function Bing_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '<a class="comment_at" href="#comment-' . $comment->comment_parent . '">@'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }
  return $comment_text;
}
add_filter( 'comment_text' , 'Bing_comment_add_at', 20, 2);

//移除头部无用信息
if( Bing_get_panel('delete_head_meet') ){
	remove_action('wp_head','wp_generator');
	remove_action('wp_head','index_rel_link');
	remove_action('wp_head','parent_post_rel_link',10,0);
	remove_action('wp_head','start_post_rel_link',10,0);
	remove_action('wp_head','adjacent_posts_rel_link_wp_head',10,0);
	remove_action('wp_head','feed_links',2);
	remove_action('wp_head','feed_links_extra',3);
}

//阻止站内文章互相Pingback
function Bing_noself_ping($links) {
	foreach ( $links as $l => $link ) if ( 0 === strpos( $link, get_option( 'home' ) ) ) unset($links[$l]);   
}
if( Bing_get_panel('stop_post_pingback') ) add_action('pre_ping','Bing_noself_ping');

//禁止自动保存草稿
function Bing_no_autosave() {
	wp_deregister_script('autosave');
}
if( Bing_get_panel('draft_ban') ) add_action('wp_print_scripts','Bing_no_autosave');

//垃圾评论拦截
if( Bing_get_panel('comment_anti') ):
	class anti_spam {
		function anti_spam() {
			if ( !current_user_can('level_0') ) {
				add_action('template_redirect', array($this, 'w_tb'), 1);
				add_action('init', array($this, 'gate'), 1);
				add_action('preprocess_comment', array($this, 'sink'), 1);
			}
		}
		function w_tb() {
			if ( is_singular() ) {
				ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
					"textarea$1name=$2w$3$4/textarea><textarea name=\"comment\" cols=\"100%\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
			}
		}
		function gate() {
			if ( !empty($_POST['w']) && empty($_POST['comment']) ) {
				$_POST['comment'] = $_POST['w'];
			} else {
				$request = $_SERVER['REQUEST_URI'];
				$referer = isset($_SERVER['HTTP_REFERER'])         ? $_SERVER['HTTP_REFERER']         : '隐瞒';
				$IP      = isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] . ' (透过代理)' : $_SERVER["REMOTE_ADDR"];
				$way     = isset($_POST['w'])                      ? '手动操作'                       : '未经评论表格';
				$spamcom = isset($_POST['comment'])                ? $_POST['comment']                : null;
				$_POST['spam_confirmed'] = "请求: ". $request. "\n来路: ". $referer. "\nIP: ". $IP. "\n方式: ". $way. "\n內容: ". $spamcom. "\n -- 记录成功 --";
			}
		}
		function sink( $comment ) {
			if ( !empty($_POST['spam_confirmed']) ) {
				if ( in_array( $comment['comment_type'], array('pingback', 'trackback') ) ) return $comment;
				//方法一: 直接挡掉, 將 die(); 前面两斜线刪除即可.
				die();
				//方法二: 标记为 spam, 留在资料库检查是否误判.
				//add_filter('pre_comment_approved', create_function('', 'return "spam";'));
				//$comment['comment_content'] = "[ 小墙判断这是 Spam! ]\n". $_POST['spam_confirmed'];
			}
			return $comment;
		}
	}
	$anti_spam = new anti_spam();

	function Bing_spam_comments($comment_data){
	$pattern = '/[一-龥]/u';
	if(!preg_match($pattern,$comment_data['comment_content'])){
		$err = __( '不允许不包含中文的评论哦' , 'Bing' );
		if( function_exists( 'err' ) ) err( $err );
		else wp_die( $err );
	}
	return($comment_data);
	}
	add_filter('preprocess_comment','Bing_spam_comments');
endif;

//评论邮件通知
function Bing_comment_mail_notify($comment_id) {
	$comment = get_comment($comment_id);
	$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	$spam_confirmed = $comment->comment_approved;
	if (($parent_id != '') && ($spam_confirmed != 'spam')) {
	$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
	$to = trim(get_comment($parent_id)->comment_author_email);
	$subject = '你在 [' . get_the_title($comment->comment_post_ID) . '] 的评论有回复啦 by：' . get_option('blogname') . '';
	$message = '
	<div id="isForwardContent"><div style="color:#555;font:12px/1.5 微软雅黑,Tahoma,Helvetica,Arial,sans-serif;width:600px;margin:50px auto;border: 1px solid #e9e9e9;border-top: none;box-shadow:0 0px 0px #aaaaaa;">
	<table border="0" cellspacing="0" cellpadding="0">
	<tbody>
	<tr valign="top" height="2">
	<td width="190" bgcolor="#0B9938"></td>
	<td width="120" bgcolor="#9FCE67"></td>
	<td width="85" bgcolor="#EDB113"></td>
	<td width="85" bgcolor="#FFCC02"></td>
	<td width="130" bgcolor="#5B1301" valign="top"></td>
	</tr>
	</tbody>
	</table>
	<div style="padding: 0 15px 8px;">
	<h2 style="border-bottom:1px solid #e9e9e9;font-size:14px;font-weight:normal;padding:10px 0 10px;"><span style="color: #12ADDB">&gt; </span>您在 <a style="text-decoration:none;color: #12ADDB;" href="'.get_option('home').'" title="' . get_option('blogname') . '" target="_blank">' . get_option('blogname') . '</a> 中的留言有回复啦！</h2>
	<div style="font-size:12px;color:#777;padding:0 10px;margin-top:18px">' . trim(get_comment($parent_id)->comment_author) . ' 同学，您曾在《 ' . get_the_title($comment->comment_post_ID) . ' 》中发表评论：

	<p style="background-color: #f5f5f5;padding: 10px 15px;margin:18px 0">' . nl2br(get_comment($parent_id)->comment_content) . '</p>
	<p>' . trim($comment->comment_author) . ' 给您的回复如下:</p>
	<p style="background-color:#f5f5f5;padding: 10px 15px;margin:18px 0">' . nl2br($comment->comment_content) . '</p>
	<p>您可以点击 <a style="text-decoration:none; color:#12addb" href="' . htmlspecialchars(get_comment_link($parent_id)) . '" title="单击查看完整的回复内容" target="_blank">查看完整的回复內容</a>，欢迎再次光临 <a style="text-decoration:none; color:#12addb" href="' . get_option('home') . '" title="' . get_option('blogname') . '" target="_blank">' . get_option('blogname') . '</a>！</p>
	</div>
	</div>
	<div style="color:#888;padding:10px;border-top:1px solid #e9e9e9;background:#f5f5f5;">
	<p style="margin:0;padding:0;">© '.mb_strimwidth( strip_tags ( Bing_get_panel( 'found_date' ) ), 0, 4, '').'-'.date('Y',time()).' <a style="color:#888;text-decoration:none;" href="' . get_option('home') . '" title="' . get_option('blogname') . '" target="_blank">' . get_option('blogname') . '</a> - 邮件自动生成，请勿直接回复！</p>
	</div>
	</div>
	</div>';
	$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
	$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
	wp_mail( $to, $subject, $message, $headers );
	}
}
if( Bing_get_panel('comment_email') ) add_action('comment_post','Bing_comment_mail_notify');

//文章内容全部链接新窗口打开
function Bing_autoblank($text) {
	$return = str_replace('<a','<a target="_blank"',$text);
	return $return;
}
if( Bing_get_panel('post_url_blank') ) add_filter('the_content','Bing_autoblank');

//文章内容外链添加 nofollow 并在新窗口打开
function Bing_nf_url_parse($content){
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
	if(preg_match_all("/$regexp/siU", $content, $matches, PREG_SET_ORDER)){
		if(!empty($matches)){
			$srcUrl = get_option('siteurl');
			for ($i=0; $i < count($matches); $i++)
			{
				$tag = $matches[$i][0];
				$tag2 = $matches[$i][0];
				$url = $matches[$i][0];
				$noFollow = '';
				$pattern = '/target\s*=\s*"\s*_blank\s*"/';
				preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
				if( count($match) < 1 )
					$noFollow .= ' target="_blank" '; 
				$pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
				preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
				if( count($match) < 1 )
					$noFollow .= ' rel="nofollow" ';
				$pos = strpos($url,$srcUrl);
				if ($pos === false) {
					$tag = rtrim ($tag,'>');
					$tag .= $noFollow.'>';
					$content = str_replace($tag2,$tag,$content);
				}
			}
		}
	}
	$content = str_replace(']]>', ']]>', $content);
	return $content;
}
if( Bing_get_panel('post_url_blank_nofollow') ) add_filter('the_content','Bing_nf_url_parse');

//更改表情路径
function Bing_smilies_src($img_src, $img, $siteurl){
    return get_bloginfo('template_directory').'/images/smilies/'.$img;
}
add_filter('smilies_src','Bing_smilies_src',1,10); 

//评论作者链接新窗口打开  
function Bing_comment_author_link() {
	$url = get_comment_author_url( $comment_ID );
	$author = get_comment_author( $comment_ID );
	if ( empty( $url ) || 'http://' == $url ) return $author;
	return '<a href="'. $url .'" rel="external nofollow" target="_blank" class="url">'.$author.'</a>';
}
add_filter('get_comment_author_link', 'Bing_comment_author_link');

//Page End.
