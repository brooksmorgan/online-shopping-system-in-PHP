<?php
	require_once "../functions/database_functions.php";
  require_once "../functions/connection.php";
  session_start();
  if(!isset($_SESSION['email'])){
    header('location:login.php');
    
  }
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
	
	} else {
		unset($_SESSION['err']);
	}


	$_SESSION['ship'] = array();
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$_SESSION['ship'][$key] = $value;
		}
	}


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

  <title>Payment Process</title>

  
  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/heroic-features.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<!-- CSS Files -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/demo/demo.css" rel="stylesheet" />

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
    <b>  <a class="navbar-brand" style="font-size:20px; color:blue" href="books.php">BROOKS | SHOP</a></b>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link nc-icon nc-shop"  style="font-size:20px; color:black;" href="books.php"> SHOP
              <span class="sr-only">(current)</span>
            </a>
          </li> 

          <li class="nav-item">
               <!--CONTACT----->
            <a class="nav-link nc-icon nc-email-85" style="font-size:20px; color:black;" href="#contact"></a>
          </li>
          
          <li class="nav-item">
        <!--CART----->
           <b> <a class="nav-link nc-icon nc-cart-simple" style="font-size:25px; color:red;" href="cart.php"> </a>Modify | </b>
          </li>

          <li class="nav-item">
            <!--USERNAME----->
           <b> <a class="nav-link nc-icon nc-circle-10" style="font-size:20px; color:green;";" href="#"> </a></b>
          </li>

          <li class="nav-item">
             <!--LOGOUT----->
            <a class="nav-link nc-icon nc-simple-remove" style="font-size:20px; color:black;" href="logout.php"></a>
          </li>

          
        </ul>
      </div>
    </div>
  </nav>
 

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
		 <a href="books.php?bookisbn=<?php echo $items['product_id']; ?>"><img class="card-img-top" style ="height:70px; width:60px;" src="../../bootstrap/img/<?php echo $items['product_image1']; ?>"></a>
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
<b>
<div class="container">
<div class="row">
<div class="col-lg-10">
        <div class="card-body">
    <form method="post" action="process2.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p style="color:blue;">MOBILE MONEY PAYMENT METHOD</p>
		<b><p class="text-danger">All fields have to be filled</p></b>
        <?php } ?>
        </div>
		<b>
		</div>
						
        <div class="panel-body">
	<div class="form-group">
            <label for="card_type" class="col-lg-6 control-label">Selected Payment Plan</label>
            <div class="col-lg-11">
              	<select class="form-control" name="pay" required="true">

                  <b><option style="color: red;">Mobile Money Plan</option></b>
                  	
              	</select>
            </div>
        </div>
            				

            <div class="form-group">
            <label for="momo_type" class="col-lg-4 control-label">Operater</label>
            <div class="col-lg-11">
              	<select class="form-control" name="momo_type" required="true">
                  	<option value="mtn">Mtn</option>
                  	<option value="airtel">AirtelTigo</option>
                      <option value="glo">Glo</option>
                      <option value="voda">Vodafone</option>
              	</select>
            </div>
        </div>       
   
        <div class="form-group">
            <label for="card_number" class="col-lg-4 control-label">Zip code</label>
            <div class="col-lg-11">
              	<input type="number" class="form-control" name="zip_number" placeholder="+233 or 00233" required >
            </div>
        </div>

      
        <div class="form-group">
            <label for="card_number" class="col-lg-4 control-label">Telephone</label>
            <div class="col-lg-11">
              	<input type="number" class="form-control" name="tel_unmber" placeholder="Example 0244644700" maxlength="10" required>
            </div>
        </div>
</b>



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
				</b>
 <br><br><br>

 <footer class="py-5 bg-white">

  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 style ="font-size: 25px;" class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5" style ="font-size: 20px;" >Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div> 
          <li class="d-block nc-icon nc-chat-33" style ="font-size: 35px;"> </li><br>
          <a class="d-block" style ="font-size: 20px;"  href="#call: 0244644700">(+233) 0244644700</a>
        </div>
        </div>

        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <li class="d-block nc-icon nc-email-85" style ="font-size: 35px;"> </li><br>
          <a class="d-block" style ="font-size: 20px;"  href="mailto:stageshub@gmail.com">stageshub@gmail.com</a>
        </div>
      </div>
    </div>
 
  </section>
<br><br><br>
    <div class="container">
      <center>
    <p style="color:black;" >   @Copyright Protection <a href="#">BROOK MORGAN</a>. All Rights Reserved.</p>
       <p style="color:black;" >This website is developed by Brooks Morgan</p>
       </center>
      </div>
    <!-- /.container -->
  </footer>
  <?php
	} else {

		
		echo "<h5><p class=\"text-warning\">Your cart is empty! Please make sure you add item to your cart!</p></h4><br><br><br>";
	
	}
	if(isset($conn)){ mysqli_close($conn); }


?>




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
		<a href="books.php?bookisbn=<?php echo $items['product_id']; ?>"><img class="card-img-top" style ="height:70px; width:60px;" src="../../bootstrap/img/<?php echo $items['product_image1']; ?>"></a>
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


  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    function SelectText(element) {
      var doc = document,
        text = element,
        range, selection;
      if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
      } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    }
    window.onload = function() {
      var iconsWrapper = document.getElementById('icons-wrapper'),
        listItems = iconsWrapper.getElementsByTagName('li');
      for (var i = 0; i < listItems.length; i++) {
        listItems[i].onclick = function fun(event) {
          var selectedTagName = event.target.tagName.toLowerCase();
          if (selectedTagName == 'p' || selectedTagName == 'em') {
            SelectText(event.target);
          } else if (selectedTagName == 'input') {
            event.target.setSelectionRange(0, event.target.value.length);
          }
        }

        var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
          beforeContent = beforeContentChar.charCodeAt(0).toString(16);
        var beforeContentElement = document.createElement("em");
        beforeContentElement.textContent = "\\" + beforeContent;
        listItems[i].appendChild(beforeContentElement);

        //create input element to copy/paste chart
        var charCharac = document.createElement('input');
        charCharac.setAttribute('type', 'text');
        charCharac.setAttribute('maxlength', '1');
        charCharac.setAttribute('readonly', 'true');
        charCharac.setAttribute('value', beforeContentChar);
        listItems[i].appendChild(charCharac);
      }
    }
  </script>

</body>

</html>
