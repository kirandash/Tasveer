<h1>Tasveer Custom CSS</h1>
<?php settings_errors(); ?>
<form id="save-custom-css-form" method="post" action="options.php" class="tasveer-general-form">
	<?php 
	// do_settings_sections( $page ); Prints out all settings sections added to a particular settings page.
	do_settings_sections( 'tasveer-theme-css' ); 
	// settings_fields( $option_group );
	settings_fields( 'tasveer-custom-css-group' );
	// submit_button( $text, $type, $name, $wrap, $other_attributes )
	submit_button( 'Save changes',  'primary', 'btnSubmit' );
	?>
</form>