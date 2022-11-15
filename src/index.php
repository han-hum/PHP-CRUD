<?php
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') { //connection to db

    $servername = "db";
    $username = "test";
    $password = "test";
    $con = mysqli_connect($servername, $username, $password);
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

    $sql = "SELECT * FROM products"; //get
    $result = mysqli_query($con, $sql) or die ("Error in selecting"
    . mysqli_error($con));
    
    $productArr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $productArr[] = $row;
    }

    echo json_encode($productArr); 

    mysqli_close($con); //close connection

}

?>