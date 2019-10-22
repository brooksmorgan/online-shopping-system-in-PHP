<?php
	session_start();

	$title = "Posted Product";
  require "../functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
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
            <a class="navbar-brand" href="../books.php">VIEW SITE </a>
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
                <h4 class="card-title"> PRODUCT ON SITE NOW</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
         <table class="table">
                    <thead class=" text-primary">
                      <th style="font-size:14px;">ID</th>
                      <th style="font-size:14px;">Name</th>
                      <th style="font-size:14px;">Price</th>
                      <th style="font-size:14px;">Descpt and Specs</th>
                      <th style="font-size:14px;">Image</th>
                      <th style="font-size:14px;">Deleivery Fee</th>
                      <th>&nbsp;</th>
		                	<th>&nbsp;</th>
                     
                    </thead>

                   
                    
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                      <td style="font-size:13px;"><?php echo $row['product_id']; ?></td>
                      <td style="font-size:13px;"><?php echo $row['product_name']; ?></td>
                      <td style="font-size:13px; color:red;"><?php echo  "₵" . $row['product_price']; ?></td>
                      <td style="font-size:13px;"><?php echo $row['product_descr']; ?></td>
                      <td> 
                        <a href="#?bookisbn=<?php echo $row['product_id']; ?>"><img class="card-img-top" style ="height:60px; width:60px;" src="../bootstrap/img/<?php echo $row['product_image']; ?>"></a>
                    </td>
                      <td style="font-size:13px;"><?php echo $row['deleivey_fee']; ?></td>
                    
                      <td  class="text-right"><a href="admin_edit.php?bookisbn=<?php echo $row['product_id']; ?>"class="btn btn-primary" name ="edit">Edit</a></td>
                      <td  class="text-right" style="width:10px"><a href="admin_delete.php?bookisbn=<?php echo $row['product_id']; ?> "class="btn btn-danger"> Comfirm Delete</a> </a></td>
                      
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

  
</body>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "../template/footer1.php";
?>
</html>
