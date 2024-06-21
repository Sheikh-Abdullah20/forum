
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
$id = $_GET['threadid'];
$sql = "SELECT * FROM `thread` WHERE `thread_id` = $id";
$result = $con->query($sql);
while($rows = mysqli_fetch_assoc($result)){
$thread_title = $rows['thread_titile'];
$thread_descriptiion = $rows['thread_description'];
}
?>

<?php
  $showAlert = false; 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "loginsystem/db_connect.php";
    $id = $_GET['threadid'];
  $comment = $con->real_escape_string($_POST['comment']);
  $sql = "INSERT INTO comments(comment_content , thread_id) VALUES('$comment',$id)";
  $result = $con->query($sql);
  $showAlert = true;
    if($showAlert){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong> Your Comment Has Been Added </strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> ';
      } 
}



?>
<div class="container my-3">
<div class="bg-light p-5 rounded-lg ">
  <h1 class="display-4"> <?php echo $thread_title ?>  </h1>
  <p class="lead"> <?php echo $thread_descriptiion ?> </p>
  <hr class="my-4">
  <p>This is Peer to Peer Forum And Here Are Some Rules of this Forum:</p>
 <p>Users are entitled to choose not to enter into debate with you. Don't post or link to inappropriate, offensive or illegal material. Inappropriate content is anything that may offend or is not relevant to the forum. Don't post any advertisements or solicitations, however much you believe in the service or product.</p>
</div>
</div>


<div class="container my-5">
<div div class="row text-center">

<div class="col-md-12">
<form method = 'post' action='<?php $_SERVER['PHP_SELF'] ?>'>

<div class="mb-3">
<textarea class="form-control" id="comment" name='comment' rows="5" placeholder='Comment'></textarea>
</div>

<button type="submit" class="btn btn-outline-info btn-dark w-25">Comment</button>
</form>
</div>
</div>

</div>
</div>




<div class="container">
  <h1>Disscussion</h1>

<?php

$id = $_GET['threadid'];
$sql = "SELECT * FROM comments WHERE thread_id = $id";
$result = $con->query($sql);
$noresult = true;
while($rows = mysqli_fetch_assoc($result)){
$noresult = false;
$id = $rows['comment_id'];
$content = $rows['comment_content'];
$comment_time = $rows['comment_time'];
echo'

<div class="media my-3">
  <img class="align-self-start mr-3" src="images/user.png" width="50px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Anonymous User</h5>
    <p>'.$comment_time.'</p>
    <p>'.$content.'</p>
  </div>
</div>




';
}

if($noresult){
  echo '
  <div class="container">
  <div class="bg-light p-5 rounded-lg ">
  <h1 class="display-4">No Comments Found</h1>
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

















<!-- 

<div class="col my-4">
  <div class="media">
  <img class="mr-5 img-fluid " src="images/user.png" width="80px" alt="Generic placeholder image">
  <div class="media-body" >
  <h6>' . $content  .'  </h6>
  <h6>'  . $comment_time  .'  </h6>
  </div>
  
</div>
  </div> -->