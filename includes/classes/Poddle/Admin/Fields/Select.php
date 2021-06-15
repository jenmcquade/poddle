<?php 

/**
 * A file to create extentable field classes
 *
 * A class definition that includes attributes and functions 
 * in the admin area.
 *
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Admin/Fields
 */

namespace Poddle\Admin\Fields;
use Poddle as Plugin_Root;

/**
 * A Select field that can be implemented in plugin admin menus.
 * 
 * @since       1.0.0
 * 
 * @package     Poddle
 * @subpackage  Poddle/Admin/Fields
 */

class Select extends Field {

  /**
   * Create a select field that can be used on the WordPress Admin 
   * settings page
   * 
   * @since 1.0.0
   * 
   * @param array $args
   * (
   *  @param string id: The options table field identifier
   *    and the HTML id attribute value
   *  @param string title: The HTML label
   *  @param string default_value: The default HTML value
   * ) 
   */
  
  public function __construct( $args ) {
    parent::__construct( $args );
  }

  /**
   * Generate the HTML for the text field
   * 
   * @since 1.0.0
   * @return string $html
   * 
   */
  protected function generate_html(): string {
    $options_id = Plugin_Root\OPTIONS_ID;
    $html = '<select id="' . esc_html($this->get_id()) . '" ' .
      'name="' . esc_html($options_id) . '[' . $this->get_id() . ']">';
    
    foreach( $this->get_options() as $option ) {
      $html .= '<option value="' . esc_html($option->value) . '"' . 
        selected( $this->get_value(), $option->value, false ) . '>' . 
        $option->title . '</option>';
    }

    $html .= "</select><label class='text-input-label'
      for='{$this->get_id()}'>{$this->get_label()}
      </label>";

    return $html;
  }

}