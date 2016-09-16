<h1>Tasveer Theme Opions</h1>
<?php settings_errors(); ?>
<?php
$firstName = esc_attr( get_option('first_name') );
$middleName = esc_attr( get_option('middle_name') );
$lastName = esc_attr( get_option('last_name') );
$fullName = $firstName.' '.$middleName.' '.$lastName;
$userDescription = esc_attr( get_option('user_description') );
?>
<div class="tasveer-sidebar-preview">
	<div class="tasveer-sidebar">
    	<h1 class="tasveer-username"><?php print($fullName); ?></h1>
        <h2 class="tasveer-description"><?php print($userDescription); ?></h2>
    </div>
</div>
<form method="post" action="options.php" class="tasveer-general-form">
	<?php 
	// do_settings_sections( $page ); Prints out all settings sections added to a particular settings page.
	do_settings_sections( 'tasveer-theme-options' ); 
	// settings_fields( $option_group );
	settings_fields( 'tasveer-theme-settings-group' );
	submit_button();
	?>
</form>