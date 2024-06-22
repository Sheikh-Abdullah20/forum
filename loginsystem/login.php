<?php
// $showError = 'false'; 
// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     include "db_connect.php";

//     $login_email = $_POST['loginEmail'];
//     $login_password = $_POST['loginPassword'];

//     $sql = "SELECT * FROM `users` WHERE email = '$login_email'";
//     $result = $con->query($sql);
//     $num_rows = mysqli_num_rows($result);
    
//     if($num_rows == 1){
//         // is equal to 1
//         echo $num_rows;
//         $row = mysqli_fetch_assoc($result);
//         if(password_verify($login_password , $row['password']))
//         {
//             session_start();
//             $_SESSION["loggedin"] = true;
//             $_SESSION['email'] = $login_email;
//         }
//         header("Location: ../index.php");
//     }
    
// }


if($_SERVER["REQUEST_METHOD"] == "POST"){
 include "db_connect.php";

 $email = $_POST['loginEmail'];
 $password = $_POST['loginPassword'];

 if($email && $password){
   $sql = "SELECT * FROM `forum_users` WHERE `user_email` = '$email'";
   $result = $con->query($sql);
   $num = mysqli_num_rows($result);
  if($num === 1){
   while($rows = mysqli_fetch_assoc($result)){
     if(password_verify($password, $rows['user_password'])){
       session_start();
       $_SESSION['loggedin'] = true;
       $_SESSION['email'] = $email;
       $_SESSION['user_id'] = $rows['user_id'];
       header("location: ../index.php?loginsuccess=true");
       exit();
     }
     else{
       $showError = 'Invalid Credentials';
       header("Location: ../index.php?loginsuccess=false&error=$showError");
       exit();
     }
   }
  }
  else{
    $showError = 'User Not Found';
    header("Location: ../index.php?loginsuccess=false&error=$showError");
    exit();
  }
    
 }
}

?>