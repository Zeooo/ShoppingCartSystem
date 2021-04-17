<nav class="navbar navbar-inverse navabar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="products.php" class="navbar-brand" style='font-size:22px'>Store</a>
        </div>
                   
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['name'])){
					?>
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
					<li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="align:right"></span> Logout</a></li>
					<li><div class="username" style="padding-top: 13px;" style="align:right">
						<?php
						if($_SESSION["name"]) {
						?>
							<a style="color:#9d9d9d"><?php echo $_SESSION["name"]; ?> </a>
						<?php
						}else echo "<h1>Please login first .</h1>";
						?>
					</div></li>
					<?php
                }else{
                    ?>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                }
                ?>          
            </ul>
        </div>
    </div>
</nav>