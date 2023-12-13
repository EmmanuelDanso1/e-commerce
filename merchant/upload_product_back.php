<?php 
session_start();
include_once "../db.php";
include_once "../generate_code.php";

print_r($_FILES["image"]);
$upload_folder = "../uploads/";
$new_file_name = pathinfo($_FILES["image"]["name"],PATHINFO_FILENAME).time();
$extension = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
//concatenating strtolower to exteension
$extension = strtolower($extension);
//concatenating $new_file_name and $extension and assigning it to $unque_file_name
$unique_file_name = $new_file_name.".".$extension;

$file_location = $upload_folder.$unique_file_name;
$db_path = "uploads/".$unique_file_name;
$merchant_email = $_SESSION["email"];
// print_r($_SESSION);

if(isset($_POST["submit"])){
    $product_name =$_POST["name"];
    $categories = array();
    if (isset($_POST["electronics"])) {
        $categories["electronics"] = "1";
    }else{
        $categories["electronics"] = "0";
    }
    if (isset($_POST["health"])) {
        $categories["health"] = "1";
    }else{
        $categories["health"] = "0";
    }
    if (isset($_POST["books"])) {
        $categories["books"] = "1";
    }else{
        $categories["books"] = "0";
    }
    if (isset($_POST["groceries"])) {
        $categories["groceries"] = "1";
    }else{
        $categories["groceries"] = "0";
    }
    if (isset($_POST["clothing"])) {
        $categories["clothing"] = "1";
    }else{
        $categories["clothing"] = "0";
    }
    $categories = json_encode($categories);

    $items_left = $_POST["items_left"];
    $price = $_POST["price"];
    $description = $_POST["description"];
     
    //creating prepared statement
    $stmt = $conn->prepare("insert into products(product_name,category,price,description,image_path,samples_left,merchant_email) values(:product_name,:category,:price,:description,:image_path,:samples_left,:merchant_email)");
    $stmt->bindparam(":product_name",$product_name);
    $stmt->bindParam(":category",$categories);
    $stmt->bindParam(":price",$price);
    $stmt->bindParam(":description",$description);
    $stmt->bindParam(":image_path",$db_path);
    $stmt->bindParam(":samples_left",$items_left);
    $stmt->bindParam(":merchant_email",$merchant_email);
    $stmt->execute();  
}

move_uploaded_file($_FILES["image"]["tmp_name"],$file_location);
header('location:upload_product_back.php?message=Product%has%been%uploaded%sucessfully');

?>