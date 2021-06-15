<?php 

/**
 * Just your average PHP 8 compliant class autoloader
 * 
 * @since 1.0.0
 * 
 */

spl_autoload_register( 'poddle_autoloader' );
function poddle_autoloader( $class_name ) {
  if ( false !== strpos( $class_name, 'Poddle' ) ) {
    $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR;
    $class_file = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name ) . '.php';
    require_once $classes_dir . $class_file;
  }
}