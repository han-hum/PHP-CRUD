<?php
$servername = "db";
$username = "test";
$password = "test";
$database = "fakeStore";
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>