<?php

include "menu.php";
echo "<br>";
include "timeline.html";
include_once "../shared/connect.php";

$userid = $_SESSION['userid'];

$sql = "select address from buyer where userid=$userid";
$exec = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($exec);

if ($row < 1) {
    echo "<form action='place_order.php' method='GET'>
    <textarea class='addr' name='address' placeholder='Enter the delivery address' rows='10' cols='50'></textarea>
    <input type='submit' class='btn' value='Place Order'>
</form>";
} else {
    echo "<form action='place_order.php' method='GET'>
    <textarea class='addr' name='address' placeholder='Enter the delivery address' rows='10' cols='50'>$row[address]</textarea>
    <input type='submit' class='btn' value='Place Order'>
</form>";

}


?>




<html>

<head>
    <style>
        .addr {
            margin-top: 15px;
            position: absolute;
            top: 250px;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: cadetblue;
            color: white;
        }

        .btn {
            position: absolute;
            top: 350px;
            left: 725px;
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

        .timeline1 {
            background-color: cadetblue;
            color: white;
        }
    </style>
</head>

</html>