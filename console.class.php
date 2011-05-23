<?php

class Console {
  public static $filename = 'console.txt';
  public static $time_format = 'F j, Y @ h:i:sa';
  
  private static $file = null;
  
  private static function get_file() {
    if( self::$file === null )
      self::$file = fopen(self::$filename, 'a');
      
    return self::$file;
  }
  
  private static function add_time() {
    return "\n[" . date(self::$time_format) . ']';
  }
  
  public static function log($text) {
    $file = self::get_file();
    
    fwrite($file, "\n\n" . print_r($text, true) . self::add_time());
  }
}