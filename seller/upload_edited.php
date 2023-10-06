<?php

$pid = $_POST['pid'];
$name = $_POST['pname'];
$price = $_POST['price'];
$pdesc = $_POST['pdesc'];

$actual_name = $_FILES['pupload']['name'];
$temp_path = $_FILES['pupload']['tmp_name'];

include_once "../shared/connect.php";

$sql1 = "select * from products where pid=$pid";
$exec = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($exec);

$old_name = $row['name'];
$old_price = $row['price'];
$old_desc = $row['details'];
$old_img = $row['imgpath'];

if ($old_name != $name) {
    $cmd = "update products set name='$name' where pid=$pid";
    $sql = mysqli_query($conn, $cmd);
}

if ($old_price != $price) {
    $cmd = "update products set price=$price where pid=$pid";
    $sql = mysqli_query($conn, $cmd);
}

if ($old_desc != $pdesc) {
    $cmd = "update products set details='$pdesc'where pid=$pid";
    $sql = mysqli_query($conn, $cmd);
}

if ($old_img != $img) {
    $target_path = "..//images//$actual_name";
    move_uploaded_file($temp_path, $target_path);

    $cmd = "update products set imgpath='$target_path' where pid=$pid";
    $sql = mysqli_query($conn, $cmd);
}

if ($sql) {
    echo "Product inserted successfully";
    header("location:view.php");
}

if ($old_name == $name && $old_desc == $pdesc && $old_price == $price) {
    header("location:view.php");
} else {
    echo "Insertion Failed";
    echo (mysqli_error($conn));
}

?>