<?php

/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/includes
 */

 namespace Poddle;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Poddle
 * @subpackage Poddle/includes
 * @author     Jen McQuade <jen.k.mcquade@gmail.com>
 */
class Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// If plugin settings don't exist, then create them
		if( false == get_option( OPTIONS_ID ) ) {
				add_option( OPTIONS_ID );
		}
	}

}
