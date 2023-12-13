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
        
        <h1 class="text-center mb-5">Sign Up Here</h1>
        <form action="signup_back.php" method="post">
            <div class="pb-4">
                <div><label class="pb-2" for="email">Email</label></div>
                <div><input type="email" id="email" name="email" class="form-control" required></div>
            </div>
            <div class="pb-2">
                <div><label class="pb-2" for="password">Password</label></div>
                <div><input type="password" name="password" class="form-control" required></div>
            </div>
            <div class="pb-2">
                <div><label class="pb-2" for="user-type">Are you a merchant or a customer?</label></div>
                <div>
                    <select name="user_type" id="user_type" class="form-select">
                        <option value="">..Please pick an option..</option>
                        <option value="merchant">Merchant</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>
            </div>
            <div class="pb-3">
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
   </div>
  </div>
</body>
</html>