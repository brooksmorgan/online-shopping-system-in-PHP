<?php
	session_start();
	
	$title = "Edit product";

	require_once "../functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['bookisbn'])){
		$product_id = $_GET['bookisbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($product_id)){
		echo "Empty product! check again!";
		exit;
	}

	// get product data
	$query = "SELECT * FROM items WHERE product_id = '$product_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="primary">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
         
        <a href="dashboard.php" class="simple-text logo-normal">
        <b><h6> Brooks | Shop Admin</h6></b>
        </a>
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">
         
            <a href="dashboard.php">
              <i class="nc-icon nc-bank"></i>
             <h5> <b><p>Dashboard</p></b></h5>
            </a>
          </li>
         <hr>
          <li>
         
            <a href="admin_add.php">
              <i class="nc-icon nc-laptop"></i>
             <b> <p>POST NEW PRODUCT</p></b>
            </a>
          </li>
          <li>
          <li class="active ">
            <a href="tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Post Table</p>
            </a>
          </li>
          <li>
          <a href="orders.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Order Details</p>
            </a>
          </li>
         
          <li>
            <a href="customer_details.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Customer Details</p>
            </a>
          </li>

          <li>  
            <a href="order_items.php">
              <i class="nc-icon nc-bullet-list-67"></i>
            <p>Order Items</p>
            </a>
          </li>

          
          <li>
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Users</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">

    <center>
    <div class="container ">
    <div class="row">
      <div class="col-lg-6 ">
        <div class="card-body">
        <div class="card mt-7">     
          <div class="card-body">
            <h3 class="card-title">Make Chnages to Product</h3>
		   
			<form method="post" action="edit.php" enctype="multipart/form-data">
			
      <div class="panel-body col-lg-10">
 
 <div class="form-group">
  <input type="number" class="form-control" name="id" value="<?php echo $row['product_id'];?>" placeholder="Product ID" readOnly="true">                       
  </div>                                  
   
  <div class="form-group">
  <input type="text" class="form-control" name="title" value="<?php echo $row['product_name'];?>" placeholder="Product Name" required="true">                       
  </div>

  <div class="form-group">
  <input type="number" class="form-control" name="fee" value="<?php echo $row['deleivey_fee'];?>" placeholder="Deleivery Fee" required="true">    
 </div> 
            
  <div class="form-group">
  <textarea name="descr" class="form-control" cols="100" rows="4" placeholder="Phone Specs And Description" required="true"> <?php echo $row['product_descr'];?> </textarea>                  
  </div>
  
  <div class="form-group">
  <input type="number" class="form-control" name="price" value="<?php echo $row['product_price'];?>" placeholder="Product Price" required="true">                       
  </div>

 <div>
 <input type="file" class="btn btn-info "name="image1" value="<?php echo $row['product_image1'];?>" required="true">   
 </div>

 <input type="submit" name="save_change" value="Save Changes" class="btn btn-primary">
 <a href="tables.php" value ="Cancel" class="btn btn-danger">Cancel</a>
	

	</form>
	<br/>
	</div>

         </div>
        </div>
        </div>
      </div>
    </div>
  </div>

</center>

      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
