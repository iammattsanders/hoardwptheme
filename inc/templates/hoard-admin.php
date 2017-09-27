<h1>HoardTheme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
 <?php settings_fields( 'hoard-settings-group'); ?>
 <?php do_settings_sections('hoard'); ?>
 <?php submit_button(); ?>
</form>
