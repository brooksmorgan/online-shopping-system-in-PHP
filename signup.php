<?php
  session_start();
  
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $title = "BROOKS | SHOP Be A Member";
  require "./template/header8.php";
?>


<!DOCTYPE html>
<html>
  
    <body>
        <div>
           
            <br><br>
            <div class="container">
                <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            <h4><b>BE A MEMBER NOW</b></h4>
                            </div>
                            <div class="panel-body">
                                <p>Be a member and enjoy the best shopping prizes</p>
                    
                        <form method="post" action="#user_registration_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true">
                            </div>
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="City" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up">
                            </div>

                            </form>
                            <b><div class="panel-footer">Already a member. <a href="login.php">Sign in</a></div></b>
                        
                    </div>
                </div>
            </div>
            </div>
                </div>
            <br><br>
    </body>
</html>

<?php
 
 require_once "./template/footer.php";
?>


