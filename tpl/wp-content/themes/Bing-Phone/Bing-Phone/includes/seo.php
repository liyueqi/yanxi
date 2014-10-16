<title><?php
	$delimiter = '|';
	global $page, $paged;
	wp_title($delimiter,true,'right');
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " ".$delimiter." $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo' '.$delimiter.' '.sprintf(__('第 %s 页'),max($paged,$page));
	?></title>