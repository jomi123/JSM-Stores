<html>

<head>
    <style>
        .pdt-img {
            width: 200px;
            height: 200px;
        }

        .pdt-container {
            width: 200px;
            height: fit-content;
            display: inline-block;
            margin: 6px;
            padding: 10px;
            border: 2px solid black;
            gap: 20px;
            margin-top: 50px;
        }

        .btn {
            border-radius: 4px;
            background-color: cadetblue;
            color: white;
            border: none;
        }

        .btn:hover {
            cursor: pointer;
            background-color: cornflowerblue;
            color: black;
        }
    </style>
</head>

</html>


<?php
include_once "../shared/connect.php";
include 'menu.php';


if (!(isset($_SESSION['login']))) {
    echo '<h2 style=" color:red;position:absolute;top:35%;left:40%; font-size:50px;">Invalid User</h2>';
    die();
}

$sid = $_SESSION['sid'];

$sql = "select * from products where status=1 and sid=$sid";
$sql_result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($sql_result)) {

    $name = $row['name'];
    $price = $row['price'];
    $detail = $row['details'];
    $imgpath = $row['imgpath'];
    $pid = $row['pid'];

    echo "<div class='pdt-container'>
            <div class='pdt'>
                <div class='pdtname'>$name</div>
                <div  class='pdt-price'>$$price</div>
                <img src='$imgpath' class='pdt-img'>
                <p class='pdt-info'>$detail</p>
            </div>

            <div >
                <a href='edit.php?pid=$pid'>
                <button class='btn'>Edit</button></a>
                <a href='delete.php?pid=$pid'>
                <button class='btn'>Delete</button></a>
            </div>

        </div>";
}

echo "<br><br>";
if ($sql_result->num_rows < 1) {
    echo "<h2 style='text-align:center;color:cadetblue;'>You have no items Added</h2>";
}


?>