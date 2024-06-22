<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    <title>Forum - Coding</title>
</head>

<body>
    <?php
include "components/header.php";
include "loginsystem/db_connect.php";
?>

<?php

// it will update the images when it change
$image_path1 = "images/1.jpg";
$image_url1 = $image_path1 . "?" . time();

$image_path2 = "images/2.jpg";
$image_url2 = $image_path2 . "?" . time();

$image_path3 = "images/3.jpg";
$image_url3 = $image_path3 . "?" . time();
echo'
    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 80vh; ">
                <div class="carousel-item active">
                    <img src="'.$image_url1 .'" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="'.$image_url2.'" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="'.$image_url3.'" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
        </div>
    </div>';

    ?>



<div class="container my-3">
    <h2 class='text-center'>Forum - Browse Categories</h2>
    <div class="row my-3 mb-5 ">
     <?php
      $sql = "SELECT * FROM `categories`";
      $result = $con->query($sql);
      while($rows = mysqli_fetch_assoc($result)){
       $id = $rows['category_id'];
       $catname = $rows['category_name'];
       $catdesc = $rows['category_description'];
       $image_path = "images/card_" . $catname . $id . ".jpg";
       $image_url = $image_path . "?" . time();
        echo '
        <div class="col-md-4 my-2 d-flex justify-content-center">
        <div class="card" style="width: 18rem" >
        <img src="'.$image_url.'" height = "180px">
        <div class="card-body">
        <h5 class="card-title"> <a class= "text-dark" href = "threadlist.php?catid= '. $id .'"> '.   $catname . '</a></h5>
        <p class="card-text">'. substr( $catdesc, 0, 80) .'...</p>
        <a href="threadlist.php?catid= '. $id .' " class= "btn btn-dark btn-outline-info text-light">View Threads</a>
    </div>
    </div>
    </div>';
      }
      ?>

        </div>
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