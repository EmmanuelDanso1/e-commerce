<?php 
include_once "../db.php";
include_once "../generate_code.php";
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["user_type"])
){
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];
    $encrypted_password =password_hash($password,PASSWORD_DEFAULT);
    $user_type = $_POST["user_type"];
    $code= generate_code();
    $stmt = $conn->prepare('insert into users(email,password,user_type,verification_code) values(:email,:password,:user_type,:verification_code);');
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$encrypted_password);
    $stmt->bindParam(":user_type",$user_type);
    $stmt->bindParam(":verification_code",$code);
    $stmt->execute();

// email verification(from php mail(bootstrap))
    $to = $email;
    $subject = "Email verification";
    
    $txt = "Hi,new user\nThanks for joining us. Kindly use this link to verify your account:\nhttp://localhost/e_commence/authenticate/verify.php?email=".$email."&code=".$code;
    $headers = "From: kwekudanso21@gmail.com";
    

    mail($to,$subject,$txt,$headers);
    header("location:verify_message.php");


}else{
    header('location:sign.php?message=Please%20fill%20out%20all%20the%20fields');
}


?>;