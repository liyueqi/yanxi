<?php
//Config
include(TEMPLATEPATH.'/theme-config.php');
include(TEMPLATEPATH.'/theme-panel.php');

//Function
include(TEMPLATEPATH.'/functions/theme-functions.php');
include(TEMPLATEPATH.'/functions/visitors.php');
include(TEMPLATEPATH.'/functions/page-theme.php');
include(TEMPLATEPATH.'/functions/announcement.php');
include(TEMPLATEPATH.'/functions/ajax.php');
include(TEMPLATEPATH.'/functions/comments.php');

//Include
include(TEMPLATEPATH.'/includes/thumbnail/thumbnail.php');
include(TEMPLATEPATH.'/includes/postlist.php');

//User
$folder = TEMPLATEPATH.'/user/';
foreach( glob( "{$folder}/*.php" ) as $filename ) require_once $filename;

//Theme End.
