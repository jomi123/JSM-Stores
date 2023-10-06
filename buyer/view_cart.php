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

        .btn2 {
            border-radius: 4px;
            background-color: cadetblue;
            color: white;
            height: 30px;
            width: 100px;
            display: none;
        }

        .btn:hover,
        .btn2:hover {
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

$userid = $_SESSION['userid'];

$total = 0;

$sql = "select * from products join cart on cart.pid=products.pid where products.status=1 and cart.userid=$userid";
$sql_result = mysqli_query($conn, $sql);


echo "<br>";
echo "<div>
<div id='total'>
</div>
<div>
<a style='text-decoration:none' href='address.php'>
<button id='btn2' class='btn2'>
    Add Address
</button>
</a>
</div>
</div>
";

if(!$sql_result)
{
    echo "<h2 style='text-align:center;color:cadetblue;'>You have no items in the cart</h2>";
    die();
}

while ($row = mysqli_fetch_assoc($sql_result)) {

    $cartid = $row['cartid'];
    $name = $row['name'];
    $price = $row['price'];
    $detail = $row['details'];
    $imgpath = $row['imgpath'];
    $pid = $row['pid'];

    $total += $price;

    echo "<div class='pdt-container'>
        <div class='pdt'>
            <div class='pdtname'>$name</div>
            <div  class='pdt-price'>$price</div>
            <img src='$imgpath' class='pdt-img'>
            <p class='pdt-info'>$detail</p>
        </div>

        <div >
            <a  href='delete_cart.php?cartid=$cartid'>
            
            <button class='btn' >Remove from Cart</button></a>
        </div>

    </div>
    ";
}

if ($total != 0) {
    echo "<script>
    document.getElementById('total').innerHTML='<h3>SubTotal:$total</h3>';
    document.getElementById('btn2').style.display='block';
</script>";

} else {
    echo "<h2 style='text-align:center;color:cadetblue;'>You have no items in the cart</h2>";
}



?>