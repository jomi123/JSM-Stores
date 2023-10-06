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

        #msg {
            width: 40px;
            height: 20px;
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

$sql = "select * from products where status=1";
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
            <a href='add_cart.php?pid=$pid'>
            <div id='msg' style='display:none;'>1 Item Added to Cart</div>
            <button class='btn' id='add' onclick='popup()' >Add to Cart</button></a>
        </div>

    </div>

    <script>
    popup()
    {
        document.getElementById('add').style.display='block';
    }
    </script>
    ";
}

?>