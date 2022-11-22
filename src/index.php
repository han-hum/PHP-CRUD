<?php
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Paragma, Authorization, Accept, Accept-Encoding");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') { //connection to db

    $con = mysqli_connect('db', 'test', 'test', 'fakeStore') or
        die("Connection failed: " . mysqli_error($con));


    $sql = "SELECT * FROM products"; //get
    $result = mysqli_query($con, $sql) or die("Error in selecting"
        . mysqli_error($con));

    $productArr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $productArr[] = $row;
    }

    echo json_encode($productArr);

    mysqli_close($con); //close connection

} elseif ($method == 'POST') {

    $data = file_get_contents('php://input');

    $jsonData = json_decode($data);

    $title = $jsonData->title;
    $price = $jsonData->price;
    $category = $jsonData->category;

    $con = mysqli_connect('db', 'test', 'test', 'fakeStore') or
        die("Connection failed: " . mysqli_error());

    $sql = "INSERT INTO products (title, price, category) VALUES ('$title', '$price', '$category')";

    if (mysqli_query($con, $sql)) {
        $last_id = mysqli_insert_id($con);

        $mes = array("id" => $last_id, "title" => $title, "price" => $price, "category" => $category);

        echo json_encode($mes, JSON_UNESCAPED_SLASHES);
    } else {
        echo "Can't add a new product";
    }
    mysqli_close($con); //close connection

} elseif ($method == 'PUT') {

    $id = (int)$_GET['id'];

    $data = file_get_contents('php://input');

    $jsonData = json_decode($data);

    $title = $jsonData->title;
    $price = $jsonData->price;
    $category = $jsonData->category;

    $con = mysqli_connect('db', 'test', 'test', 'fakeStore') or
        die("Connection failed: " . mysqli_error());

    $sql = "UPDATE products SET title='$title', price='$price', category='$category' WHERE id = '$id'";

    if (mysqli_query($con, $sql)) {
        # $last_id = mysqli_insert_id($con);

        $mes = array("id" => $id, "title" => $title, "price" => $price, "category" => $category);

        echo json_encode($mes, JSON_UNESCAPED_SLASHES);
    } else {
        echo "Can't update a product";
    }
    mysqli_close($con); //close connection 

} elseif ($method == 'DELETE') {

    $id = (int)$_GET['id'];

    $con = mysqli_connect('db', 'test', 'test', 'fakeStore') or
        die("Connection failed: " . mysqli_error());

    $sql = "DELETE FROM products WHERE id='$id'";

    if (mysqli_query($con, $sql)) {
        http_response_code(204);
    } else {
        http_response_code(404);
    }

    mysqli_close($con); //close connection 

} elseif ($method == 'OPTIONS') {


} else {
    echo json_encode(
        array('message' => 'method unknown')
    );
}
   #{"title": "123456", "price": "123456", "category": "1234567890"}
