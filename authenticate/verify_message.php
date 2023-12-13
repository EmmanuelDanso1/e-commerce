<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $css_path = "../";
    $js_path="../";
    ?>
    <?php include_once '../component/component.php' ?>
    <title>Sign Up</title>
</head>
<style>
    body{
    background-image: url(../img/leaves.jpg);
    background-size: cover;
    
    }
</style>
<body>
    <?php
    $home_path = "../";
    $shop_path="../pages/";
    $about_path=$shop_path;
    $sign_path = "";
    $login_path ="";
    ?>
    <?php include_once '../component/navbar.php' ?>
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center bg-white p-5 mt-5 ">
        <h1 class="text-center mb-5">Kindly verify your Email</h1>
        <h5>Please check your email for a verification link.</h5>
        
    </div>
    <div class="col-md-3"></div>
   </div>
  </div>
</body>
</html>