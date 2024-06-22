<?php
$showError = 'false'; 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "db_connect.php";
    $username = $_POST['signupusername'];
    $email = $_POST['signupemail'];
    $password = $_POST['signuppassword'];
    $cpassword = $_POST['signupcpassword'];

    $existsSql = "SELECT * FROM `forum_users` WHERE  `user_email` = '$email'";
    $result = $con->query($existsSql);
    $num_rows = mysqli_num_rows($result);
    
    if($num_rows > 0){
        $showError = "User Already Registered";
        header("Location: ../index.php?signupsuccess=false&error=$showError");
        exit();
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `forum_users`(username ,user_email, user_password) VALUES('$username','$email', '$hash')";
            $result = $con->query($sql);
            header("Location: ../index.php?signupsuccess=true");
            exit();
        }
        else{
            $showError = "Password Do not Match";
        }
        header("Location: ../index.php?signupsuccess=false&error=$showError");
        exit();
    }
}


?>