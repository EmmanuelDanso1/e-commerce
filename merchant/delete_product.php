<?php 
include_once "../db.php";
include_once "../generate_code.php";

$id = $_POST["id"];
delete_product_by_id($conn, $id);
header("Location:products.php?messasge=deletion%20successful");
?>
