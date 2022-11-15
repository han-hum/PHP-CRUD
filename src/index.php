<?php 
require "config.php";
?>

<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
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
            
            $sql = "SELECT * FROM products";
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){

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
            echo '<tbody>';
            while($row = mysqli_fetch_array($result)){
                echo  '<tr>';
                        #echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['title'] . '</td>';
                        echo '<td>'. $row['price'] . '</td>';
                        echo "<td>" . $row['category'] . "</td>";
                        echo '<td><button class="btn btn-primary">Update</button></td>';
                        echo '<td><button class="btn btn-warning">Remove</button></td>';
                echo '</tr>';
                }
                echo '</tbody>';
            echo '</table>';
            mysqli_free_result($result);
            }
            
        }  else {
            echo "Something went wrong"; }

        mysqli_close($con);
        ?>

        </div>
    </div>

    <div class="add">
        <a href="add.php" button type="button" class="btn btn-info">Add</a>
    </div> 

    <!-- get data, add, update, delete -->

</body>
</html>
