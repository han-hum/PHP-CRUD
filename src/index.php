<?php
$hostname = "db";
$username = 'test';
$password = "test";
$db_name = "products";
 $conn = new mysqli($hostname, $username, $password, $db_name);
// Check connection
if (!$conn) {
  echo "Connection failed!";
}