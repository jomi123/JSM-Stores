<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .menu {
      position: absolute;
      top: 0px;
      left: 0px;
      align-items: center;
      display: flex;
      gap: 20px;
      background-color: black;
      justify-content: space-around;
      padding: 10px;
      width: 100%;
    }

    .sub-menu {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 40px;
    }

    .sub-menu>a {
      text-decoration: none;
      color: white;
    }

    .sub-menu>a:hover {
      text-decoration: underline;
      padding-top: 4px;
      color: #11c0e5;
    }

    a#active{
      color:yellowgreen;
    }
  </style>
</head>

<?php
session_start();
$user = $_SESSION['username'];
?>

<body>
  <div class="menu">
    <h2 style="color: white;">JSM Stores</h2>
    <div class="sub-menu">
      <a href="upload_fe.php">
        <div>Add Product</div>
      </a>
      <a href="view.php" id="active">
        <div>View Products</div>
      </a>
      <a href="view_order.php">
        <div>View Orders</div>
      </a>
      <a href="logout.php">Logout</a>
    </div>
    <div class="user-menu">
      <h2 style="color: white;">Hello <span style="color: yellow;"> <?php echo $user ?> </span></h2>
    </div>
  </div>
  <br><br><br>
</body>

</html>