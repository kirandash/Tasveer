<h1>Tasveer Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="tasveer-general-form">
	<?php 
	// do_settings_sections( $page ); Prints out all settings sections added to a particular settings page.
	do_settings_sections( 'tasveer-contact-form' ); 
	// settings_fields( $option_group );
	settings_fields( 'tasveer-contact-form-group' );
	// submit_button( $text, $type, $name, $wrap, $other_attributes )
	submit_button( 'Save changes',  'primary', 'btnSubmit' );
	?>
</form>