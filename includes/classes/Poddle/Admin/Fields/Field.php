<?php 

/**
 * A file to create extentable field classes
 *
 * A class definition that includes attributes and functions 
 * in the admin area.
 *
 * @link       jmcquade.com
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Admin
 */

namespace Poddle\Admin\Fields;

use Poddle\Util as Util;

/**
 * A class definition that includes attributes and functions 
 * in the admin area.
 */

abstract class Field {

  /**
   * Create a field that can be used on the WordPress Admin 
   * settings page
   * 
   * @since 1.0.0
   * 
   * @param array $args
   * (
   *  @param string id: The options table field identifier
   *    and the HTML id attribute value
   *  @param string title: The HTML label
   *  @param string default_value: An optional default field value
   * ) 
   */

  private string $id;
  private string $title;
  private string $label;
  private array $options;

  private string $html;
  private string $value;
  
  public function __construct( $args ) {
    try {
      $this->validate_field_method_arguments($args);
    } catch( \Exception $e ) {
      echo $e->getMessage();
      throw new \Exception('Field could not be created');
    }

    $this->id = esc_html( $args['id'] );
    $this->title = esc_html( $args['title'] );
    $this->label = esc_html( $args['label'] );

    $this->value = Util\Plugin_Helpers::get_option_value( $this->id, $args['default_value'] );
    
    if( true === $args['is_multi_value'] ) {
      $this->options = $args['options'];
    } else {
      $this->options = array();
    }

    $this->html = $this->generate_html();
  }

  /**
   * HTML must be generated for the field class that extends this class
   * 
   * @since 1.0.0
   * @return string
   * 
   */
  abstract protected function generate_html(): string;

  /**
   * Validate the arguments we use in the class methods
   * 
   * @since 1.0.0
   * @param array $args: the array of function arguments to validate
   * @return bool  
   */
  protected function validate_field_method_arguments( array $args ): bool {
    /**
     * $args passed into functions must have these
     */
    $required_field_keys = array(
      'id', 
      'title', 
      'label',
      'is_multi_value',
      'default_value'
    );

    /**
     * $args for multivalue elements must have these
     */
    $required_field_multivalue_keys = array(
      'title',
      'value',
    );

    // If it's a multivalue field, verify options passed
    // If it's not multivalue, remove the requirement for options
    $filtered_arg_options = [];
    if( $args['is_multi_value'] ) {
      if( !is_array( $args['options'] ) ) {
        throw new \Exception('Invalid field function multivalue options');
        return false;
      } 
      foreach( $args['options'] as $option ) {
        $filtered_option = Util\Arrays::filter_array_values( (array) $option, $required_field_multivalue_keys );
        $filtered_arg_options = array_merge( $filtered_arg_options, $filtered_option );
      }
    }

    $filtered_args = Util\Arrays::filter_array_values( $args, $required_field_keys );

    // If both arrays are empty, we're valid
    if( empty( $filtered_args ) && empty( $filtered_arg_options ) ) {
      return true;
    }

    // Handle if we didn't meet requirements
    throw new \Exception('Invalid field function arguments');
    return false;
  }

  /**
   * Get the field's HTML
   * 
   * @since 1.0.0
   * @return string
   * 
   */
  public function get_html() {
    return $this->html;
  }

  /**
   * Get the field's ID
   * 
   * @since 1.0.0
   * @return string
   * 
   */
  public function get_id():string {
    return $this->id;
  }

  /**
   * Get the field's title
   * 
   * @since 1.0.0
   * @return string
   * 
   */
  public function get_title(): string {
    return $this->title;
  }

  /**
   * Get the field's options
   * 
   * @since 1.0.0
   * @return array
   * 
   */
  public function get_options(): array {
    return $this->options;
  }

  /**
   * Get the field's value
   * 
   * @since 1.0.0
   * @return string
   * 
   */
  public function get_value():string {
    return $this->value;
  }

  /**
   * Get the field's label
   * 
   * @since 1.0.0
   * @return string
   * 
   */
  public function get_label():string {
    return $this->label;
  }

}