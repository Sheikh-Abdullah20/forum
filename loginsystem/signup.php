<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "db_connect.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $existsSql = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
    $result = $con->query($existsSql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows){
        echo "User Already Exixts";
    } 
    else{
    if($username && $email && $password && $cpassword){
        if($password == $cpassword){
            $hash = password_hash($password , PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email' , '$hash')";
            $result = $con->query($sql);
            if($result){

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: ../index.php");
            }
            
        }
    }
}
}



?>