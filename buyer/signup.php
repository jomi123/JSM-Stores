<?php
include_once "../shared/connect.php";
session_start();


$name = $_POST['username'];
$pass = $_POST['password'];
$repass = $_POST['repassword'];
$phone = $_POST['ph'];
$_SESSION['login'] = false;
$_SESSION['username'] = $name;


$newpass = md5($pass);
$newrepass = md5($repass);

$name_check = "select * from buyer where username='$name'";
$mysqli_result = mysqli_query($conn, $name_check);
$row = mysqli_fetch_assoc($mysqli_result);

if ($mysqli_result->num_rows > 0) {
    echo ("<script>alert('Username Already Exists'); window.location='signup.html'</script>");
    die();
}

if ($newpass == $newrepass) {
    $_SESSION['login'] = true;

    $insert_query = "insert into buyer (username,password,phone) values ('$name','$newrepass','$phone')";
    $insert_exec = mysqli_query($conn, $insert_query);
    $_SESSION['userid'] = $row['userid'];
    if ($insert_exec) {
        header("location: welcome.php");
    } else
        echo mysqli_error($conn);
}

if ($newpass < 8) {
    die("Password should be greater than 8");
}

if ($newpass > 15) {
    die("Password should be less than 15");
} else {
    die("Password Mismatch");
}


?>