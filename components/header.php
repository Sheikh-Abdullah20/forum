<?php

  session_start();




echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
      if(isset($_SESSION['loggedin'])){
        echo
       '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a  href = "contact.php" class="nav-link ">Contact</a>
        </li>';
      }
     
      echo'</ul>';

      

      if(!isset($_SESSION['loggedin'])){
        echo
       '<a  class="btn  btn-outline-info  mx-2 text-light" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</a>';
       echo'<a  class="btn  btn-outline-info mx-1 text-light" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</a>';
      }
      
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo
        '<a href= "loginsystem/logout.php" class="btn  btn-outline-info  mx-1 text-light">Logout</a>';
      }
     
      
   echo '</div>
  </div>
</nav>';
if(isset($_GET["logout"]) && $_GET["logout"] == 'true'){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Ops..!! </strong> You are Logged Out..
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

include "loginModal.php";
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == 'true'){
  echo '
  <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>success</strong> Now Your Are Login to Your Account
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == 'false' && isset($_GET['error'])){
  echo '
  <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Error:</strong> ' . htmlspecialchars($_GET['error']) . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
}

include "signupModal.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true'){
  echo '
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>success</strong> Account Has Been Created. Now You can Login!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  ';
}
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'false' && isset($_GET['error'])) {
  echo '
    <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error:</strong> ' . htmlspecialchars($_GET['error']) . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  ';
}


?>


<!-- manually logic for hide nav-items if session is expired -->
<!-- if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo'<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>';
        }
      
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo'<li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>';
        }
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>';
        }
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo'<li class="nav-item">
          <a  href = "contact.php" class="nav-link ">Contact</a>
        </li>';
     
        }
       echo ' </ul>';12:05 am 22/06/2024 -->