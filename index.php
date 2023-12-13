<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $css_path = "";
    $js_path="";
    ?>
    <?php
    include_once 'component/component.php'
    ?>

    <style>
    #home-background{
    background-image: url(img/leaves.jpg);
    background-size: cover;
    color: white;
    height: 350px;
   
    }
    .welcome-message{
        font-size: 90px;
        padding-bottom: 30px;
    }
    #shop-button{
        font-size: 20px;
        border-radius: 10px;
    }
    .cta{
        float: right;
    }
    /* .product-image{
     background-image: url(img/nike.jpg);
    background-size: cover;
    color: white;
    height: 200px;
    } */
    .banner{
    background-image: url(img/leaves.jpg);
    background-size: cover;
    color: white;
    height: 200px;
    }
    </style>
    <title>Document</title>
</head>
<body>
    <?php
    $home_path = "";
    $shop_path="pages/";
    $about_path=$shop_path;
    $sign_path = "authenticate/";
    $login_path ="authenticate/";
    ?>
    <?php include_once 'component/navbar.php' ?>
    
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12 text-center" id="home-background">
                <h4 class="welcome-message">Welcome, find all your items on your shopping list here</h4>
                <a href="pages/shop.php" id="shop-button"  class="btn btn-primary">Start shopping&#8594;</a >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <h1 class="text-center">Items on sale</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="card">
                <div class="card-image" style="background-image: url(img/nike.jpg);background-size: cover;color: white;height: 200px;"></div>
                <div class="card-body">
                    <h4 class="card-title">Product name</h4>
                    <p class="card-text">
                        <h4><b>$ 30.00</b></h4>
                    </p>
                    <p>Some description</p>
                </div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                <div class="card-image product-image"></div>
                <div class="card-body">
                    <h4 class="card-title">Product name</h4>
                    <p class="card-text">
                        <h4><b>$30.00</b></h4>
                    </p>
                    <p>Some description</p>
                </div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                <div class="card-image product-image"></div>
                <div class="card-body">
                    <h4 class="card-title">Product name</h4>
                    <p class="card-text">
                        <h4><b>$30.00</b></h4>
                    </p>
                    <p>Some description</p>
                </div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                <div class="card-image product-image"></div>
                <div class="card-body">
                    <h4 class="card-title">Product name</h4>
                    <p class="card-text">
                        <h4><b>$30.00</b></h4>
                    </p>
                    <p>Some description</p>
                </div>
                    
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <a href="pages/shop.php" class="btn btn-primary  cta">View more product&#8594;</a>
            </div>
            <div  style="clear: both;"></div>
            <div>lorem ipsum</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">What We Do</h1>
            </div>
        </div>
        <div class="row banner">
            <div class="col-md-12 text-center">
                <h1 class="pt-5 pb-3">We help you find product at affordable prices</h1>
                <a href="" class="btn btn-success p-3">Learn More</a>

            </div>
        </div>

    </div>
    
</body>
</html>