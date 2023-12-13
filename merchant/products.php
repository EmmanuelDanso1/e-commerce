
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
            <div class="col-md-2 bg-dark p-0" style="height: 100vh; position:fixed; top:0;">
                <a href="dashboard.php" class="d-block pt-4 pb-4 text-white  text-center">Dashboard</a>
                <a href="upload_product.php" class="d-block pt-4 pb-4 text-white text-center">Upload Product</a>
                <a href="products.php" class="d-block pt-4 pb-4 text-white bg-secondary  text-center">Products</a>
                <a href="keywords.php" class="d-block pt-4 pb-4 text-white   text-center">Keywords</a>

            </div>
            <div class="col-md-2 bg-dark p-0" style="height: 100vh;"></div>


            <div class="col-md-10">
                <h1 class="text-center">Manage your products here</h1><br>
                <input type="text" class="form-control bg-dark" id="search" style="color:white; border-radius:20px;" placeholder="search for products here..." onkeyup="search()" onfocusout="clear_search_results()"><br>
                <div id="search_results" style="padding-left: 20px;"></div>
                <?php
                $products = fetch_all_products($conn);
                //var_dump($products);
                foreach($products as $product)
                print_product_v1($product)
                ?>

            </div>
        </div>
    </div>
        <!-- using bootstrap modal to connect the delete button -->
        <form action="delete_product.php" method="post" class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alert!!!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you want to delete this product?
                    <input type="hidden" name="id" id="id">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>

                </div>
            </div>
        </form>

    
</body>

<script>
    function show_modal(id){
    $("#id").val(id);
    $("#myModal").modal('show');

    }
    // $(document).ready(function(){
       
    // })

    //searching for items on the search bar
    //using Ajax
    function search(){
        var search_term = document.querySelector("#search").value;
        var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //clearing text
        $("#search_results").html(" ");
        //making border and css on display
        $("#search_results").css("background","cyan");
        //getting resullts from the search.php
        var results = JSON.parse(this.responseText);
        // console.log(this.responseText);
        var div = document.querySelector("#search_results");
        results.forEach(element => {
            $("#search_results").append("<div style='padding-bottom:5px;'><a href='view_product.php?id="+element.id+"'>"+element.product_name+"</a></div>");
      });
        //in case user search is not found
        if(results.length == 0){
            $("#search_results").append("<div> No product is found </div>");
        }
      }
     };
     xmlhttp.open("GET", "search.php?search_term=" + search_term, true);
     xmlhttp.send();

    }
    function clear_search_results(){
        $("#search_results").html(" ");
    }
</script>
</html>