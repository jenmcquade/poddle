<?php

namespace Poddle\Util;

/**
 * A library of helper functions for the Poddle Plugin,
 *  specific to arrays
 * 
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Util
 * 
 */

class Arrays {

  /**
   * Returns a new array that filters out values from an array of keys
   * 
   * @since 1.0.0
   * @param  $array: array where values are stored
   * @param  $keys_to_remove: array of keys matching keys in the array
   * @return array
  */
  public static function filter_array_values( array $array, array $keys_to_remove ): array {
    $new_array = array();
    foreach( $keys_to_remove as $key ) {
      // Only keep array values that aren't in $keys_to_remove
      if( !array_key_exists( $key, $array ) ) {
       $new_array[$key] = $array[$key];
      }
    }
    return $new_array;
  }

}