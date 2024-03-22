<?php

 //create constants to store non repeating values
define('SITEURL','http://localhost/webapps/css_tutorial/admin/');
define('DB_HOST', 'localhost');
define('DB_USER', 'taco');
define('DB_PASS', 'CHUKs989@$');
define('DB_NAME', 'taco_shop');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
  //the die function cut everything off
  die('Connection failed: ' . $conn->connect_error);
}

//echo 'Connected successfully';