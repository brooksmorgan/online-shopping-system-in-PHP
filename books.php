<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT product_id, product_image,product_name,product_price,deleivey_fee,product_descr FROM items";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "BROOKS | SHOP All Product";
  require_once "./template/header3.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

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

  body{
  
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

<br><br>

  <div class="container">


    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>

<?php while($query_row = mysqli_fetch_assoc($result)){ ?>


  
      <div class="col-lg-3 col-md-4 mb-4">
       
        <center><a href="book.php?bookisbn=<?php echo $query_row['product_id']; ?>"><img class="card-img-top" style="height:220px; width:200px; " src="./bootstrap/img/<?php echo $query_row['product_image']; ?>" alt=""></a></center>
       
          <center> <b> <div class="card-title" style=" font-size: 15PX;"> <?php echo $query_row['product_name']; ?></div></b></center>
          <center> <h5> <div class="card-text" style="color:red; font-size: 20px;"><?php echo "₵" . $query_row['product_price']; ?></div></h5></center>
           
          <center> <b> <a href="book.php?bookisbn=<?php echo $query_row['product_id']; ?>" class="btn btn-warning" style="color:black;font-size:18PX;">Buy Now</a>  </b>  </center>     
          </div>
        
     
      <?php
          $count++;
          if($count >= 20){
              $count = 0;
              break;
            }
          } ?>
        
      
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


<section id="post">
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }

  require_once "./template/post1.php";
?>

    </section>

</html>

<footer id="newadded">
<?php

  require_once "./template/slide.php";
?>
</footer>

<section id="contact" style="font-size:15px">
<?php

  require_once "./template/footer.php";
?>
</section>
