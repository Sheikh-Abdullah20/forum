
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="container my-3">
<div class="bg-light p-5 rounded-lg ">
  <h1 class="display-4"> <?php echo $thread_title ?>  </h1>
  <p class="lead"> <?php echo $thread_descriptiion ?> </p>
  <hr class="my-4">
  <p>This is Peer to Peer Forum And Here Are Some Rules of this Forum:</p>
 <p>Users are entitled to choose not to enter into debate with you. Don't post or link to inappropriate, offensive or illegal material. Inappropriate content is anything that may offend or is not relevant to the forum. Don't post any advertisements or solicitations, however much you believe in the service or product.</p>
</div>

<div class="row my-5">
  <h1>Disscussion</h1>

<!-- <?php

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
  <div class="media">
  <img class="mr-5 py-2" src="images/user.png" width="50px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0"> <a href = thread.php?threadid='. $thread_id  .' class = "text-dark">'.  $thread_title .'</a></h5>
    <h6>' . $thread_description  .'  </h6>
  </div>
</div>
  </div>
</div>
';
}

if($noresult){
  echo '
  <div class="bg-light p-5 rounded-lg ">
  <h1 class="display-4">No Results Found</h1>
  <p class="lead"> Be The First To Ask A Question </p>
  <hr class="my-4">
  <p> Here You Can Ask A Question -------> Scroll Down </p>
</div>
  ';
}
?> -->



  
</div>


<?php include "components/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>



















