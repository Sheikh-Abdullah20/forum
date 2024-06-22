<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forum - Coding</title>
</head>

<body>
    <?php
include "components/header.php";
include "loginsystem/db_connect.php";
?>


    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/carousel1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>




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
        echo '
        <div class="col-md-4 my-2 d-flex justify-content-center">
        <div class="card" style="width: 18rem" >
        <img src="images/card_'. $catname . $id .'.jpg" height = "180px" >
        <div class="card-body">
        <h5 class="card-title"> <a class= "text-dark" href = "threadlist.php?catid= '. $id .  '"> '.   $catname . '</a></h5>
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