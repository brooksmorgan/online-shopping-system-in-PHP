<?php
  require_once "../functions/connection.php";
	require_once "../functions/database_functions.php";
	// print out header here
  session_start();
  if(!isset($_SESSION['email'])){
    header('location:login.php');
    
  }

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<title>Cart</title>

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
    <div class="col-lg-13">
        <!-- /.card -->
        <center>
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
           
          <b><h1 style="background-image:url(../backgroundimage/back2.jpg) ; color:black;">PLEASE CHOOSE PAYMENT PLAN METHOD</h1>   </b>                             
         
         </div>
    
                         <div class="col-xs-10 col-xs-offset-2">
                             <div class="panel panel-info">
                                 <div class="panel-heading">
                                     <h3>Mobile Money Payment Method</h3>
                                 </div>
                                 <div class="panel-body">
                                 
                                 
          <div class="list--item list--item-options -ptxl brdb -pbxl"> 
           <label class="-fwm" for="brooksshop">
               <span class="-prm">
                   <img src="../../bootstrap/mmlog/momologos.png" alt="">
                 </span>Mobile Money - MTN, Airtel &amp; Tigo</label>
          <div class="color-default-800 -fs-13 -plxxxl -mtxs" id="content">
     
              <div class="title -hidden">
     
              <label class="-fwm" for="brooksshop">
               <span class="-prm">           
                 </span><h3>Pay through your mobile money account.</h3> 
             </label> 
         </div>
         
          <div class="description ">  
              
              <label class="-fwm" for="brooksshop">
               <span class="-prm">
                  
           </span><p style="color: #ff0000;">Please ensure you have enough funds on your 
              <br>mobile money wallet to make payment instantly to avoid order cancellation.</p> 
             </label>
     
             <br>
             <a href="momo_checkout.php" class="btn btn-warning" name="add" value="add" > Proceed To Contiune With Mobile Money Method</a>
             <br>
                       
          
       </div>
     </div>

     <hr>
<hr>

<div class="col-xs-10 col-xs-offset-2">
<div class="panel panel-info">
       <div class="panel-heading"> 
             <h3>Pay on Deleivery Plan</h3>
     </div>

    
							
<div class="list--item list--item-options -ptxl brdb -pbxl"> 
 
  <label class="-fwm" for="deleivery_plan">
      <span class="-prm"><img src="bootstrap/mmlog/master_visa_logo.png" alt="">
    </span>Number one soomth Payment Plan</label> 
    <div class="color-default-800 -fs-13 -plxxxl -mtxs" id="content">
        <div class="title"> <h3>Pay on your door step as soon as packege arrive.</h3> </div>
        

        <div class="description  -hidden"> 
        <span class="-prm">
          <br>   
    </span>
   
<br>
<br>
<a href="checkout.php" class="btn btn-warning" name="add" value="add" > Proceed To Contiune Pay On Deleivery Plan</a>
    <br>
    
<br>
           
</div>
<div> 
   

          </div>
        </div>
       
    </center>
     
    <br><br>

    </div>    
    </div>

<br><br><br><br><br>

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
		echo "<h5><p class=\"text-warning\">Your cart is empty! Please make sure you add item to your cart!</p></h5><br><br><br>";
	}
	if(isset($conn)){ mysqli_close($conn); }

?>


 <!-- Bootstrap core JavaScript -->
 
 
 


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
