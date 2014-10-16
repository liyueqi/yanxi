<?php if( Bing_is_ajax_load() && Bing_is_ajax_list() ):

    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php get_template_part('includes/seo'); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/images/apple/icon-57.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/apple/icon-72.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/apple/icon-114.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/apple/icon-144.png">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta name="format-detection" content="telephone=no">
	<link href="<?php bloginfo('template_directory'); ?>/images/apple/startup-image-320x460.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
	<link href="<?php bloginfo('template_directory'); ?>/images/apple/startup-image-640x920.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
	<link href="<?php bloginfo('template_directory'); ?>/images/apple/startup-image-768x1004.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
	<link href="<?php bloginfo('template_directory'); ?>/images/apple/startup-image-748x1024.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
	<link href="<?php bloginfo('template_directory'); ?>/images/apple/startup-image-1536x2008.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
	<link href="<?php bloginfo('template_directory'); ?>/images/apple/startup-image-2048x1496.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


		<div id="main">
<?php else: ?>
	<script type="text/javascript">
		var HeaderTitle = '<?php echo Bing_PageTitle(); ?>';
		var PageTitle = '<?php
	$delimiter = '|';
	global $page, $paged;
	wp_title($delimiter,true,'right');
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " ".$delimiter." $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo' '.$delimiter.' '.sprintf(__('第 %s 页'),max($paged,$page));
	?>';
	</script>	
<?php endif; ?>
<?php
function include_all_php($folder){
    foreach (glob("{$folder}/*.php") as $filename)
    {
        include $filename;
    }
}

include_all_php("my_classes");

?>