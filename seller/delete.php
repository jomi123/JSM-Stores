
<?php

include_once "../shared/connect.php";
$pid = $_GET['pid'];

$sql = "update products set status=0 where pid=$pid";
$mysqli_result=mysqli_query($conn,$sql);

header("location:view.php");
?>