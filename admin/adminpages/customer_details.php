<?php
	session_start();

  require "../functions/database_functions.php";
	$conn = db_connect();
  $result = getAllOrders2($conn);
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!----<link rel="icon" type="image/png" href="../assets/img/favicon.png">---->
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
  
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> 
 <!-- Optional Bootstrap theme --> 
 <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css"> 



 <style> 
  .bootstrap-icons { 
   padding-top: 20px; 
  } 
   
  .bootstrap-icons ul li { 
   float: left; 
   background-image: none; 
   padding-left: 0; 
   padding-top: 0; 
   line-height: 25px; 
   margin-bottom: 5px; 
   width: 33%; 
  } 
   
  .bootstrap3-icons { 
   padding-top: 20px; 
   margin-left: 4%; 
  } 
   
  .bootstrap3-icons .glyphicon { 
   font-size: 24px; 
   margin-bottom: 10px; 
   margin-top: 5px; 
  } 
   
  .bootstrap3-icons .glyphicon-class { 
   display: block; 
   text-align: center; 
   word-wrap: break-word; 
  } 
   
  .bootstrap3-icons ul { 
   float: left; 
   padding-left: 0; 
  } 
   
  .bootstrap3-icons ul li { 
   background-image: none; 
   border: 1px solid #DDDDDD; 
   float: left; 
   font-size: 12px; 
   height: 115px; 
   line-height: 1.4; 
   margin: 0 -1px -1px 0; 
   padding: 10px; 
   text-align: center; 
   width: 104px; 
  } 
   
  ol, 
  ul { 
   list-style: none; 
  } 
 </style> 

</head>

<body class="">
  <div class="wrapper">
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
             <b><p>Add Product</p></b>
            </a>
          </li>
          <li>
          
            <a href="./tables.php">
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
           <li class="active">
            <a href="customer_details.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <b> <h5 style="color:blue;">  <p>Customer Details</p></h5></b>
            </a>
          </li>
          <li>        
            <a href="order_items.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Order Items</p>
            </a>
          </li>
           
         <hr>

          
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
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="../../users/userpages/books.php">VIEW SITE </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
              
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
    
          <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> CUSTOMER DETAILS ON ORDERS</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
         <table class="table">
         <thead class=" text-primary">
                   
                      <th style="font-size:12px;">Customer ID</th>
                      <th style="font-size:12px;">Name</th>
                      <th style="font-size:12px;">Address</th>
                      <th style="font-size:12px;">City</th>
                      <th style="font-size:12px;">Zip Code</th>
                      <th style="font-size:12px;">Telephone</th>                    
                      <th style="font-size:12px;">Country</th>
                      <th style="font-size:12px;">Payment Method</th>
                      <th>&nbsp;</th>
		                	<th>&nbsp;</th>
                     
                    </thead>

                   
                    
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                      <td style="font-size:13px;"><?php echo $row['customerid']; ?></td>
                      <td style="font-size:13px;"><?php echo $row['name']; ?></td>                
                      <td style="font-size:13px;"><?php echo $row['address']; ?></td>
                      <td style="font-size:13px;"><?php echo $row['city']; ?></td>
                      <td style="font-size:13px;"><?php echo $row['zip_code']; ?></td>
                      <td style="font-size:13px;"><?php echo $row['tel']; ?></td>
                     <td style="font-size:13px;"><?php echo $row['country']; ?></td>
                     <td style="font-size:13px;"><?php echo $row['pay']; ?></td>
                    </tr>
                    
                 
                    <?php } ?>
                    </tbody>
                  </table>  
                                  
                </div>
              </div>
            </div>
          </div>
         


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

  <script src="bootstrap/js/jquery.js"></script> 
 <script src="bootstrap/js/bootstrap.js"></script> 
  
</body>

<?php
	if(isset($conn)) {mysqli_close($conn);}

?>
</html>
