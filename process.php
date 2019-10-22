<?php
	session_start();

	if($_SESSION['err'] == 0){
		header("Location: books.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./functions/database_functions.php";
	
	$title = "Brooks | Shop";
	require "./template/header6.php";
	// connect database
	$conn = db_connect();
	extract($_SESSION['ship']);
	
	
	// take orderid from order to insert order items
	
	foreach($_SESSION['cart'] as $isbn => $qty){
	
		}
	session_unset()	;

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

	
  <div class="container">



		<h5><p class="text-success">Your order has been processed sucessfully. Please check your email to get your order confirmation and shipping detail!.</p></h5>
		<br>
	<br>
	<br>
			

  </div>

  <!-- /.container -->

 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <section id="newadded">
 <?php
	
		require_once "./template/slide.php";
	
?>


</section>

</body>


<footer id="post">
<?php
require_once "./template/post1.php";

?>
</footer>

<section id="contact">
<?php

  require_once "./template/footer.php";
?>


</html>


</body>

</html>
