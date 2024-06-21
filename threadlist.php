
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forum - Coding</title>
</head>
<body>
<?php
include "components/header.php";
include "loginsystem/db_connect.php";

?>
<?php
$id = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
$result = $con->query($sql);

while($rows = mysqli_fetch_assoc($result)){
 
$catname = $rows['category_name'];
$catdesc = $rows['category_description'];
}



?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  include "loginsystem/db_connect.php";
  
  $title = $_POST['title'];
  $description = $_POST['description'];
  
  $showalret = false;
  $id = $_GET['catid'];
  if($title && $description){
    $sql = "INSERT INTO `thread` (`thread_titile`, `thread_description`, `thread_cat_id`, `thread_user_id`) VALUES ('$title',  ' $description', '$id', '0')";
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



<div class="container my-3 ">
<div class="bg-light p-5 rounded-lg ">
  <h1 class="display-4">Welcome to <?php echo $catname ?>  Forum</h1>
  <p class="lead"> <?php echo $catdesc ?> </p>
  <hr class="my-4">
  <p>This is Peer to Peer Forum And Here Are Some Rules of this Forum:</p>
 <p>Users are entitled to choose not to enter into debate with you. Don't post or link to inappropriate, offensive or illegal material. Inappropriate content is anything that may offend or is not relevant to the forum. Don't post any advertisements or solicitations, however much you believe in the service or product.</p>
</div>



<div class="row my-4"> 
  <h1>Start Disscusstion</h1>
</div>
  <div div class="row text-center">

  <div class="col-md-12">
  <form method = 'post' action='<?php $_SERVER['PHP_SELF'] ?>'>
  <div class="mb-3">
    <input type="text" class="form-control" id="title" name='title' aria-describedby="title" placeholder=' Your Problrem ' name='title'>
  </div>

  <div class="mb-3">
  <textarea class="form-control" id="textarea" name='description' rows="5" placeholder='Eliborate Your Concren'></textarea>
</div>

  <button type="submit" class="btn btn-outline-info btn-dark text-light w-25">Submit</button>
</form>
  </div>
</div>

</div>
<div class="container my-5">
  <div class="row">
    <h1>Browse Questions</h1>
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

echo'
<div class="col-md-12 my-4">
  <div class="media d-flex">
  <img class="mr-2 py-2" src="images/user.png" width="80px" alt="Generic placeholder image">
  <div class="media-body mx-4 my-3">
    <h4>Anonymous User</h4>
    <h5 class="mt-0"> <a href = thread.php?threadid='. $thread_id  .' class = "text-dark">'.  $thread_title .'</a></h5>
    <p>' . $thread_description  .'  </p>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>

















