<?php

/*

@package tasveer
	==============================
		ADMIN PAGE
	==============================
*/

function tasveer_add_admin_page() {
	// Generate Tasveer Admin Page
	/*
	add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
	*/
	add_menu_page( 'Tasveer Theme Options', 'Tasveer Theme', 'manage_options', 'tasveer-theme-options', 'tasveer_create_page', 'dashicons-camera', '110' );
	
	// Generate Tasveer Admin Sub Pages
	/*add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )*/
	add_submenu_page( 'tasveer-theme-options', 'Tasveer Theme Options', 'Tasveer Theme', 'manage_options', 'tasveer-theme-options', 'tasveer_create_page' );
	add_submenu_page( 'tasveer-theme-options', 'Tasveer Custom CSS', 'Tasveer CSS', 'manage_options', 'tasveer-theme-css', 'tasveer_css_page' );
	
	// Activate custom settings
	add_action( 'admin_init', 'tasveer_custom_settings' );
}
add_action( 'admin_menu', 'tasveer_add_admin_page' );

function tasveer_custom_settings() {
	 // add_settings_section( $id, $title, $callback, $page );
	 add_settings_section( 'tasveer-sidebar-options', 'Sidebar Options', 'tasveer_sidebar_options', 'tasveer-theme-options' );
	 
	 // add_settings_field( $id, $title, $callback, $page, $section, $args );
	 add_settings_field( 'tasveer-sidebar-name', 'First Name', 'tasveer_sidebar_name', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 
	 // register_setting( $option_group, $option_name, $sanitize_callback );
	 register_setting( 'tasveer-theme-settings-group', 'first_name' );
}

function tasveer_sidebar_options() {
	echo 'Customize your sidebar information.';
}

function tasveer_sidebar_name() {
	$firstName = esc_attr( get_option('first_name') );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name">';
}

function tasveer_create_page() {
	// Generation of our admin page
	require_once( get_template_directory() . '/inc/templates/tasveer-admin.php' );
}

function tasveer_css_page() {
	// Genration of our admin page
	echo '<h1>Tasveer Custom CSS</h1>';
}

?>