<?php
echo '
<style>
.auth{
padding-right:10px;
}
.text-white{
    text-decoration:none;
}

((
</style>';

echo '<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><img src="img/nice.png" alt="" srcset=""  class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
        <a class="nav-link" href=" '.$home_path.'index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href=" '.$shop_path.'shop.php">Shop</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href=" '.$about_path.'about.php">About</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    
      <li class="auth"><a href=" '.$sign_path.'sign.php" class="text-white"><i class="fa-solid fa-right-to-bracket"></i>Sign Up</a></li>
      <li class="auth"><a href=" '.$login_path.'login.php" class="text-white"><i class="fa-solid fa-user-plus"></i>Login</a></li>
    </ul>
    </div>
</div>
</nav>' 
?>