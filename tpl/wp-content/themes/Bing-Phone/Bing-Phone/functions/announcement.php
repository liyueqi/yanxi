<?php
/*
  *Bing - panel - announcement
  *Form:www.bgbk.org
  *一般主题用户不需要修改
*/

function Bing_announcement(){
    register_post_type('announcement',
        array(
            'labels' => array(
                'name' => __('公告'),
                'singular_name' => __('公告'),
                'add_new' => __('添加'),
                'add_new_item' => __('添加新公告'),
                'edit_item' => __('编辑公告'),
                'view_item' => __('编辑公告'),
                'search_items' => __('搜索公告'),
                'not_found' => __('还没有公告'),
                'not_found_in_trash' => __('在回收站中没有发现公告'),
            ),
 
            'public' => true,
            'menu_position' => 4,
            'supports' => 'editor',
            'taxonomies' => array(),
            'menu_icon' => 'dashicons-format-status',
            'has_archive' => true
        )
    );
}
add_action('init','Bing_announcement');

//数据列
function Bing_announcement_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "announcement" => __('公告'),
    "title" => __('操作'),
    "date" => __('时间'),
  );
 
  return $columns;
}
add_filter('manage_edit-announcement_columns','Bing_announcement_edit_columns');

function Bing_announcement_custom_columns($column){
    global $post;
    if($column=='announcement') echo mb_strimwidth(strip_tags($post->post_content),0,500,"...");
}
add_action('manage_announcement_posts_custom_column','Bing_announcement_custom_columns');

function Bing_announcement_post_type_style(){
    if($_GET['post_type']=='announcement'&&is_admin()) echo '<style type="text/css">.row-actions{visibility:visible !important;}.column-title strong{display:none !important;}</style>';
}
add_action('admin_head','Bing_announcement_post_type_style');

//自定义固定连接结构
function Bing_custom_announcement_link( $link, $post = 0 ){
    if ( $post->post_type == 'announcement' ){
        return home_url( 'announcement/' . $post->ID .'.html' );
    } else {
        return $link;
    }
}
add_filter('post_type_link', 'Bing_custom_announcement_link', 1, 3);

add_action( 'init', 'Bing_custom_announcement_rewrites_init' );
function Bing_custom_announcement_rewrites_init(){
    add_rewrite_rule(
        'announcement/([0-9]+)?.html$',
        'index.php?post_type=announcement&p=$matches[1]',
        'top' );
}
//本页设置结束
?>