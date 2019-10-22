<?php
 
  $count = 0;
  // connecto database
  
  $title = " WELCOME TO BROOKS | SHOP";
 
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select2LatestBook($conn);

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

</head>

<body>

  <!-- Page Content -->
  <div class="container">

   
    <!-- Page Features -->
    <div class="row text-center">
    <?php foreach($row as $items) { ?>

  
      <div class="col-sm-3 col-md-3 mb-2">
       
        <a href="book.php?bookisbn=<?php echo $items['product_id']; ?>"><img class="card-img-top" style="height:220px; width:200px;" src="./bootstrap/img/<?php echo $items['product_image']; ?>" alt=""></a>
      
           <center><b> <div class="card-title" style="font-size:15px;"> <?php echo $items['product_name']; ?></div></b></center>
            <br>
           <h5 style="color:red; font-size:20px;"><?php echo "₵" . $items['product_price']; ?>  </h5>
           <b><a href="book.php?bookisbn=<?php echo $items['product_id']; ?>" class="btn btn-warning" style=" color:black; font-size:18px;">Buy Now</a></b>   
          
      </div>

      <?php } ?>
        
      
    </div>
    <!-- /.row -->

  </div>

 

  <?php
  if(isset($conn)) {mysqli_close($conn);}
 
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
