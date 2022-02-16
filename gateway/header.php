<?php

require_once 'init.php';

session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro Ecommerce</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="style1.css"/>
		<link type="text/css" rel="stylesheet" href="header.css"/>
		
		<link type="text/css" rel="stylesheet" href="viewcart.css"/>
		
		<script type="text/javascript" src="viewcart.js"></script>

		<!-- LINK FOR FILTERS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		
    </head>

<script type="text/javascript">
	
	function logout()
  {
    location.href="logout.php";
  }
</script>

	<body>

		<!-- HEADER -->
		<header>
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-2">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-4 clearfix">
									
							<div class="header-ctn">
								<div>
									<?php 
						            if(isset($_SESSION['email']))
						            {
						            	$name=$_SESSION['email'];
						            	?>
										<a href="logout.php">
										<i class="fa fa-user-circle"></i>
										<span onclick="logout();"><?=$name;?></button> </span>
										<span>Sign out</span>
									</a>
 
									<?php
									        }
									        else
									        {
									?><a href="login_register.php">
										<i class="fa fa-user-circle"></i>
										<span >Sign In</button> </span>
									</a>
									
									        <?php }
									        ?>
								</div>
								<!-- Wishlist -->
								<div>
									<a href="wishlist.php">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
									</a>
								</div>
								<!-- /Wishlist<?= $wcount;?> -->

								<!-- Cart -->
								<div class="dropdown">
									<a href="viewcart.php">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
									</a>
								</div>
								<!-- /Cart -->
								
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->

							</div>
						</div> 
						<!-- /ACCOUNT -->

					</div>
										
									
					<!-- row -->
				</div>
				<!-- container -->

			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="hotdeal.php">Hot Deals</a></li>
						<li><a href="laptop.php">Laptops</a></li>
						<li><a href="mobile.php">Smartphones</a></li>
						<li><a href="camera.php">Cameras</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

