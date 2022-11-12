<?php ?>

<!-- < ?php
php require_once "config.php";

$servername = "db";
$username = "test";
$password = "test";
$con = mysqli_connect($servername, $username, $password);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?> -->

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />


    <!-- <style> < ?php include 'style.css'; ?> </style>-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</head>

<body>
    <h1>Fake Store API</h1>

<div id="area">
    <div>
        <?php
                    require_once "config.php";
                    
                    $sql = "SELECT * FROM products";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Title</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Category</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "<td>" . $row['category'] ."</td>";
                                    echo "</tbody>";
                            echo "</table>";
                         mysqli_free_result($result);
                                }
                            }
                        }
                    
                     mysqli_close($link);
            ?>                
    </div>
</div>

    <!-- <div id="area">

        <div>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TITLE</td>
                        <td>PRODUCT</td>
                        <td>CATEGORY</td>
                        <td><button class="btn btn-primary">Update</button></td>
                        <td><button class="btn btn-warning">Remove</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="remove">
        <button type="button" class="btn btn-info">Remove</button>
    </div> -->

    <!-- get data -->

</body>
</html>
