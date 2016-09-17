<?php

/*

@package tasveer
	==============================
		ADMIN THEME SUPPORT PAGE
	==============================
*/


$post_formats = get_option('post_formats');
$output = array();
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );

foreach( $formats as $format ) {
	$output[] = ( isset($post_formats[$format]) && $post_formats[$format] == 1 ? $format : '' );
}

if( !empty( $post_formats ) ) {
	add_theme_support( 'post-formats', $output );
}

?>