<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forum - Coding</title>
</head>

<body>
    <?php
include "components/header.php";
include "loginsystem/db_connect.php";

?>


    <?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  include "loginsystem/db_connect.php";
  
  $title = $_POST['title'];
  $description = $_POST['description'];
  $showalret = false;
  $id = $_GET['catid'];
  $user_id = $_SESSION['user_id'];
  if($title && $description){
    $sql = "INSERT INTO `thread` (`thread_titile`, `thread_description`, `thread_cat_id`, `thread_user_id`) VALUES ('$title',  '$description', '$id', $user_id)";
    $result = $con->query($sql);
    $showalret = true;
    if(!$result){
      die("Error");
    }
  }
  
  if($showalret){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> Your Thread has Been Added Please Wait For the Peoples Respond on Your Thread. </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> ';
  } 
}


?>

    <!-- Retireved Data From Db Category Name and description For Jumbotron -->
    <?php
$id = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
$result = $con->query($sql);

while($rows = mysqli_fetch_assoc($result)){
 
$catname = $rows['category_name'];
$catdesc = $rows['category_description'];

}
?>

    <div class="container my-3 ">
        <div class="bg-dark text-light p-5 rounded-lg ">
            <h1 class="display-4">Welcome to <?php echo $catname ?> Forum</h1>
            <p class="lead"> <?php echo $catdesc ?> </p>
            <hr class="my-4">
            <p>This is Peer to Peer Forum And Here Are Some Rules of this Forum:</p>
            <p>Users are entitled to choose not to enter into debate with you. Don't post or link to inappropriate,
                offensive or illegal material. Inappropriate content is anything that may offend or is not relevant to
                the forum. Don't post any advertisements or solicitations, however much you believe in the service or
                product.</p>
    
        </div>



        <!-- handle if session is set than show this  -->
        <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo '
<div class="row my-4"> 
  <h1>Start Disscusstion</h1>
</div>
  <div div class="row text-center">
  <div class="col-md-12">
 <form method = "post" action="'.$_SERVER["REQUEST_URI"].'">
  <div class="mb-3">
    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Your Problrem" name="title">
  </div>

  <div class="mb-3">
  <textarea class="form-control" id="description" name="description" rows="5" placeholder="Eliborate Your Concren"></textarea>
</div>
  <button type="submit" class="btn btn-outline-info btn-dark text-light w-25">Submit</button>
</form>
  </div>
  </div>';
}
else{
  echo '
  <div class="container  my-3">
  <div class="bg-dark  text-light p-5 rounded-lg ">
    <h1 class="display-4"> Wana Post Problem? </h1>
    <p class="lead"> Lets Login And Than Start Posting Your Problrem..</p>
    <a  class="btn  btn-outline-info  mx-2 text-light w-25" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</a>
  </div>
  </div>
  
  ';
  }
  ?>


        <div class="container my-5">
            <div class="row">
                <h1>Browse Questions</h1>
            </div>
        </div>

        <?php

$id = $_GET['catid'];
$sql = "SELECT * FROM thread WHERE thread_cat_id = $id";
$result = $con->query($sql);
$noresult = true;
while($rows = mysqli_fetch_assoc($result)){
$noresult = false;
$thread_id = $rows['thread_id'];
$thread_title = $rows['thread_titile'];
$thread_description = $rows['thread_description'];
$thread_user_id = $rows['thread_user_id'];
$sql2 = "SELECT user_email FROM forum_users WHERE user_id = $thread_user_id";
$result2 = $con->query($sql2);
$rows = mysqli_fetch_assoc($result2);

echo'
<div class="col-md-12">
  <div class="media my-3">
  <img class="align-self-start mr-3" src="images/user.png" width="50px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">'.$rows['user_email'].'</h5>
    <h5 class="mb-2"> <a class="text-dark" href= thread.php?threadid='.$thread_id.'>'.$thread_title.'</a> </h5>
    <h6>'.$thread_description.'</h6>
  </div>
</div>
  </div>
';
}

if($noresult){
  echo '
  <div class="container">
  <div class="bg-light p-5 rounded-lg ">
  <h1 class="display-4">No Thread Found</h1>
  <p class="lead"> Be The First To Ask A Question </p>
  </div>
  </div>
  ';
}
?>
    </div>





    <?php include "components/footer.php";?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>