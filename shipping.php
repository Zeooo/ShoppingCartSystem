<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
    }
    $user_id=$_SESSION['id'];
    $user_products_query="select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){

    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['price']; 
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>  
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/style4.css" type="text/css">
    </head>
    <body>
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
			<div class="row">
			  <div class="col-75">
				<div class="container1">
				  <div class="ship">
					<div class="row">
					  <div class="col-50">
						<h3>Billing Details</h3>
						<label for="fname"><i class="fa fa-user"></i> Full Name</label>
						<input type="text" id="fname" name="firstname" placeholder="John M. Doe">
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" placeholder="john@example.com">
						<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
						<label for="city"><i class="fa fa-institution"></i> City</label>
						<input type="text" id="city" name="city" placeholder="Quezon City">
						<div class="row">
						  <div class="col-50">
							<label for="state">State</label>
							<input type="text" id="state" name="state" placeholder="Northern Luzon">
						  </div>
						  <div class="col-50">
							<label for="zip">Zip</label>
							<input type="text" id="zip" name="zip" placeholder="1100">
						  </div>
						</div>
					  </div>
					  <div class="col-51" style="align:right">
						<h3>Payment</h3>
						<label for="fname">Accepted Cards</label>
						<div class="icon-container">
						  <i class="fa fa-cc-visa" style="color:navy;"></i>
						  <i class="fa fa-cc-amex" style="color:blue;"></i>
						  <i class="fa fa-cc-mastercard" style="color:red;"></i>
						  <i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>
						<label for="cname">Name on Card</label>
						<input type="text" id="cname" name="cardname" placeholder="John More Doe">
						<label for="ccnum">Credit card number</label>
						<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
						<label for="expmonth">Exp Month</label>
						<input type="text" id="expmonth" name="expmonth" placeholder="September">
						<div class="row">
						  <div class="col-50">
							<label for="expyear">Exp Year</label>
							<input type="text" id="expyear" name="expyear" placeholder="2018">
						  </div>
						  <div class="col-50">
							<label for="cvv">CVV</label>
							<input type="text" id="cvv" name="cvv" placeholder="352">
						  </div>
						</div>
					  </div>
					</div>
					<div class="container">
					    <table class="table table-bordered table-striped">
							<tbody>
								<tr>
									<th><center>Item Number</center></th><th><center>Item Name</center></th><th><center>Price</center></th><th></th>
								</tr>
							   <?php 
								$user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
								$no_of_user_products= mysqli_num_rows($user_products_result);
								$counter=1;
							   while($row=mysqli_fetch_array($user_products_result)){
								 ?>
								<tr>
									<th><center><?php echo $counter ?></center></th><th><center><?php echo $row['name']?></center></th><th><center>₱ <?php echo $row['price']?></center></th>
									<th><a href='cart_remove.php?id=<?php echo $row['id'] ?>'><center>Remove</center></a></th>
								</tr>
							   <?php $counter=$counter+1;}?>
								<tr>
									<th></th><th><center>Shipping Fee</center></th><th><center>₱ 60</center></th>
								</tr>
								<tr>
									<th></th><th><center>Total</center></th><th><center>₱ <?php echo $sum + 60;?></center></th>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="products.php">
						<input type="button" value="Continue to checkout" class="btn"</label>
					</a>
			  	  </div>
				</div>
			  </div>
			</div>
            <br><br><br><br><br><br><br><br><br><br>
            <footer class="footer">
               <div class="container">
                <center> 
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>