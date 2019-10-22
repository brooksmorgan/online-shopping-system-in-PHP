<?php
	session_start();
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Checking out";
	require "./template/header2.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
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

    
    <div class="col-lg-13">
        <!-- /.card -->
        <center>
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
           
          <b><h1 style="background-image:url(backgroundimage/back2.jpg) ; color:white;">PLEASE CHOOSE PAYMENT PLAN METHOD</h1>   </b>                             
         
         </div>
    
                         <div class="col-xs-10 col-xs-offset-2">
                             <div class="panel panel-info">
                                 <div class="panel-heading">
                                     <h3>Mobile Money Payment Method</h3>
                                 </div>
                                 <div class="panel-body">
                                 
                                 
          <div class="list--item list--item-options -ptxl brdb -pbxl"> 
           <label class="-fwm" for="brooksshop">
               <span class="-prm">
                   <img src="bootstrap/mmlog/momologos.png" alt="">
                 </span>Mobile Money - MTN, Airtel &amp; Tigo</label>
          <div class="color-default-800 -fs-13 -plxxxl -mtxs" id="content">
     
              <div class="title -hidden">
     
              <label class="-fwm" for="brooksshop">
               <span class="-prm">           
                 </span><h3>Pay through your mobile money account.</h3> 
             </label> 
         </div>
         
          <div class="description ">  
              
              <label class="-fwm" for="brooksshop">
               <span class="-prm">
                  
           </span><p style="color: #ff0000;">Please ensure you have enough funds on your 
              <br>mobile money wallet to make payment instantly to avoid order cancellation.</p> 
             </label>
     
             <br>
             <a href="momo_checkout.php" class="btn btn-warning" name="add" value="add" > Proceed To Contiune With Mobile Money Method</a>
             <br>
                       
            
     
       </div>
     </div>
 </div>
</div>
      
<hr>
<hr>

<div class="col-xs-10 col-xs-offset-2">
<div class="panel panel-info">
       <div class="panel-heading"> 
             <h3>Pay on Deleivery Plan</h3>
     </div>

    
							
<div class="list--item list--item-options -ptxl brdb -pbxl"> 
 
  <label class="-fwm" for="deleivery_plan">
      <span class="-prm"><img src="bootstrap/mmlog/master_visa_logo.png" alt="">
    </span>Number one soomth Payment Plan</label> 
    <div class="color-default-800 -fs-13 -plxxxl -mtxs" id="content">
        <div class="title"> <h3>Pay on your door step as soon as packege arrive.</h3> </div>
        

        <div class="description  -hidden"> 
        <span class="-prm">
          <br>   
    </span>
   
<br>
<br>
<a href="checkout.php" class="btn btn-warning" name="add" value="add" > Proceed To Contiune Pay On Deleivery Plan</a>
    <br>
    
<br>
           
</div>
<div> 
   

          </div>
        </div>
       
    </center>
     
    <br><br>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<section id ="newadded">
<?php
	} else {
		echo "<h5><p class=\"text-warning\">Your cart is empty! Please make sure you add item to your cart!</p></h5><br><br><br>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/slide.php";
?>

</section>
 
  </body>


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
