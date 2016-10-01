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

$customHeader = get_option('custom_header');

if( $customHeader == 1 ) {
	add_theme_support('custom-header');
}

$customBackground = get_option('custom_background');

if( $customBackground == 1 ) {
	add_theme_support('custom-background');
}

function tasveer_register_nav_menu() {
	register_nav_menu( 'primary', __('Header Navigation Menu', 'tasveer') );
}

// This hook is called during each page load, after the theme is initialized. It is generally used to perform basic setup, registration, and init actions for a theme.  add_action( 'after_setup_theme', 'function_name' );
add_action( 'after_setup_theme', 'tasveer_register_nav_menu' );

?>