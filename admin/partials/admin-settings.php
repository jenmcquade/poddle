<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/admin/partials
 */

  namespace Poddle;
?>

<div class="wrap">

  <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>

  <form method="post" action="options.php">
    <!-- Display necessary hidden fields for settings -->
    <?php settings_fields( OPTIONS_ID ); ?>
    <!-- Display the settings sections for the page -->
    <?php do_settings_sections( 'poddle-settings' ); ?>
    <!-- Default Submit Button -->
    <?php submit_button(); ?>
  </form>

</div>
