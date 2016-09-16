<h1>Tasveer Theme Opions</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php 
	// do_settings_sections( $page ); Prints out all settings sections added to a particular settings page.
	do_settings_sections( 'tasveer-theme-options' ); 
	// settings_fields( $option_group );
	settings_fields( 'tasveer-theme-settings-group' );
	submit_button();
	?>
</form>