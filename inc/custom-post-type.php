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
	add_filter( 'manage_tasveer-contact_posts_columns', 'tasveer_set_custom_columns' );
	add_action( 'manage_tasveer-contact_posts_custom_column', 'tasveer_custom_contact_column', 10, 2 );
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

function tasveer_set_custom_columns( $columns ) {
	$newColumn = array();
	$newColumn['title'] 	= 'Full Name';
	$newColumn['message'] 	= 'Message';
	$newColumn['email']		= 'Email';
	$newColumn['date'] 		= 'Date';
	return $newColumn;
}

function tasveer_custom_contact_column( $column, $post_id ) {
	switch( $column ){
		case 'message':
			echo get_the_excerpt();
			break;
		case 'email':
			echo 'The email here';
			break;
	}
}

?>