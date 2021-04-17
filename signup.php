<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title> Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/style2.css" type="text/css">
		<link rel="stylesheet" href="css/signup.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
			<div class="start">
                <div class="title">
                    <h1><center style="color:white">Welcome to <img src="img/blogo.png" alt="logoname" height="200"> </center></h1>
                    <h4 style="color:white">Discover watches you've never seen before. Shop O'clock offers the most unique, affordable and cool watches. 
					Shop for men, women and children watches for the lowest price. Authentic Watches and Guarantee Included.</h4>
                </div>
            </div>
            <br><br>
            <div class="signup">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h2><b><center>SIGN UP</center></b></h2>
                        <form method="post" action="user_registration_script.php">
							<div class="form-group">
								<input type="text" class="form-control" name="name" style='font-size:20px' placeholder="First Name" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="lastname" style='font-size:20px' placeholder="Last Name" required="true">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" style='font-size:20px' placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
							</div> 
							<div class="form-group1">
								<input type="password" class="form-control" name="password" style='font-size:20px' placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}" id="password" required >
							<div class="form-group2">
								<input type="confirmpassword" class="form-control" name="confirmpassword" style='font-size:20px' placeholder="Confirm Password" required="true" pattern=".{6,}" id="confirm_password" required>
							</div>
							<div class="button">
								<input type="submit" class="btn btn-primary" value="Sign Up" style='font-size:23px' name="submitButton">
							</div>
						</form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center> 
               </center>
               </div>
           </footer>
        </div>
    </body>

<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
</html>