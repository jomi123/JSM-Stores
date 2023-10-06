<html>

<head>

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap/scripts/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <style>
        .pdt-img {
            width: 200px;
            height: 200px;
        }

        .pdt-container {
            width: 200px;
            height: fit-content;
            display: inline-block;
            margin: 15px;
            padding: 10px;
            border: 2px solid black;
            gap: 20px;
            margin-top: 50px;
        }
    </style>
</head>

</html>


<?php

include "menu.php";
include_once "../shared/connect.php";

$userid = $_SESSION['userid'];

$sql = "select * from orders join products on orders.pid=products.pid and orders.userid=$userid";
$sql_result = mysqli_query($conn, $sql);

echo "<br><br>";

if (!$sql_result) {
    echo "<h2 style='text-align:center;color:cadetblue;'>You have not Ordered Anything</h2>";
    die();
}

while ($row = mysqli_fetch_assoc($sql_result)) {

    $name = $row['name'];
    $price = $row['price'];
    $detail = $row['details'];
    $imgpath = $row['imgpath'];
    $pid = $row['pid'];

    echo "<div class='pdt-container'>
        <div class='pdt'>
            <div class='pdtname'>$name</div>
            <div  class='pdt-price'>$price</div>
            <img src='$imgpath' class='pdt-img'>
            <p class='pdt-info'>$detail</p>
        </div>

     

    </div>";

}


$sql = "select * from orders join products on orders.pid=products.pid and orders.userid=$userid";
$sql_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($sql_result);

echo "<br><br>";

if ($row < 1) {
    echo "<h2 style='text-align:center;color:cadetblue;'>You have not Ordered Anything</h2>";
}

?>