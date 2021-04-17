<?php
    require 'connection.php';
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    if(strlen($password)<6){
        echo "Incorrect password. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="4;url=signup.php" />
        <?php
    }
	$password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
	$confirmpassword=md5(md5(mysqli_real_escape_string($con,$_POST['confirmpassword'])));
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitButton'])){
		if($_POST['password'] != $_POST['confirmpassword']){
			echo "Your passwords did not match.";
			?>
			<meta http-equiv="refresh" content="5;url=signup.php" />
			<?php
		}
	}
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$confirmpassword=mysqli_real_escape_string($con,$_POST['confirmpassword']);
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
        ?>
        <script>
            window.alert("Email already exists!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $user_registration_query="insert into users(name,email,password,confirmpassword,lastname) values ('$name','$email','$password','$confirmpassword','$lastname')";
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "User successfully registered";
        $_SESSION['email']=$email; 
		$_SESSION['password']=$password;
		$_SESSION['confirmpassword']=$confirmpassword;
        $_SESSION['id']=mysqli_insert_id($con); 
        ?>
        <meta http-equiv="refresh" content="3;url=products.php" />
        <?php
    }
?>