<?php
include_once "../shared/connect.php";
session_start();
$_SESSION['login'] = false;


$loguser = $_POST["loginuser"];
$logpass = $_POST["loginpassword"];

echo $logpass;
echo md5($logpass);


$passcheck = "select * from buyer where username='$loguser'";
$mysqli_result = mysqli_query($conn, $passcheck);
$row = mysqli_fetch_array($mysqli_result);

if ($mysqli_result->num_rows < 1) {
    echo ("<script>alert('Username Not Found.Sign Up to continue'); window.location='signup.html'</script>");
    die();
}

if ($row['password'] != md5($logpass)) {
    die('<script>alert("Password Incorrect")</script>');
}

$_SESSION['login'] = true;
$_SESSION['username'] = $loguser;
$_SESSION['userid'] = $row['userid'];

header("location: view_pro.php");

?>