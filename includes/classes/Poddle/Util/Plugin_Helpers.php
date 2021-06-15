<?php

namespace Poddle\Util;
use Poddle as Plugin_root;

/**
 * A library of helper functions for the Poddle Plugin,
 *  specific to WordPress functionality
 * 
 * @link       jmcquade.com
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Util
 * 
 */

class Plugin_Helpers {

  /**
	 * Get an options value (e.g. from poddle_options)
	 *
	 * @since    1.0.0
   * @param    string   $option_id      The id of the option
   * @param    string   $default_value  A value to return if the option value is empty 
	 * @access   public
	 */
  public static function get_option_value( string $option_id, string $default_value = '' ): string {
    $options = get_option( Plugin_Root\OPTIONS_ID );

    if( isset( $options[ $option_id ] ) ) {
      return esc_html( $options[ $option_id ] );
    }

    return esc_html( $default_value );
  }

}