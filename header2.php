<nav class="navbar navbar-inverse navabar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="products.php" class="navbar-brand">Store</a>
        </div>
                   
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				<li><div class="username" style="padding-top: 13px;">
					<?php
					if($_SESSION["name"]) {
					?>
						<a style="color:#9d9d9d" style="align:right"><?php echo $_SESSION["name"]; ?> </a>
					<?php
					}else echo "<h1>Please login first .</h1>";
					?>
				</div></li>
                <?php
            </ul>
        </div>
    </div>
</nav>