<?php

include_once "../shared/connect.php";
include "menu.php";

$pid = $_GET['pid'];
$sql = "select * from products where pid = $pid";
$sql_result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($sql_result);

$name = $row['name'];
$price = $row['price'];
$details = $row['details'];
$img = $row['imgpath'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Edited File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <style>
        ::file-selector-button {
            display: none;
        }
    </style>

</head>

<body>
    <div class="d-flex justify-content-center align-items- center vh-80 mt-5">
        <form action="upload_edited.php" enctype="multipart/form-data" method="POST" class="text-center p-5 bg-info ">
            <h3 style="color:darkorchid;">Edit File</h3>
            <input type="hidden" name="pid" value="<?php echo $pid ?>">
            <input type="text" class="form-control" name="pname" placeholder="Enter the product name"
                value="<?php echo $name ?>">
            <input type="number" class="form-control mt-2" placeholder="Enter the price" name="price"
                value="<?php echo $price ?>">
            <textarea name="pdesc" id="" cols="30" rows="10" placeholder="Enter the description"
                class="form-control mt-2">"<?php echo $details ?>"</textarea>
            <label for="productIcon" class="form-control mt-2"
                style="color: black; background-color: darkturquoise;">Upload
                Product Image</label>
            <input type="file" name="pupload" id="productIcon" class=" mt-2" value="value=" <?php echo $img ?>"
            >
            <input type="submit" class="btn btn-control bg-secondary mt-2" accept="*.jpg">
    </div>
</body>

</html>