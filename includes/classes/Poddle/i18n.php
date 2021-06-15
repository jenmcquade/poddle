<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/includes
 */

namespace Poddle;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Poddle
 * @subpackage Poddle/includes
 * @author     Jen McQuade <jen.k.mcquade@gmail.com>
 */
class i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'poddle',
			false,
			dirname( dirname( PLUGIN_BASENAME ) ) . '/languages/'
		);

	}



}
