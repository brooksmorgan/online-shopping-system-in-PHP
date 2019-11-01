<?php
 require_once "../functions/database_functions.php";
 require_once "../functions/connection.php";
  session_start();
  if(!isset($_SESSION['email'])){
    header('location:login.php');
    
  }

  $product_id = $_GET['bookisbn'];
  // connec to database
 
  $conn = db_connect();

  $query = "SELECT * FROM items WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "No Product";
    exit;
  }
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
  
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
     <b> <a class="navbar-brand" style="font-size:20px; color:blue;" href="books.php">BROOKS | SHOP</a></b>
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
           <b> <a class="nav-link nc-icon nc-cart-simple" style="font-size:25px; color:red;" href="cart.php"> </a></b>
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

  <br><br>
  <!-- Page Content -->
  <div class="container">

    <div class="row">


       <div class="card mt-8">
     
        <center> 
         <img  src="../../bootstrap/img/<?php echo $row['product_image1']; ?>">
        
          </center>
        </div>
          <div class="card-body">
            <h3 class="card-title"><?php echo $row['product_name']; ?></h3>
            <h4 style=" color: blue;"> <?php echo "₵" .  $row['product_price']; ?></h4>
            <p class="card-text"><?php echo $row['product_descr']; ?></p>
         <h4>   <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></h4>
           
          </div>
       
       
       

        <div class="card card-outline-secondary my-4 col-lg-3">

          <div class="card-header">
           <h5><b> PRODUCT DETAILS</b></h5>
          </div>

          <div class="card-body col-md-4>
            
            <?php foreach($row as $key => $value){
              if($key == "product_descr" || $key == "product_image1" || $key == "product_image" || $key == "product_id"){
                continue;
              }
              switch($key){
               
                case "product_name":
                  $key = "Product Name    ";
                  break;
                
                case  "product_price":
                  $key = "Price ₵";
                  break;
                 
                  case "deleivey_fee":
                  $key = "Deleivery Fee ₵   ";
                  break;
                  
              }
            ?>
            <hr>
           
              <?php echo $key; ?>
             <h6 style ="color:brown;"><?php echo $value; ?></h6>
           
              
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
           
            <hr>
            <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $product_id;?>">
          <b> <input type="submit" value="ADD TO CART"  name="cart" style="font-size: 24px;" class="btn btn-link"> </b>     
           <li class="nc-icon nc-cart-simple" style="font-size:20px; color:green;"> </li>
        </form>

        
          </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-lg-9 -->
    </div>
  </div>
  <br><br><br><br><br><br>

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
