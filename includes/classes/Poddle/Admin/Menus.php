<?php

/**
 * A file that manages the plugin admin menus
 *
 * @link       jmcquade.com
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Admin
 */

namespace Poddle\Admin;

use Poddle as Plugin_Root;
use Poddle\Util as Util;

/**
 * A class definition that includes attributes and functions 
 * of the admin area.
 * 
 * @package    Poddle
 * @subpackage Poddle/Admin
 * @author     Jen McQuade <jen.k.mcquade@gmail.com>
 */

 class Menus {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

  /**
   * A PHP object loaded from config/admin/menus.json
   * Contains the configuration to create menu pages
   * 
   * @since    1.0.0
   * @access   private
   * @var      object    $menu_config
   */
  private $menu_config;

  /**
   * A PHP object loaded from config/admin/settings.json
   * Contains the configuration to create settings sections and fields
   * 
   * @since    1.0.0
   * @access   private
   * @var      object    $settings_config
   */
  private $settings_config;

  /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
    // Load configurations from config/admin JSON files
    $menu_config_loader = new Util\Config_Loader('admin', 'menus');
    $settings_config_loader = new Util\Config_Loader('admin', 'settings');

		$this->plugin_name = $plugin_name;
		$this->version = $version;
    $this->menu_config = $menu_config_loader->get_data()->menus;
    $this->settings_config = $settings_config_loader->get_data()->settings;
	}

  /**
   * Add WordPress Admin pages based on config/admin/menus.json
   * This is the add_action callback for Plugin::define_admin_hooks.
   * 
   * @return void
   */
  public function add_plugin_admin_pages() {
    $pages = $this->get_plugin_menu_pages( Plugin_Root\TEXT_DOMAIN );
    foreach( $pages as $page ) {
      $this->add_page(
        $page->page_title,
        $page->menu_title,
        $page->capability,
        $page->menu_slug,
        $page->partial,
        $page->icon,
        $page->weight,
        $page->parent_slug
      );
    }
  }

  /**
   * This is an add_filter callback for Plugin::define_admin_hooks.
   *  
   * @return array 
   */
  public function add_plugin_action_links( array $links ): array {
    $link_data = $this->get_plugin_action_links();
    foreach( $link_data as $link ) {
      $html = "<a href='admin.php?page={$link->page}'>" . __( $link->text ) . "</a>";
      array_push($links, $html);
    }
    return $links;
  }

  /**
   * This is an add_action callback for Plugin::define_admin_hooks.
   * 
   * @return void
   */
  public function add_menu_page_sections(): void {
    $sections = $this->settings_config->sections;
    foreach( $sections as $section ) {
      add_settings_section(
        $section->id,
        $section->title,
        "",
        $section->page
      );
    }
  }

  /**
   * This is an add_action callback for Plugin::define_admin_hooks.
   * 
   * @return void
   */
  public function add_menu_page_section_fields(): void {
    $sections = $this->settings_config->sections;
    foreach( $sections as $section ) {
      $fields = $section->fields;
      foreach ( $fields as $field ) {
        $field_class = 'Poddle\\Admin\\Fields\\' . ucfirst($field->type);
        $field_object = new $field_class(
          array(
            'id' => $field->id,
            'title' => $field->title,
            'label' => $field->label,
            'is_multi_value' => $field->is_multi_value,
            'default_value' => $field->default_value,
            'options' => isset($field->options) ? $field->options : array() 
          )
        );
        add_settings_field(
          $field->id,
          $field->title,
          function() use($field_object) {
            echo $field_object->get_html();
          },
          $section->page,
          $section->id
        );
      }
    }
  }

  /**
   * Callback to register settings with WordPress
   * 
   * @return void
   */
  public function register_settings(): void {
    register_setting(
      PLUGIN_ROOT\OPTIONS_ID,
      PLUGIN_ROOT\OPTIONS_ID,
    );
  }


  /**
   * A utlitiy function to wrap WP page addition functions and provide some default values 
   * 
   * @return void
   */
  private function add_page( string $page_title, string $menu_title, string $capability, string $slug, string $partial = '', string $icon = '', int $weight = null, string $parent_slug = '' ) {
    switch ( $parent_slug ) {
      case '':
        add_menu_page(
          __( $page_title, Plugin_Root\TEXT_DOMAIN ),
          __( $menu_title, Plugin_Root\TEXT_DOMAIN ),
          $capability,
          $slug,
          function() use( $partial ) {
            $this->print_template( $partial );
          },
          $icon,
          $weight
        );
        break;
      default:
        add_submenu_page(
          __( $parent_slug, Plugin_Root\TEXT_DOMAIN ),
          __( $page_title, Plugin_Root\TEXT_DOMAIN ),
          __( $menu_title, Plugin_Root\TEXT_DOMAIN ),
          $capability,
          $slug,
          function() use( $partial ) {
            $this->print_template( $partial );
          },
          $weight
        );
        break;
    }
  }

  private function print_template( string $partial ) {
    include_once( Plugin_Root\PLUGIN_DIR . 'admin' . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . $partial . '.php' );
  }

  /**
   * Loads the config/admin/menus.json pages config as a PHP object
   * 
   * @return array pages
   */
  private function get_plugin_menu_pages( string $group ): array {
    foreach( $this->menu_config as $menu_data ) {
      if( $menu_data->group === $group && $menu_data->type === 'menu-group' ) {
        return $menu_data->pages;
        break;
      }
    }
  }

  /**
   * Loads the config/admin/menus.json action links config as a PHP array
   * 
   * @return array links
   */
  private function get_plugin_action_links(): array {
    foreach( $this->menu_config as $menu_data ) {
      if( $menu_data?->type === 'plugin-links' ) {
        return $menu_data->links;
        break;
      }
    }
  }

 }


