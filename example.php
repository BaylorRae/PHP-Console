<?php

require 'console.class.php';

Console::log('This is pretty cool, eh?');

$user = array(
  'username' => 'BaylorRae',
  'email' => 'baylor@example.com',
  'posts' => array(
    array('title' => 'Whoa! This is sweet!', 'body' => 'blah blah blah ...'),
    array('title' => 'Did you see what I made?', 'body' => 'blah blah blah ...')
    )
  );
  
Console::log($user);