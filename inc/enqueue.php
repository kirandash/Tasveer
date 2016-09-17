<?php

/*

@package tasveer
	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/

function tasveer_load_admin_scripts() {
	wp_register_style( 'tasveer_admin', get_template_directory_uri() . '/css/tasveer.admin.css' );
	wp_register_script( 'tasveer_admin_script', get_template_directory_uri() . '/js/tasveer.admin.js' );
	
	wp_enqueue_style( 'tasveer_admin' );
	wp_enqueue_script( 'tasveer_admin_script' );
	
	// Enqueues all scripts, styles, settings, and templates necessary to use all media JavaScript APIs.
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'tasveer_load_admin_scripts');

?>