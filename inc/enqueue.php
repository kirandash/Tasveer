<?php

/*

@package tasveer
	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/

function tasveer_load_admin_scripts( $hook ) {
	// echo $hook;
	if( 'toplevel_page_tasveer-theme-options' == $hook ) {
		wp_register_style( 'tasveer_admin', get_template_directory_uri() . '/css/tasveer.admin.css', array(), '1.0.0', 'all' );
		wp_register_script( 'tasveer_admin_script', get_template_directory_uri() . '/js/tasveer.admin.js' );
		
		wp_enqueue_style( 'tasveer_admin' );
		wp_enqueue_script( 'tasveer_admin_script' );
		
		// Enqueues all scripts, styles, settings, and templates necessary to use all media JavaScript APIs.
		wp_enqueue_media();
	}elseif( 'tasveer-theme_page_tasveer-theme-css' == $hook ) {
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/tasveer.ace.css', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'ace', get_template_directory_uri(). '/js/ace/src/ace.js', array('jquery'), '1.2.5', true );
		wp_enqueue_script( 'tasveer_custom_css_script', get_template_directory_uri(). '/js/tasveer.custom_css.js', array('jquery'), '1.2.5', true );
	}else{
		return;
	}
}
add_action('admin_enqueue_scripts', 'tasveer_load_admin_scripts');

?>