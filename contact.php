<?php
  $showalert = false;
  $showError = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "loginsystem/db_connect.php";

    $email = $_POST['contactemail'];
    $textarea = $_POST['contacttextarea'];

    if($email && $textarea){
        $sql = "INSERT INTO `contact-us`(contact_email, problem) VALUES('$email','$textarea')";
        $result = $con->query($sql);
        if($result){
            $showalert = true;
        }
        else{
            $showError = true;
        }
    }

}



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forum - Coding</title>
    <style>
        #container{
            min-height: 100vh;
        }
    </style>
</head>
<body>
<?php
include "loginsystem/db_connect.php";
include "components/header.php";



if($showalert){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success: </strong> Your Problem has Been Submitted..!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    
    if($showError){
        echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error: </strong>Internal Server Error..!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    

?>
<div class="container-fluid my-1" >
<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <img src="images/contact-us.jpg" alt="" class='img-fluid'>
    </div>
</div>
</div>

<div class="container-fluid">
<div class="row text-center my-5 py-4 ">
<div class="bg-dark text-light p-5 rounded-lg ">
<h1 class='display-4'>Any Issue? <b>Contact-Us</b></h1>      
 </div>
</div>  
</div>

<div class="container my-5"id="container">
<div class="row">
    <div class="col-md-12">

    <form class='w-75 m-auto' method='post' action='contact.php'>
  <div class="mb-3">
    <input type="email" class="form-control" id="email" name='contactemail' aria-describedby="emailHelp" placeholder='Enter Your Email' required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <div class="mb-3">
  <textarea class="form-control" id="textarea" name='contacttextarea' rows="8" placeholder='We are Sorry You are Facing Any Problem Elaborate Your Problem' requried></textarea>
</div>

  <div class="row ">
    <div class="col-md-12 d-flex justify-content-center">
  <button type="submit" class="btn btn-outline-info btn-dark text-light w-25">Submit</button>
  </div>
  </div>
</form>

    </div>
</div>
</div>


<?php include "components/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>