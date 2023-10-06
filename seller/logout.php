<?php

session_start();
session_destroy();
echo ("<script>alert('You have Successfully Logged Out'); window.location='login.html'</script>");
die();

?>