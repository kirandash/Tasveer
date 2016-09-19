<h1>Tasveer Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="tasveer-general-form">
	<?php 
	// do_settings_sections( $page ); Prints out all settings sections added to a particular settings page.
	do_settings_sections( 'tasveer-theme-support' ); 
	// settings_fields( $option_group );
	settings_fields( 'tasveer-theme-support-group' );
	// submit_button( $text, $type, $name, $wrap, $other_attributes )
	submit_button( 'Save changes',  'primary', 'btnSubmit' );
	?>
</form>