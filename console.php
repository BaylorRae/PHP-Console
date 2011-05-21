#!/usr/bin/env php
<?php

// Allow easy changing of delay
preg_match('/delay=(\d+)?/', $argv[1], $matches);
$delay = (isset($matches[1])) ? $matches[1] : 5;
if( $delay < 1 ) {
  echo "\nWARNING: Delay cannot be less than 1 second\n";
  echo "switching delay to 1 second\n\n";
  $delay = 1;
}elseif( $delay > 60 ) {
  echo "\nWARNING: Delay cannot be more than 60 seconds\n";
  echo "switching delay to 5 seconds\n\n";
  $delay = 5;  
}

if( file_exists('console.txt') ) {
  echo "Deleting console.txt ...";
  unlink('console.txt');
}

echo "\nCreating console.txt ...";
fopen('console.txt', 'a');

echo "\n\n## Watching for changes in console.txt ##";

$time = time();

while( 1 > 0 ) {
  get_content();
    
  // Only allow idle for 10 minutes
  if( time() > $time + 600 ) {
    echo "\n\nExiting from being idle for 10 minutes\n";
    exit();
  }
  
  sleep($delay);
}

$old_content = '';
function get_content() {
  global $old_content, $time;
  $content = file_get_contents('console.txt');
  $output = str_replace($old_content, '', $content);
  
  if( $content != $old_content )
    $time = time(); // reset time
  
  $old_content = $content;
  
  echo $output;
}