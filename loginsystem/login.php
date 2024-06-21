<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "db_connect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email && $password){
        $sql = "SELECT * FROM users";
        $result = $con->query($sql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows){
            while($fetch = mysqli_fetch_assoc($result)){
                if(password_verify($password , $fetch['password'])){
                    session_start();
                    $_SESSION['loggedin'];
                    $_SESSION['username'];
                    header("location: ../welcome.php");
                    echo "Login SUccess";
                }
                
                else{
    
                    echo "Invalid Credentials";
                }
            }
        }
        else{
    
            echo "Invalid Credentials";
        }
    }
}


?>