
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
                <a href="products.php" class="d-block pt-4 pb-4 text-white bg-secondary  text-center">Products</a>
               

            </div>
            <div class="col-md-10">
                <h1 class="text-center">Keywords</h1><br>    
                
                <form action="edit_keywords_back.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
               <div id="repeater_area">
                <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="keywords[]">
                        </div>
                        <div class="col-md-2"></div>
                    </div>

               </div>
               <div class="row">
                <div class="col-md-12 pt-2">
                    <button class="btn btn-primary"  id="repeater-button" onclick="add_row(event)">Add Keywords</button>
                </div>
               </div>
                <div class="row">
                    <div class="col-md-12 pt-3 text-center">
                        <input style="display:inline-block; padding: 10px 50px;" class="btn btn-primary " type="submit" name="submit" value="submit">
                    </div>
                </div>
             </form>
                
            </div>
        </div>
    </div>
    
</body>
<script>
    // some comments
    // using the form element to write a javascript output
    // By using systematic approach below
    // 
    // <div id="repeater_area">
    //     <div class="row">
    //         <div class="col-md-8">
    //            <input type="text" class="form-control">
    //          </div>
    //                <div class="col-md-4">
              //  <button class="btn btn-danger">Delete</button>
    //                 </div>
    //             </div>

    // </div>
function remove_row(button){
event.currentTarget.parentElement.parentElement.remove();
}

   function add_row(event){
    event.preventDefault();
    var area = document.getElementById("repeater_area");
    var input = document.createElement("input");
    input.classList.add("form-control");
    input.setAttribute("name","keywords[]");

// using the first div(div 1) for "div" and "input"
    var div = document.createElement("div");
    div.classList.add("col-md-10");
    div.appendChild(input);

// using the second div(div 2) and button tag
    var button = document.createElement("button");
    button.classList.add("btn");
    button.classList.add("btn-danger");
    button.innerText = "Delete";
    // button.addEventListener("click", 'remove_row');
    button.setAttribute("onclick", "remove_row(event)");

    var div2 = document.createElement("div");
    div2.classList.add("col-md-2");
    div2.appendChild(button);

// using the whole div(div 3) tag to connect the whole div container
    var div3 = document.createElement("div");
    div3.classList.add("row");
    div.classList.add("pt-2");
    div3.appendChild(div);
    div3.appendChild(div2);


    area.appendChild(div3);
   }
</script>
</html>