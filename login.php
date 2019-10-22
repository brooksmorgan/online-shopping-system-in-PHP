<?php
  session_start();
  
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $title = "BROOKS | SHOP Login";
  require "./template/header7.php";
?>

<!DOCTYPE html>
<html>
   
    <body>
        <div>
            
            <br><br><br>
        
           <div class="container" >
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-1">
                        
                            <div class="panel-heading">
                            <h3><b>SIGN IN</b></h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to make a purchase.</p>
                                <form method="post" action="books.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true">
                                        </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                        
                            <b><div class="panel-footer">Don't have an account? <a href="signup.php">Be a member now</a></div></b>
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




