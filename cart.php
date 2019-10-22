<?php

	session_start();
	require_once "./functions/database_functions.php";
	require_once "./functions/cart_functions.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
	}

	if(isset($book_isbn)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$book_isbn])){
			$_SESSION['cart'][$book_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$book_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";
	require "./template/header5.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);

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
        <div class="card md-7">
          <div class="card-body">
			
		  <b>

<div class="col-xs-15 col-md-offset-4 ">
<div class="panel panel-info">
   <div class="panel-heading">
      <h4 style="color:green;">CHECKOUT</h4>
		</div>
		
        <div class="panel-body">

   	<form action="cart.php" method="post">
	   	<table class="table">
		   
		   <tr>	
	   			<th>ITEM</th>
				<th>PRICE</th>
				<th>FEES</th>
	  			<th>QTY</th>
	   			<th>TOTAL</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$items = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
			<center>
			<tr>
				<td>
				 <a href="books.php?bookisbn=<?php echo $items['product_id']; ?>"><img class="card-img-top" style ="height:70px; width:60px;" src="./bootstrap/img/<?php echo $items['product_image']; ?>"></a>
				 <?php echo $items['product_name']; ?>
				 <br>	
				</td>
						
				<td><?php echo "₵" . $items['product_price']; ?></td>
				<td> <a style= "color: red; font-size: 15px;"><?php echo "₵" . $qty * $items['deleivey_fee']; ?></a></td>
				
				
				<td><input type="text" value="<?php echo $qty; ?>" size="1" name="<?php echo $isbn; ?>"></td>
				<td><?php echo "₵" . $qty * $items['product_price']; ?></td>	
			
			</tr>
			</center>
			<?php } ?>
		    <tr>

			
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    	<th style ="font-size: 25px; color:red;"><?php echo "₵" . $_SESSION['total_price']; ?></th>
			</tr>
		
				
	   	</table>
	   	<input type="submit" class="btn btn-danger" name="save_change" value="Save Changes">
		 <a href="pay.php" class="btn btn-info "> Proceed To Checkout</a> 
	</form>
</div>
 </div>
</b>  

</div>
    </div>    
    </div>


  <br><br>
  <section id="newadded">
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






  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</html>
