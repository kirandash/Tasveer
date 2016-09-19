<?php

/*

@package tasveer
	==============================
		THEME CUSTOM POST TYPE
	==============================
*/


$activateContact = get_option('activate_contact');

if( $activateContact == 1 ) {
	add_action( 'init', 'tasveer_contact_custom_post_type' );	
}

function tasveer_contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Messages',
		'singular_name' 	=> 'Message',
		'menu_name'			=> 'Messages',
		'name_admin_bar'	=> 'Message'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> true,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title','editor','author' )
	);
	
	register_post_type( 'tasveer-contact', $args );
}

?>