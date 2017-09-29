<h1>HoardTheme Options</h1>
<?php settings_errors(); ?>

<?php
$profilePicture = esc_attr( get_option( 'profile_picture' ) );
$firstName = esc_attr( get_option( 'first_name' ) );
$lastName = esc_attr( get_option( 'last_name' ) );
$fullName = $firstName . ' ' . $lastName;
$tagline = esc_attr( get_option( 'tagline' ) );
$twitter = esc_attr( get_option( 'twitter' ) );
$facebook = esc_attr( get_option( 'facebook' ) );
 ?>

<div class="hoard-sidebar-preview">
  <div class="image-container">
    <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $profilePicture; ?>);">
    </div>
  </div>
  <div class="hoard-sidebar">
    <h1 class="hoard-name">
      <?php print $fullName; ?>
    </h1>
    <h2 class="hoard-description">
            <?php print $tagline; ?>
    </h2>
    <div class="icons-wrapper">
    <?php print $twitter; ?>
    <?php print $facebook; ?>
    </div>
  </div>
</div>

<div>
<form method="post" action="options.php" class="hoard-general-form">
 <?php settings_fields( 'hoard-settings-group'); ?>
 <?php do_settings_sections('hoard'); ?>
 <?php submit_button(); ?>
</form>
</div>
