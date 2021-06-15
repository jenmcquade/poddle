<?php 

/**
 * A file with functionality to load a .json config file
 *  and decode it into PHP Object Notation 
 *
 * @since      1.0.0
 *
 * @package    Poddle
 * @subpackage Poddle/Util
 */

 namespace Poddle\Util;
 use Poddle as Plugin_Root;

 /**
  * The .json config loader functionality
  *
  * Use get_data to return json decoded data
  *
  * @param      string $type The config directory name (i.e. 'admin')
  * @param      string $filename The config file name 
  * @package    Poddle
  * @author     Jen McQuade <jen.k.mcquade@gmail.com>
  */

  class Config_Loader {

    private $data;

    public function __construct( $type, $filename ) {
      $file_path = Plugin_Root\CONFIG_DIR . $type . DIRECTORY_SEPARATOR . $filename . '.json';
      $this->data = json_decode( file_get_contents( $file_path ) );
    }

    public function get_data() {
      return $this->data;
    }

  }