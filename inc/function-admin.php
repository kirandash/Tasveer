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
	 add_settings_field( 'tasveer-sidebar-name', 'Full Name', 'tasveer_sidebar_name', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-twitter', 'Twitter Handler', 'tasveer_sidebar_twitter', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-facebook', 'Facebook Username', 'tasveer_sidebar_facebook', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-gplus', 'Google+ Username', 'tasveer_sidebar_gplus', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-dribble', 'Dribble Username', 'tasveer_sidebar_dribble', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-pinterest', 'Pinterest Username', 'tasveer_sidebar_pinterest', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-youtube', 'YouTube Username', 'tasveer_sidebar_youtube', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-linkedin', 'Linkedin Username', 'tasveer_sidebar_linkedin', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-instagram', 'Instagram Username', 'tasveer_sidebar_instagram', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-flickr', 'Flickr Username', 'tasveer_sidebar_flickr', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 add_settings_field( 'tasveer-tumblr', 'Tumblr Username', 'tasveer_sidebar_tumblr', 'tasveer-theme-options', 'tasveer-sidebar-options' );
	 
	 // register_setting( $option_group, $option_name, $sanitize_callback );
	 register_setting( 'tasveer-theme-settings-group', 'first_name' );
	 register_setting( 'tasveer-theme-settings-group', 'middle_name' );
	 register_setting( 'tasveer-theme-settings-group', 'last_name' );
	 register_setting( 'tasveer-theme-settings-group', 'twitter_handler', 'tasveer_sanitize_twitter_handler' );
	 register_setting( 'tasveer-theme-settings-group', 'facebook_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'gplus_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'dribble_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'pinterest_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'youtube_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'linkedin_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'instagram_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'flickr_username', 'tasveer_sanitize_inputs' );
	 register_setting( 'tasveer-theme-settings-group', 'tumblr_username', 'tasveer_sanitize_inputs' );
}

// Sidebar Functions
function tasveer_sidebar_options() {
	echo 'Customize your sidebar information.';
}

function tasveer_sidebar_name() {
	$firstName = esc_attr( get_option('first_name') );
	$middleName = esc_attr( get_option('middle_name') );
	$lastName = esc_attr( get_option('last_name') );
	
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"> <input type="text" name="middle_name" value="'.$middleName.'" placeholder="Middle Name"> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name">';
}

function tasveer_sidebar_twitter() {
	$twitterHandler = esc_attr( get_option('twitter_handler') );
	
	echo '<input type="text" name="twitter_handler" value="'.$twitterHandler.'"><p class="description">Input your twitter username without the @ character</p>';
}

function tasveer_sidebar_facebook() {
	$facebookUsername = esc_attr( get_option('facebook_username') );
	
	echo '<input type="text" name="facebook_username" value="'.$facebookUsername.'">';
}

function tasveer_sidebar_gplus() {
	$gplusUsername = esc_attr( get_option('gplus_username') );
	
	echo '<input type="text" name="gplus_username" value="'.$gplusUsername.'">';
}

function tasveer_sidebar_dribble() {
	$dribbleUsername = esc_attr( get_option('dribble_username') );
	
	echo '<input type="text" name="dribble_username" value="'.$dribbleUsername.'">';
}

function tasveer_sidebar_pinterest() {
	$pinterestUsername = esc_attr( get_option('pinterest_username') );
	
	echo '<input type="text" name="pinterest_username" value="'.$pinterestUsername.'">';
}

function tasveer_sidebar_youtube() {
	$youtubeUsername = esc_attr( get_option('youtube_username') );
	
	echo '<input type="text" name="youtube_username" value="'.$youtubeUsername.'">';
}

function tasveer_sidebar_linkedin() {
	$linkedinUsername = esc_attr( get_option('linkedin_username') );
	
	echo '<input type="text" name="linkedin_username" value="'.$linkedinUsername.'">';
}

function tasveer_sidebar_instagram() {
	$instagramUsername = esc_attr( get_option('instagram_username') );
	
	echo '<input type="text" name="instagram_username" value="'.$instagramUsername.'">';
}

function tasveer_sidebar_flickr() {
	$flickrUsername = esc_attr( get_option('flickr_username') );
	
	echo '<input type="text" name="flickr_username" value="'.$flickrUsername.'">';
}

function tasveer_sidebar_tumblr() {
	$tumblrUsername = esc_attr( get_option('tumblr_username') );
	
	echo '<input type="text" name="tumblr_username" value="'.$tumblrUsername.'">';
}

function tasveer_sanitize_twitter_handler( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

function tasveer_sanitize_inputs( $input ) {
	$output = sanitize_text_field( $input );
	return $output;
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