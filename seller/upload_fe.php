<?php
include "menu.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload File</title>
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
        <form action="upload.php" enctype="multipart/form-data" method="POST" class="text-center p-5 bg-info ">
            <h3 style="color:darkorchid;">Add Product</h3>
            <input type="text" class="form-control" name="pname" placeholder="Enter the product name">
            <input type="number" class="form-control mt-2" placeholder="Enter the price" name="price">
            <textarea name="pdesc" id="" cols="30" rows="10" placeholder="Enter the description"
                class="form-control mt-2"></textarea>
            <label for="productIcon" class="form-control mt-2" >Upload Product Image</label>
            <input type="file" class="form-control-file" id="productIcon" name="pupload" class="mt-2">
            <input type="submit" class="btn btn-control bg-secondary mt-2" accept="*.jpg">
    </div>
</body>

</html>