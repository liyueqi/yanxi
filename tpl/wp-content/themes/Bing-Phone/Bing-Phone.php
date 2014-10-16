<?php
/*
Plugin Name:Bing-Phone
Plugin URI:http://www.bgbk.org/wp-theme-bing-phone.html
Description:The template by <a href="http://www.bgbk.org">斌果</a>.
Version:1.0
Author:斌果
Author URI:http://www.bgbk.org
*/
require_once 'Mobile_Detect.php';
function Bing_phone_switching_theme(){
	return '../plugins/Bing-Phone/Bing-Phone';
}
$detect = new Mobile_Detect();
if( $detect->isMobile() ){
	add_filter( 'template', 'Bing_phone_switching_theme' );
	add_filter( 'stylesheet', 'Bing_phone_switching_theme' );
}

//自动建立页面
function Bing_auto_new_page(){
	//搜索页面
	$new_page = array(
		'post_type' => 'page',
		'post_title' => '搜索',
		'post_content' => '',
		'post_status' => 'publish',
		'post_author' => 1,
		'post_name' => 'search'
	);
	$new_page_id = wp_insert_post( $new_page );
	update_post_meta( $new_page_id, '_wp_page_template', 'page-search.php');

	//分类页面
	$new_page = array(
		'post_type' => 'page',
		'post_title' => '分类',
		'post_content' => '',
		'post_status' => 'publish',
		'post_author' => 1,
		'post_name' => 'category'
	);
	$new_page_id = wp_insert_post( $new_page );
	update_post_meta( $new_page_id, '_wp_page_template', 'page-category.php');

	//信息页面
	$new_page = array(
		'post_type' => 'page',
		'post_title' => '信息',
		'post_content' => '',
		'post_status' => 'publish',
		'post_author' => 1,
		'post_name' => 'info'
	);
	$new_page_id = wp_insert_post( $new_page );
}

//建立文件夹
function Bing_auto_new_mkdir(){
	@mkdir( ABSPATH . '/avatar' );
}
if( is_admin() && $_GET[ 'activate' ] ){
	add_action( 'init', 'Bing_auto_new_page' );
	add_action( 'init', 'Bing_auto_new_mkdir' );
}

//Page End.
