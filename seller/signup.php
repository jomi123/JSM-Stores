<?php
include_once "../shared/connect.php";
session_start();

$name = $_POST['username'];
$pass = $_POST['password'];
$repass = $_POST['repassword'];
$_SESSION['username'] = $name;

$newpass = md5($pass);
$newrepass = md5($repass);  

$name_check = "select * from seller where username='$name'";
$mysqli_result = mysqli_query($conn, $name_check);

if ($mysqli_result->num_rows > 0) {
    echo("<script>alert('Username Already Exists'); window.location='signup.html'</script>");
    die();
}

if($newpass==$newrepass)
{
    $insert_query = "insert into seller (username,password) values ('$name','$newrepass')";
    $insert_exec = mysqli_query($conn, $insert_query);
    if ($insert_exec)
    {
        

        header("location: welcome.php");
    }
        
    else
        echo mysqli_error($conn);
}

if($newpass<8)
{
    die("Password should be greater than 8");
}

if($newpass>15)
{
    die("Password should be less than 15");
}

else{
    die("Password Mismatch");
}



?>