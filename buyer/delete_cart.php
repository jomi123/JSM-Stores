<?php

include_once "../shared/connect.php";

$cartid=$_GET['cartid'];

$sql = "delete from cart where cartid=$cartid";
$sql_result = mysqli_query($conn, $sql);

if($sql_result)
{
    echo "1 Item Deleted";
    header("location:view_cart.php");
}

else{
    echo "Failed to Delete";
    mysqli_error($conn);
}
?>