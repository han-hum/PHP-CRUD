<?php
$servername = "db";
$username = "test";
$password = "test";
$con = mysqli_connect($servername, $username, $password);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>