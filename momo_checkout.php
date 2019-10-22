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
      <div class="col-lg-9">
          <div class="card-body">
           
		<div class="panel-heading">
      <h4>CHECKOUT</h4>
        </div>
        <div class="panel-body">
		<b>
	<table class="table">
		<tr>
			<th>ITEM</th>
			<th>PRICE</th>
			<th>FEE</th>
			<th>QTY</th>
	    	<th>TOTAL</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$items = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
		<tr>
			
				<td>
				 <a href="books.php?bookisbn=<?php echo $items['product_id']; ?>"><img class="card-img-top" style ="height:70px; width:60px;" src="./bootstrap/img/<?php echo $items['product_image']; ?>"></a>
				 <?php echo $items['product_name']; ?>
				 <br>
				</td>	
				
			<td><?php echo "₵" . $items['product_price']; ?></td>
			<td><b> <a style= "color: red; font-size: 15px;"><?php echo "₵" . $qty * $items['deleivey_fee']; ?></a></b></td>
				
			<td><?php echo $qty; ?></td>
			<td><?php echo "₵" . $qty * $items['product_price']; ?></td>
			
		</tr>
		<?php } ?>
		<tr>
			
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "₵" . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	</b>
<hr>
	
	</div>
		</div>
		<b>
		<form method="post" action="momo.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
			<?php } ?>
	
				<div class="col-xs-4 col-xs-offset-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>SHIPPING ADDRESS</h3>
						</div>
		<div class="panel-body">

		<div class="form-group">
            <label for="card_type" class="col-lg-4 control-label">Selected Payment Plan</label>
            <div class="col-lg-5">
              	<select class="form-control" name="pay" required="true">
                  <b>	<option style="color: red;">Mobile Money Plan</option></b>
                  	
              	</select>
            </div>
        </div>
            
		<div class="form-group">
			<label for="name" class="control-label col-md-3">Fullname</label>
			<div class="col-md-8">
				<input type="text" name="name" class="form-control" placeholder="Fullname" required="true">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-3">Address</label>
			<div class="col-md-8">
				<input type="text" name="address" class="form-control" placeholder="Address" required="true">
			</div>
		</div>
		<div class="form-group">
			<label for="tel" class="control-label col-md-3">Telephone</label>
			<div class="col-md-8">
				<input type="text" name="tel" class="form-control" placeholder="Telephone" required="true">
			</div>
		</div>
		
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-3">Zip Code</label>
			<div class="col-md-4">
				<input type="text" name="zip_code" class="form-control" placeholder="Zip Code" required="true">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-3">Country</label>
			<div class="col-md-8">
				<input type="text" name="country" class="form-control" placeholder ="Country" required="true">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-3">City</label>
			<div class="col-md-8">
				<input type="text" name="city" class="form-control" placeholder="City" required="true">
			</div>
		</div>
	
<center>
<div class="form-group">
		<div class="col-lg-8 col-lg-offset-2">

		<input type="submit" name="submit" value="Contiune To Proceed" class="btn btn-info">

		</div>
	</div>
	</b>
</center>
	
	</div>
	</div>

  </div>
    </div>

  </div>
  
  </div>
        </div>
 <br><br><br><br>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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


<footer id="post">
<?php
require_once "./template/post1.php";

?>
</footer>

<section id="contact">
<?php

  require_once "./template/footer.php";
?>
</section>
</html>
