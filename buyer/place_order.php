<?php
include "menu.php";
echo "<br>";
include "timeline.html";
include_once "../shared/connect.php";

$address = $_GET['address'];
$userid = $_SESSION['userid'];

if (!(isset($_SESSION['login']))) {
    echo '<h2 style=" color:red;position:absolute;top:35%;left:40%; font-size:50px;">Invalid User</h2>';
    die();
}


$sql = "select * from products join cart on cart.pid=products.pid where products.status=1 and cart.userid=$userid";
$sql_result = mysqli_query($conn, $sql);

$buyer_insert = "update buyer set address='$address' where userid=$userid";
$buyer_exec = mysqli_query($conn, $buyer_insert);
if (!$buyer_exec) {
    echo mysqli_error($conn);
}

while ($row = mysqli_fetch_assoc($sql_result)) {
    $pid = $row['pid'];

    $insertion = "insert into orders(pid,userid,address) values($pid,$userid,'$address')";
    $exec = mysqli_query($conn, $insertion);

}

$del = "delete from cart where userid=$userid";
$del_exec = mysqli_query($conn, $del);

?>


<html>

<head>

    <style>
        .timeline1,
        .timeline2 {
            background-color: cadetblue;
            color: white;
        }


        #popup {
            width: 400px;
            height: 100px;
            text-align: center;
            background-color: cadetblue;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: fadein 2s;
        }

        @keyframes fadein {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }
    </style>
</head>

<body>
  

    <div id="popup" class="w3-animate-zoom">
        <h3 style="text-align: center;">The Order has been Placed Successfully</h3>
        <a href="delivery.html"><button onclick="this.parentNode.style.display='none'" ;>Ok</button></a>

    </div>
</body>

</html>