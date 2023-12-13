
<?php
include_once "../db.php";
include_once "../generate_code.php";
 ?>
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
                <a href="dashboard.php" class="d-block pt-4 pb-4 text-white  text-center">Dashboard</a>
                <a href="upload_product.php" class="d-block pt-4 pb-4 text-white text-center">Upload Product</a>
                <a href="products.php" class="d-block pt-4 pb-4 text-white text-center">Products</a>
                <a href="keywords.php" class="d-block pt-4 pb-4 text-white bg-secondary  text-center">Keywords</a>

               

            </div>
            <div class="col-md-10">
                <?php
                $id = $_GET["id"];
                $product = fetch_product_by_id($conn,$id);
                ?> 
                <div class="row">
                    <a href="products.php" style="text-decoration:none; padding-bottom:10px;">&larr;Back to products</a>
                    <hr>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?php echo"../".$product["image_path"];?>" alt="" srcset="" class="card-img-top">
                            <div class="card-body text-dark">
                                <b>Name: </b><?php echo $product["product_name"]; ?><br>
                                <b>Price: $</b><?php echo $product["price"]; ?><br>
                                <b>Samples left: </b><?php echo $product["samples_left"]; ?>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Description</div>
                                <div class="card-body">
                                <?php echo $product["description"]; ?>
                                </div>
                        </div><br>

                        <div class="card">
                            <div class="card-header">Product Keyword
                                <div class="card-body">
                                <?php 
                                foreach (json_decode($product["keywords"]) as $keyword){
                                    echo '<span class="badge round-pill bg-secondary p-2 m-1">'.$keyword.'</span>';
                                }
                                ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>


</html>