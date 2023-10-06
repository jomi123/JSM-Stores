<?php
include_once "../shared/connect.php";
session_start();

$_SESSION['login'] = false;

$loguser = $_POST["loginuser"];
$logpass = $_POST["loginpassword"];


$passcheck = "select * from seller where username='$loguser'";
$mysqli_result = mysqli_query($conn, $passcheck);
$row = mysqli_fetch_assoc($mysqli_result);


if ($mysqli_result->num_rows < 1) {
    echo ("<script>alert('Username Not Found.Sign Up to continue'); window.location='signup.html'</script>");
    die();
}

if ($row['password'] != md5($logpass)) {
    echo ("<script>alert('Password Incorrect!!'); window.location='login.html'</script>");
    die();
}

$_SESSION['login'] = true;
$_SESSION['username'] = $loguser;
$_SESSION['sid'] = $row['sid'];


header("location:view.php");

?>