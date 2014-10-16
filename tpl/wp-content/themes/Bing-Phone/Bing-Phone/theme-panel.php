<?php
/**
	*本页面用于自定义主题
	*请按照注释提示修改
	*http://www.bgbk.org
*/

$panel = array(

	/**
		*以下内容为配置选项，请修改 “=>” 后的内容
		*http://www.bgbk.org
	*/

	//Timthumb 裁剪缩略图
	'timthumb' => true,

	//jQuery 使用新浪外链
	'jquery_sina' => false,

	//移除头部无用信息（不包括离线编辑器接口）
	'delete_head_meet' => true,

	//移除离线编辑器接口
	'delete_head_meet_offline_editor' => false,

	//垃圾评论拦截
	'comment_anti' => true,

	//评论邮件通知
	'comment_email' => true,

	//文章内容全部链接新窗口打开
	'post_url_blank' => true,

	//文章内容外链添加 nofollow 并在新窗口打开
	'post_url_blank_nofollow' => true,

);

/**
	*至此请勿修改
	*http://www.bgbk.org
*/
function Bing_get_panel( $name = null ){
	global $panel;
	if( !$panel[$name] ) return false;
	return $panel[$name];
}

//Page End.
