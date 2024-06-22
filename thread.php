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
    $user_id = $_SESSION['user_id'];
  $comment = $con->real_escape_string($_POST['comment']);
  $sql = "INSERT INTO comments(comment_content , thread_id , comment_by) VALUES('$comment',$id, '$user_id' )";
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
        <div class="bg-dark text-light p-5 rounded-lg ">
            <h1 class="display-4"> <?php echo $thread_title ?> </h1>
            <p class="lead"> <?php echo $thread_descriptiion ?> </p>
            <hr class="my-4">
            <p>This is Peer to Peer Forum And Here Are Some Rules of this Forum:</p>
            <p>Users are entitled to choose not to enter into debate with you. Don't post or link to inappropriate,
                offensive or illegal material. Inappropriate content is anything that may offend or is not relevant to
                the forum. Don't post any advertisements or solicitations, however much you believe in the service or
                product.</p>
        </div>
    </div>

    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo '
<div class="container my-5">
<div div class="row text-center">
<div class="col-md-12">
<form method = "post" action="'. $_SERVER["REQUEST_URI"].'">
<div class="mb-3">
<textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Comment"></textarea>
</div>

<button type="submit" class="btn btn-outline-info btn-dark w-25">Comment</button>
</form>
</div>
</div>

</div>
</div>';
}
else{
echo '
<div class="container  my-3">
<div class="bg-dark  text-light p-5 rounded-lg ">
  <h1 class="display-4"> Wana Post Comments? </h1>
  <p class="lead"> Lets Login And Than Start Commenting..</p>
   <a  class="btn  btn-outline-info  mx-2 text-light w-25" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</a>
</div>
</div>

';
}
?>



    <div class="container">
        <h1 class="mb-5">Disscussions</h1>

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
$thread_user_id = $rows['comment_by'];

$sql2 = "SELECT user_email FROM forum_users WHERE user_id = '$thread_user_id'";
$result2 = $con->query($sql2);
$rows2 = mysqli_fetch_assoc($result2);
echo'
<div class="media my-3">
  <img class="align-self-start mr-3" src="images/user.png" width="50px" alt="Generic placeholder image">
  <div class="media-body">
  <h5 class="mt-0">'.$rows2['user_email'].'</h5>
    <p class="mb-0">'.$comment_time.'</p>
    <p >'.$content.'</p>
  </div>
</div>';
}
echo '</div>';
if($noresult){
  echo '
  <div class="container">
  <div class="bg-dark text-light p-5 rounded-lg ">
  <h1 class="display-4">No Comments Found</h1>
</div>
</div>
  ';
}
?>








  <?php include "components/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

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