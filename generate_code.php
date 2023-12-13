<?php
include_once "../db.php";
function generate_code(){
    $range = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQUSTUVWXYZ';
    $code= '';
    for($i=0; $i<5;$i++){
        $index = rand()%strlen($range);
        $code = $code.$range[$index];
        
    }
    return $code;
    // echo generate_code();
}
//setting verifieduser to 1
function update_verification_status($email,$val,$conn){
    $email = strtolower($email);
    $stmt= $conn->prepare('update users set verified=:verified where email=:email;');
    $stmt->bindparam("verified",$val);
    $stmt->bindparam("email",$email);
    $stmt->execute();
}
function cool_print($val){
echo "<pre>";
print_r($val);
echo "</pre>";
}
function verify_email($email,$verification_code,$conn){
    // echo $email.' '.$verification_code;
    $email = strtolower($email);
    $stmt =$conn->prepare("select id,email from users where email=:email and verification_code=:verification_code;");
    $stmt->bindparam(":email",$email);
    $stmt->bindparam(":verification_code",$verification_code);
    $stmt->execute();
    
    $stmt->setFetchmode(PDO::FETCH_ASSOC);
    $results= $stmt->fetchAll();
    // print_r($results);
    if(count($results)==0){
        return false;
    }else{
        return true;
    }


}

function fetch_user_by_email($email,$conn){
    $email = strtolower($email);
    $stmt=$conn->prepare('select* from users where email=:email;');
    $stmt->bindparam(':email',$email);
    $stmt->execute();
    $stmt->setFetchmode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
//verifying user(login)
function verify_user($email,$password,$conn){
    $email = strtolower($email);
    $stmt= $conn->prepare("select * from users where email=:email;");
    $stmt->bindparam(":email",$email);
    $stmt->execute();
    $stmt->setFetchmode(PDO::FETCH_ASSOC);
    $result =$stmt->fetchALL();
    if (count ($result)==0) {
        header("location:login.php?error=Wrong%20login%20details");
    }else{
        $user = $result[0];
        if($user["verified"] != 1){
            header("location:login.php?error=Please%20verify%20your%20account");
        }
        if(password_verify($password,$user["password"])){
          $_SESSION["email"] = $email;
          //checking whether user is merchant or customer
          if($user["user_type"]=="merchant"){
            $_SESSION['user_type'] == "merchant";
            header("location:../merchant/dashboard.php");

          }else{
            $_SESSION["user_type"]=="customer";
            header("location:../pages/shop.php");

          }
        }else{
            header("location:login.php?error=%20Wrong%20login%20details");
        }
    }

}
function fetch_all_products($conn){
    $stmt = $conn->prepare('select * from products;');
    $stmt-> execute();
    $stmt-> setfetchMode(PDO::FETCH_ASSOC);
    $result =$stmt->fetchALL();
    return $result;
}
//searching products
function fetch_searchresults($conn, $search_term){
    //using wildcard from sql
    $search_term = "%".$search_term."%";
    $stmt = $conn->prepare('select * from products where product_name like :search_term or description like :search_term;');
    $stmt->bindParam(":search_term", $search_term);
    $stmt->execute();
    $stmt-> setfetchMode(PDO::FETCH_ASSOC);
    $result =$stmt->fetchALL();
    return $result;
}


function print_product_v1($row, $path="../"){
    echo '<div class="row pt-5">
    <div class="col-md-3">
        <div style="background-image: url('.$path.$row["image_path"].');background-size: cover;color: white;height: 200px;"></div>
    </div>
    <div class="col-md-6">
        <h5 class="text-dark pt-2">
            <b>Name: </b>'.$row["product_name"].'
        </h5>
        
        <h5 class="text-dark pt-2">
            <b>Price: </b>'.$row["price"].'
        </h5>
        <h5 class="text-dark pt-2">
            <b>Samples left: </b>'.$row["samples_left"].'
        </h5>



    </div>
    <div class="col-md-3">
        <div><a href="view_product.php?id='.$row["id"].'" class="btn btn-primary mt-3" style="display: block;">View</a></div>
        <div><a href="edit_product.php?id='.$row["id"].'" class="btn btn-success mt-3" style="display:block;">Edit</a></div>
        <div><button type="submit" onclick="show_modal('.$row["id"].')" class="btn btn-danger mt-3" style="display: block; width:100%;">Delete</button></div>
    </div>
</div>' ;
    }

 function print_product_v2($row, $prepend=""){
    echo ' <div class="col-md-3">
    <div class="card">
    <div class="card-image" style="background-image: url('.$prepend.$row["image_path"].');background-size: cover;color: white;height: 200px;"></div>
    <div class="card-body">
        <h4 class="card-title">'.$row["product_name"].'</h4>
        <p class="card-text">
            <h4><b>'.$row["price"].'</b></h4>
        </p>
        <p style="white_space:nowrap; overflow: hidden; text-overflow: ellipsis;">Some description</p>
    </div>
        
    </div>
  </div>';
 }

 function print_keywords($row, $path="../"){
    echo '<div class="row pt-5">
    <div class="col-md-3">
        <div style="background-image: url('.$path.$row["image_path"].');background-size: cover;color: white;height: 200px;"></div>

    </div>
    <div class="col-md-6">
        <h5 class="text-dark pt-2">
            <b>Name: </b>'.$row["product_name"].'
        </h5>
    </div>
    <div class="col-md-3">
        <div><a href="edit_keywords.php?id='.$row["id"].'" class="btn btn-success mt-3" style="display:block;">Edit Keywords</a></div>
    </div>
</div>' ;
    }
function fetch_product_by_id($conn, $id){
 $stmt = $conn->prepare("Select * from products where id = :id");
 $stmt->bindparam(":id", $id);
 $stmt->execute();
 $stmt-> setfetchMode(PDO::FETCH_ASSOC);
 $result =$stmt->fetch();
 return $result;
}
function delete_product_by_id($conn,$id){
    $stmt = $conn->prepare("DELETE FROM products where id = :id;");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
}
?>
