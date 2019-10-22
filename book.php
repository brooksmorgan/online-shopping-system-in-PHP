<?php
  session_start();
  $product_id = $_GET['bookisbn'];
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM items WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "No Product";
    exit;
  }

  $title = $row['product_name'];
  require "./template/header4.php";
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
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      
      <div class="col-lg-8">

        <div class="card mt-8">
        <div class="col-md-9 text-center" style="background-color: white;"> 
        <center> 
         <img class="img-responsive" style="background-color: white; margin-right:10px;" src="./bootstrap/img/<?php echo $row['product_image']; ?>">
          <img class="img-responsive " style="background-color: white; margin-right:5px; padding:20px; " src="./bootstrap/img/<?php echo $row['product_image1']; ?>">
</center>
        </div>
          <div class="card-body">
            <h3 class="card-title"><?php echo $row['product_name']; ?></h3>
            <h4 style=" color: blue;"> <?php echo "₵" .  $row['product_price']; ?></h4>
            <p class="card-text"><?php echo $row['product_descr']; ?></p>
         <h4>   <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></h4>
           
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
           <h4><b> PRODUCT DETAILS</b></h4>
          </div>
          <div class="card-body">
            
            <?php foreach($row as $key => $value){
              if($key == "product_descr" || $key == "product_image" || $key == "product_image1" || $key == "product_id"){
                continue;
              }
              switch($key){
               
                case "product_name":
                  $key = "Product Name    ";
                  break;
                
                case  "product_price":
                  $key = "Price ₵";
                  break;
                 
                  case "deleivey_fee":
                  $key = "Deleivery Fee ₵   ";
                  break;
                  
              }
            ?>
            <hr>
               <b>
              <?php echo $key; ?>
             <h6 style ="color:brown;"><?php echo $value; ?></h6>
            </b> 
            
           
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
           
            <hr>
            <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $product_id;?>">
          <b><h1> <input type="submit" value="Add to Cart" name="cart" class="btn btn-info"></h1> </b>     
          </form>

        
	

          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-lg-9 -->
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php

?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

<footer id="newadded">
<?php

  require_once "./template/slide.php";
?>
</footer>

<section id="post">
<?php
     
  require_once "./template/post1.php";
?>

    </section>

</html>

<section id="contact">
<?php

  require_once "./template/footer.php";
?>
</section>

</html>
