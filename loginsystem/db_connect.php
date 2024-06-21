<?php
$server = "localhost";
$username = 'root';
$password  = '';
$db = 'forum';


$con = mysqli_connect($server , $username , $password , $db);
if(!$con){
    die("Connection Failed Due to :" . mysqli_connect_error());
}






?>