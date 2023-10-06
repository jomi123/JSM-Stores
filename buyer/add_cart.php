<?php

session_start();
include_once "../shared/connect.php";


$pid = $_GET['pid'];
$userid = $_SESSION['userid'];

$sql = "insert into cart (pid,userid) values($pid,$userid)";
$sql_exec = mysqli_query($conn, $sql);

if (!$sql_exec) {
    die("Failed to Insert");
}

?>

<html>

<head>
    <style>
        #popup {
            width: 400px;
            height: 100px;
            text-align: center;
            background-color: cadetblue;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: fadein 1s;
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
        <h3 style="text-align: center;">1 Item Added to Cart</h3>
        
        <a href="view_pro.php">
            <button onclick="this.parentNode.style.display='none'" ;>Ok</button>
        </a>
</body>

</html>