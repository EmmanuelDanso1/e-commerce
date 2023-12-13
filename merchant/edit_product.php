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
    include_once "../db.php";
    include_once "../generate_code.php"; 
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
            <div class="col-md-2 bg-dark p-0" style="height: 100vh; position:fixed; top:0;">
            <a href="dashboard.php" class="d-block pt-4 pb-4 text-white  text-center">Dashboard</a>
             <a href="upload_product.php" class="d-block pt-4 pb-4 text-white bg-secondary text-center">Upload Product</a>
             <a href="products.php" class="d-block pt-4 pb-4 text-white text-center">Products</a>
             <a href="keywords.php" class="d-block pt-4 pb-4 text-white   text-center">Keywords</a>

            </div>
            <div class="col-md-2 bg-dark p-0" style="height: 100vh;"></div>

            <div class="col-md-10">
                <?php 
                $id = $_GET["id"];
                $product = fetch_product_by_id($conn,$id);
                ?>
            <h5 class="text-center pt-3">Edit Products</h5>
            <form action="upload_product_back.php" method="POST" enctype="multipart/form-data" mt-3>
                <div>
                    <h6 for="name">Name</h6>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $product["product_name"];?>">

                </div>
                <div class="pt-3">
                    <h6 for="category">Category</h6>
                    <div class="form-check">
                    <input type="checkbox" name="electronics" id="electronics" class="form-check-input">
                      <label for="electronics" class="form-check-label">Electronics</label>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" name="health" id="health" class="form-check-input">
                      <label for="health" class="form-check-label">Health & Fitness</label>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" name="books" id="books" class="form-check-input">
                      <label for="books" class="form-check-label">Books</label>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" name="groceries" id="groceries" class="form-check-input">
                      <label for="groceries" class="form-check-label">Groceries</label>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" name="clothing" id="clothing" class="form-check-input">
                      <label for="clothing" class="form-check-label">Clothings</label>
                    </div>
                </div>
                <div class="pt-3">
                    <h6>How many items of product is available</h6>
                    <input type="number" name="items_left" id="items_left" min="0" class="form-control">
                </div>
                <div class="pt-3">
                    <h6>Price</h6>
                    <input type="number" name="price" id="price" class="form-control" step="0.01">
                </div>
                <div class="pt-3">
                    <h6>Product Image</h6>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="pt-3">
                    <h6>Description</h6>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="pt-3 ">
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="display:block; width:100%">
                </div>
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>