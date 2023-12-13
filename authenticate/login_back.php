
<?php 
session_start();
include_once "../db.php";
include_once "../generate_code.php";

if(isset($_POST["email"])&&isset($_POST["password"])){
 $email =$_POST["email"];
 $password =$_POST["password"];
 verify_user($email,$password,$conn);
}else{
    header("location:login.php");
}

?>