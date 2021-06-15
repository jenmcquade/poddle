<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Admin
 */

namespace Poddle\Admin;
use Poddle as Plugin_Root;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Poddle
 * @subpackage Poddle/Admin
 * @author     Jen McQuade <jen.k.mcquade@gmail.com>
 */
class Plugin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private string $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private string $version;

	/**
	 * Menus for this plugin
	 * 
	 * @since			1.0.0
	 * @access		public
	 * @var				Admin\Menus		$menus		The menus for the admin area
	 */
	private Menus $menus;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->menus = new Menus( $this->plugin_name, $this->version );

	}

	/**
	 * Getter for the menus object
	 * 
	 * @since 	1.0.0
	 */
	public function get_menus() {
		return $this->menus;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Poddle_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Poddle_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, Plugin_Root\PLUGIN_URL . 'css/poddle-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Poddle_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Poddle_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, Plugin_Root\PLUGIN_URL . 'js/poddle-admin.js', array( 'jquery' ), $this->version, false );

	}

}
