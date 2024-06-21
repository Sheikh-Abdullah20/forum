<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
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
        </li>
      </ul>
      
      <form class="d-flex" role="search">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info mx-1 " type="submit">Search</button>
      </form>
      <a  class="btn btn-dark btn-outline-info mx-2" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</a>
      <a  class="btn btn-dark btn-outline-info mx-1" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</a>
      <a  class="btn btn-dark btn-outline-info mx-1">Logout</a>
      
    </div>
  </div>
</nav>';

include "loginModal.php";
include "signupModal.php";

?>