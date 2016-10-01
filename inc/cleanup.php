<?php

/*

@package tasveer
	======================================
		REMOVE GENERATOR VERSION NUMBER
	======================================
*/

function tasveer_remove_wp_version_strings( $src ) {
	global $wp_version; // Global variable with The installed version of WordPress
	
	// Parses the string into variables , void parse_str ( string $str [, array &$arr ] )
	// Parse a URL and return its components, mixed parse_url ( string $url [, int $component = -1 ] )
	parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
	if( !empty( $query['ver'] ) && $query['ver'] == $wp_version ) {
		// Removes an item or items from a query string. remove_query_arg( string|array $key, bool|string $query = false )
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

// Filters the script loader source.
add_filter( 'script_loader_src', 'tasveer_remove_wp_version_strings' );

// Filters an enqueued style’s fully-qualified URL.
add_filter( 'style_loader_src', 'tasveer_remove_wp_version_strings' );

function tasveer_remove_meta_version() {
	return '';
}

add_filter( 'the_generator', 'tasveer_remove_meta_version' );

?>