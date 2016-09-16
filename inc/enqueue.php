<?php

/*

@package tasveer
	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/

function tasveer_load_admin_scripts() {
	wp_register_style( 'tasveer_admin', get_template_directory_uri() . '/css/tasveer.admin.css' );
	wp_enqueue_style( 'tasveer_admin' );
}
add_action('admin_enqueue_scripts', 'tasveer_load_admin_scripts');

?>