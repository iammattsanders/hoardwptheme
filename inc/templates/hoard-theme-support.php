<h1>Hoard Theme Support Options</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="hoard-general-form">
 <?php settings_fields( 'hoard-theme-support'); ?>
 <?php do_settings_sections('hoard_theme'); ?>
 <?php submit_button(); ?>
</form>
