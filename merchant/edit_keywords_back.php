<?php
include_once "../db.php";
include_once "../generate_code.php";

cool_print($_POST);
$id = $_POST["id"];
$keywords = json_encode($_POST["keywords"]);

$stmt = $conn->prepare("UPDATE products SET keywords=:keywords WHERE id=:id;");
$stmt->bindParam("keywords",$keywords);
$stmt->bindParam("id",$id);
$stmt->execute();

header("Location:keywords.php");
?>