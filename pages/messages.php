<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messsage</title>
    <!--move from pages to e-commerce(../) -->
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
            <div class="col-md-12 text-center p-4">
                <h1><?php echo $_GET["title"] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rounded bg-primary text-white p-4" style="height: 300px;">
                <?php echo $_GET["message"] ?>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>