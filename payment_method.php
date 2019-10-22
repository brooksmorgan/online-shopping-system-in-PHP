<?php
	session_start();
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: payment_method.php");
	} else {
		unset($_SESSION['err']);
	}


	$_SESSION['ship'] = array();
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$_SESSION['ship'][$key] = $value;
		}
	}
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Purchase";
	require "./template/header2.php";
	// connect database
	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>

<!-------------COMFIRM TO SUBMIT TO DATABASE------->

<?php
	

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}


	$conn = db_connect();
	extract($_SESSION['ship']);
	
	// find customer
	$customerid = getCustomerId($name, $address, $city, $tel, $zip_code, $country,$pay);
	if($customerid == null) {
		// insert customer into database and return customerid
		$customerid = setCustomerId($name, $address, $city, $tel, $zip_code, $country,$pay);
	}
	
	
	$date = date("Y-m-d H:i:s");
	insertIntoOrder($conn, $customerid, $_SESSION['total_price'], $date, $name, $address, $city, $tel,$zip_code, $country,$pay);

	// take orderid from order to insert order items
	$orderid = getOrderId($conn, $customerid);

	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($conn2);
			exit;
    }
    
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Item - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

 

  <!-- Page Content -->
  <div class="container">
    <div class="row">

     
      <div class="col-lg-10">
        <div class="card-body">
        <div class="card mt-4">
          <div class="card-body">
            <h3 class="card-title"><h4>PROCEED TO CHECKOUT</h4></h3>
            <P style="color:red;">PLEASE NOTE: 
        <br>
        All currency are in Ghana Cedis (₵) <br>
        please convert it to your local currency before making payment. Thank You. 
         </P>
         <hr>
    </b>

    <b>
	<table class="table ">
	<tr>
            <th>ITEM</th>
			<th>PRICE</th>
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
		 
		</td>	
           
			<td><?php echo "₵" . $items['product_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "₵" . $qty * $items['product_price']; ?></td>
		</tr>
		<?php } ?>
		<tr>
            <th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "₵" . $_SESSION['total_price']; ?></th>
		</tr>
		<tr>
			<td style="color : red;">Shipping Fee</td>
            
            <th>&nbsp;</th>
			<td>&nbsp;</td>
			<td><b> <a style= "color: red; font-size: 15px;"><?php echo "₵" . $qty * $items['deleivey_fee']; ?></a></b></td>
		</tr>
		<tr>
			<th>Total Including Shipping Fee</th>
            
            <th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "₵" . ($_SESSION['total_price'] + $qty * $items['deleivey_fee']); ?></th>
        </tr>
        
    </table>
    
      </center>         
          </div>
        </div>
      </div>
    </div>
  </div>
  </b>
<hr>

  <div class="container">
<div class="row">
<div class="col-lg-10">
        <div class="card-body">
    <form method="post" action="process.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
		<b><p class="text-danger">All fields have to be filled</p></b>
        <?php } ?>
        </div>
             <b>
			 <div class="form-group">
            <label for="card_type" class="col-lg-4 control-label">Selected Payment Plan</label>
            <div class="col-lg-5">
              	<select class="form-control" name="pay" required="true">
                  <b>	<option style="color: red;">Pay on Deleivery Plan</option></b>
                  	
              	</select>
            </div>
        </div>
            
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">  
            <input type="button" class="btn btn-info open-modal" value="Proceed to Comfirm Purchase">
            </div>
        </div>
    	</div>
        </b>
        </div>
	</div>
        </div>
 <br><br><br>
  <section id="newadded">
  <?php
	} else {

		
		echo "<h5><p class=\"text-warning\">Your cart is empty! Please make sure you add item to your cart!</p></h5><br><br><br>";
	
	}
	if(isset($conn)){ mysqli_close($conn); }

	require_once "./template/slide.php";
?>

 
<?php
	if(isset($conn)){
		mysqli_close($conn);
	}

?>

</section>

</html>

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


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



 
 <!-- Modal HTML --> 
 <div id="myModal" class="modal fade"> 
  <div class="modal-dialog"> 
   <div class="modal-content"> 
    <div class="modal-header"> 
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 

    </div> 

    <div class="modal-body"> 

    <div class="row">
<div class="col-xs-10 col-md-offset-1 ">
<div class="panel panel-info">
   <div class="panel-heading">
     
	<table class="table">
	<tr>
            <th>ITEM</th>
			<th>PRICE</th>
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
		 
		</td>	
           
			<td><?php echo "₵" . $items['product_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "₵" . $qty * $items['product_price']; ?></td>
		</tr>
		<?php } ?>
		<tr>
            <th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "₵" . $_SESSION['total_price']; ?></th>
		</tr>
		<tr>
			<td style="color : red;">Shipping Fee</td>
            
            <th>&nbsp;</th>
			<td>&nbsp;</td>
			<td><b> <a style= "color: red; font-size: 15px;"><?php echo "₵" . $qty * $items['deleivey_fee']; ?></a></b></td>
		</tr>
		<tr>
			<th>Total Including Shipping Fee</th>
            
            <th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "₵" . ($_SESSION['total_price'] + $qty * $items['deleivey_fee']); ?></th>
        </tr>
        
     
     
    </table>
    </div>
</div>

 </div>

    </div> 
    <div class="modal-footer"> 
    <a href="books.php" class="btn btn-danger" name="add" value="add" >Contiune Shopping</a>
    <button type="submit" class="btn btn-info">Comfirm Purchase</button>
    </div> 
   </div> 
  </div> 
 </div> 
 
 <script src="bootstrap/js/jquery.js"></script> 
 <script src="bootstrap/js/bootstrap.js"></script> 
 
 <script type="text/javascript"> 
  $(document).ready(function() 
  { 
   $('.open-modal').click(function() 
   { 
    $('#myModal').modal('show'); 
   }); 
   $("#myModal").on('hidden.bs.modal', function() 
   { 
    
   }); 
  }); 
 </script> 
 </form>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
