<?php
  session_start();
  
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $title = "BROOKS | SHOP Login";
  require "./template/header1.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

 <!-- Optional Bootstrap theme --> 
 <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css"> 
 
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> 
 <style type="text/css"> 
  .carousel { 
   background: #ffffffff; 
   margin-top: 0px; 
  } 
   
  .carousel .item img { 
   margin: 0 auto; 
   /* Align slide image horizontally center */ 
  } 
   
  .bs-example { 
   margin: 20px; 
  } 

 body {
font-size:40px;
  }
 </style> 

</head>
 
  

 
<body>


<div class="bs-example"> 
  <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel"> 
   <!-- Carousel indicators --> 
   <ol class="carousel-indicators"> 
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
    <li data-target="#myCarousel" data-slide-to="1"></li> 
    <li data-target="#myCarousel" data-slide-to="2"></li> 
    <li data-target="#myCarousel" data-slide-to="3"></li> 
    <li data-target="#myCarousel" data-slide-to="4"></li> 
    <li data-target="#myCarousel" data-slide-to="5"></li> 
  
   </ol> 
   <!-- Wrapper for carousel items --> 
   <div class="carousel-inner"> 
    <div class="active item"> 
     <img src="backgroundimage/image3.jpg" alt="First Slide"> 
    <div class="carousel-caption" >
    </div> 
    </div> 
    <div class="item"> 
     <img src="backgroundimage/image1.jpg" alt="Second Slide"> 
     <div class="carousel-caption"> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="backgroundimage./image2.jpg" alt="Third Slide"> 
     <div class="carousel-caption"> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="backgroundimage./image3.jpg" alt="Third Slide"> 
     <div class="carousel-caption"> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="backgroundimage./image4.jpg" alt="Third Slide"> 
     <div class="carousel-caption"> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="backgroundimage./image5.jpg" alt="Third Slide"> 
     <div class="carousel-caption"> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="backgroundimage./image6.jpg" alt="Third Slide"> 
     <div class="carousel-caption"> 
     </div> 
    </div> 

   </div> 
   <!-- Carousel controls --> 
   <a class="carousel-control left" href="#myCarousel" data-slide="prev"> 
    <span class="glyphicon glyphicon-chevron-left"></span> 
   </a> 
   <a class="carousel-control right" href="#myCarousel" data-slide="next"> 
    <span class="glyphicon glyphicon-chevron-right"></span> 
   </a> 
  </div> 
 </div> 
 
 <script src="bootstrap/js/jquery.js"></script> 
 <script src="bootstrap/js/bootstrap.js"></script> 
 
 <script type="text/javascript"> 
  $(document).ready(function() 
  { 
   $('#myCollapsible').on('hidden.bs.collapse', function() 
   { 
    alert('Collapsible element has been completely closed.'); 
   }); 
  }); 
 </script> 

     
 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

  <p class="lead text-center text-muted" style="font-size:20px;">Latest Product</p>

  <br>
  <section id="newadded"  style="font-size:15px;">
  <?php
  if(isset($conn)) {mysqli_close($conn);}


	require_once "./template/slide.php";
?>

</section>
 
  </body>

<br><br><br>
  <section id="post">
<?php
     
  require_once "./template/post1.php";
?>

    </section>


<footer id="contact">
<?php

 	require_once "./template/footer.php";
?>
</footer>


</html>
