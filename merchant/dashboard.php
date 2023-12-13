<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php $css_path = "../";
    $js_path="../";
    ?>
    <?php
    include_once '../component/component.php'
    ?>
</head>
<body>
<?php
    $home_path = "../";
    $shop_path="../pages/";
    $about_path=$shop_path;
    $sign_path = "../authenticate/";
    $login_path ="../authenticate/";
    ?>
    <?php include_once '../component/navbar.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark p-0" style="height: 100vh;">
            <a href="dashbaord.php" class="d-block pt-4 pb-4 text-white bg-secondary text-center">Dashboard</a>

             <a href="upload_product.php" class="d-block pt-4 pb-4 text-white  text-center">Upload Product</a>
             <a href="products.php" class="d-block pt-4 pb-4 text-white text-center">Products</a>
             <a href="keywords.php" class="d-block pt-4 pb-4 text-white   text-center">Keywords</a>


            </div>
            <div class="col-md-10">
               

            </div>
        </div>
    </div>
    
</body>
</html>