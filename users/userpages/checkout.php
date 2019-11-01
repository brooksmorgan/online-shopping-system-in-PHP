<?php
	
	session_start();
  require_once "../functions/database_functions.php";
  require_once "../functions/connection.php";

  if(!isset($_SESSION['email'])){
    header('location:login.php');
    
  }
	// print out header here
	$title = "Checking out";


	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mobile Mobile Money Process</title>
 <!-- Bootstrap core CSS -->
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
				 <a href="books.php?bookisbn=<?php echo $items['product_id']; ?>"><img class="card-img-top" style ="height:70px; width:60px;" src="../../bootstrap/img/<?php echo $items['product_image1']; ?>"></a>
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

	</div>
		</div>
		<hr>
		
		<b>
		<form method="post" action="payment_method.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
			<?php } ?>
	
				<div class="col-xs-4 col-xs-offset-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>SHIPPING ADDRESS</h3>
						</div>
						<br>
		<div class="card-body "style="color: green;">

		<div class="form-group">
            <label for="card_type" class="col-lg-4 control-label">Selected Payment Plan</label>
            <div class="col-lg-5">
              	<select class="form-control" name="pay" required="true">
                  <b>	<option style="color: red;">Pay on Deleivery Plan</option></b>
                  	
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

		<input type="submit" name="submit" value="Contiune To Proceed" style="font-size:15px;" class="btn btn-link">
		<li class="nc-icon nc-minimal-right"></li>
		</div>
	</div>
</center>
</b>
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
		echo "<h4><p class=\"text-warning\">Your cart is empty! Please make sure you add item to your cart!</p></h4><br><br><br>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	
?>



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
