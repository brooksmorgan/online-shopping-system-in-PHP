<?php
	session_start();
	
	$title = "Add new book";
	require "../functions/database_functions.php";
	$conn = db_connect();

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
    <div class="sidebar" data-color="white" data-active-color="danger">
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
          <li class="active ">
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
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Post Table</p>
            </a>
          </li>
         <li>
            <a href="./tables.html">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Orders</p>
            </a>
          </li>
         <hr>


          <li>
            <a href="./map.html">
              <i class="nc-icon nc-pin-3"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
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
            <h3 class="card-title">Add New Product</h3>
		   
			<form method="post" action="add.php" enctype="multipart/form-data">
			
			<div class="panel-body col-lg-10">

		<div class="form-group">
		 <input type="number" class="form-control" name="id" placeholder="Product ID" readOnly="true">                       
		 </div>                                  
		  
		 <div class="form-group">
		 <input type="text" class="form-control" name="title" placeholder="Product Name" required="true">                       
		 </div>

		 <div class="form-group">
     <input type="number" class="form-control" name="fee" placeholder="Deleivery Fee" required="true">    
    </div> 
               
		 <div class="form-group">
		 <textarea name="descr" class="form-control" cols="100" rows="4" placeholder="Phone Specs And Description" required="true">  </textarea>                  
		 </div>
		 
		 <div class="form-group">
		 <input type="number" class="form-control" name="price" placeholder="Product Price" required="true">                       
		 </div>
		<div>
		<input type="file" class="btn btn-info "name="image" value="Choose Product Image" required="true">   
    </div>
    <div>
		<input type="file" class="btn btn-info "name="image1" value="Choose Product Image">   
		</div>

		<input type="submit" name="add" value="Add new book" class="btn btn-primary">
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
