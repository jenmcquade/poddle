<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Poddle
 *
 * @wordpress-plugin
 * Plugin Name:       Poddle
 * Plugin URI:        github.com/jenmcquade/poddle
 * Description:       A set of content-driven components implementing industry Podcast APIs.
 * Version:           1.0.0
 * Author:            Jen McQuade
 * Author URI:        jmcquade.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       poddle
 * Domain Path:       /languages
 */

namespace Poddle;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * These constants live under the Poddle namespace, NOT GLOBAL;
 */

/** 
 * Meta constants
*/
define( 'Poddle\VERSION', '1.0.0' );
define( 'Poddle\TEXT_DOMAIN', 'poddle' );
define( 'Poddle\PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'Poddle\OPTIONS_ID', 'poddle_options');
define( 'Poddle\WP_FILTER_NAME', 'plugin_action_links_' . PLUGIN_BASENAME );

/**
 * Directory constants
 */
define( 'Poddle\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'Poddle\ADMIN_DIR', PLUGIN_DIR . 'admin' . DIRECTORY_SEPARATOR );
define( 'Poddle\CONFIG_DIR', PLUGIN_DIR . 'config' . DIRECTORY_SEPARATOR );

/**
 * URL constants
 */
define( 'Poddle\PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Autoload our Class files
 */
require_once PLUGIN_DIR . 'autoloader.php';
	
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/classes/Poddle/Activator.php
 */
register_activation_hook( __FILE__, 'Poddle\Activator::activate' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/classes/Poddle/Deactivator.php
 */
register_deactivation_hook( __FILE__, 'Poddle\Deactivator::deactivate' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_poddle() {

	$plugin = new Plugin();
	$plugin->run();

}
run_poddle();
