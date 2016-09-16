<?php

/*

@package tasveer
	==============================
		ADMIN PAGE
	==============================
*/

function tasveer_add_admin_page() {
	add_menu_page( 'Tasveer Theme Options', 'Tasveer Theme', 'manage_options', 'tasveer-theme-options', 'tasveer_create_page', 'dashicons-camera', '110' );
}
add_action( 'admin_menu', 'tasveer_add_admin_page' );

function tasveer_create_page() {
	
}

?>