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
	// filter applied to the columns shown on the manage posts screen. It's applied to posts of all types except pages	
	add_filter( 'manage_tasveer-contact_posts_columns', 'tasveer_set_custom_columns' );
	// this allows you to add or remove (unset) custom columns to the list post/page/custom post type pages
	add_action( 'manage_tasveer-contact_posts_custom_column', 'tasveer_custom_contact_column', 10, 2 );
	// The hook allows meta box registration for any post type.
	add_action( 'add_meta_boxes', 'tasveer_contact_add_meta_box' );
	// save_post is an action triggered whenever a post or page is created or updated
	add_action( 'save_post', 'tasveer_save_contact_email_data' );
}

/* CONTACT CPT */
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
			$value = get_post_meta( $post_id , '_contact_email_value_key', true );
			echo $value;
			break;
	}
}

/* CONTACT META BOXES */
function tasveer_contact_add_meta_box() {
	// add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null )
	add_meta_box( 'contact-email', 'Contact Email', 'tasveer_contact_email_callback', 'tasveer-contact', 'side', 'default' );
}

function tasveer_contact_email_callback( $post ) {
	// wp_nonce_field( $action, $name, $referer, $echo ) validate that the contents of the form request came from the current site and not somewhere else.
	wp_nonce_field( 'tasveer_save_contact_email_data', 'tasveer_contact_email_metabox_nonce' );
	
	// get_post_meta( int $post_id, string $key = '', bool $single = false )
	$value = get_post_meta( $post->ID , '_contact_email_value_key', true );
	
	// Input for the Email meta box
	echo '<label for="tasveer_contact_email_field">User Email Address : </label>';
	echo '<input type="email" id="tasveer_contact_email_field" name="tasveer_contact_email_field" value="'.$value.'" size="25">';
}

function tasveer_save_contact_email_data( $post_id ) {
	if( ! isset( $_POST['tasveer_contact_email_metabox_nonce'] ) ) {
		return;
	}
	// wp_verify_nonce( $nonce, $action ); Verify that a nonce is correct and unexpired with the respect to a specified action
	if( ! wp_verify_nonce( $_POST['tasveer_contact_email_metabox_nonce'], 'tasveer_save_contact_email_data' ) ) {
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	// current_user_can( $capability ); Whether current user has capability or role.
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if( ! isset($_POST['tasveer_contact_email_field']) ) {
		return;
	}
	// sanitize_text_field( string $str ) Sanitizes a string from user input or from the database.
	$finalData = sanitize_text_field( $_POST['tasveer_contact_email_field'] );
	// update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
	update_post_meta( $post_id, '_contact_email_value_key', $finalData );
}

?>