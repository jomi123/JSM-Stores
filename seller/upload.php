<?php
// print_r($_POST);
// print_r($_FILES);

include "menu.php";
include_once "../shared/connect.php";

echo "<br><br>";
$name = $_POST['pname'];
$price = $_POST['price'];
$pdesc = $_POST['pdesc'];
$sid = $_SESSION['sid'];

$actual_name = $_FILES['pupload']['name'];
$temp_path = $_FILES['pupload']['tmp_name'];

$target_path = "..//images//$actual_name";

move_uploaded_file($temp_path, $target_path);
include_once "../shared/connect.php";

echo $sid;

$cmd = "insert into products(sid,name,price,details,imgpath) values($sid,'$name',$price,'$pdesc','$target_path')";
$sql = mysqli_query($conn, $cmd);

if ($sql) {
    echo "Product inserted successfully";
    header("location:view.php");
} else {
    echo "Insertion Failed";
    echo (mysqli_error($conn));
}
?>