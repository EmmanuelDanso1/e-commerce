<?php 
session_start();
include_once "../db.php";
include_once "../generate_code.php";

if(isset($_GET['email']) && isset($_GET['code'])){
if(verify_email($_GET['email'],$_GET['code'],$conn)){
    //updating verification status
    update_verification_status($_GET['email'],1,$conn);

    $_SESSION['email'] = $_GET['email'];
    $user = fetch_user_by_email($_GET['email'],$conn);
    
    if($user["user_type"]="merchant"){
        $_SESSION["user_type"]="merchant";
        header("location:../merchant/dashboard.php");

    }else{
        $_SESSION["user_type"]='customer';
        header("location:../pages/shop.php");
    }
   

}
else{
    header("location:../pages/messages.php?title=verification%20failed&message=kindly visit your email");
}
}else{
    header("location:../authenticate/sign.php");
}



?>