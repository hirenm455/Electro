<?php
function test()
{					
include 'header.php';

require_once 'init.php';



if(isset($_GET['id']))
{
  $brand =$_GET['id'];
}
else
{
  $brand='';
}

$brand=(string)$brand;



$sql = "select * from product_details where brand='$brand'";
$results=$conn->query($sql);

?>


<body>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number" value=1000>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number" value=65000>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->


						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1" onclick="myFunction()">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<script>
											function myFunction() {
											  var checkBox = document.getElementById("brand-1");
											  
											  if (checkBox.checked == true){
												    <?php 
														$brand='Samsung';
														?>
												} else {
											     <?php 
													$brand='';
													?>
												}
											}
											</script>
									</label>
								</div>
										<div class="input-checkbox">
									<input type="checkbox" id="brand-2" onclick="myFunction()">
									<label for="brand-2">
										<span></span>
										VIVO
										<script>
											function myFunction() {
											  var checkBox = document.getElementById("brand-2");
											  
											  if (checkBox.checked == true){
												    <?php 
														$brand2='VIVO';
														?>
												} else {
											     <?php 
													$brand2='';
													?>
												}
											}
											</script>
									</label>
								</div><div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
 					<form action="laptopfilter.php" method="post" id="apply_filter">
 						<button type="submit" name="button">CLick</button>
				</form>
				

			</div>
					<!-- /ASIDE -->

<div id="store" class="col-md-9">
						<!-- store products -->
			<div class="row">
							<?php
							
							while($lappy=mysqli_fetch_assoc($results)):

									?>
									
										<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
								
									</div>
									<div class="product-body">
										<p class="product-category">Laptop</p>
										<h3 class="product-name"><?= $lappy['name']; ?></h3>
										<h4 class="product-price">₹<?= $lappy['price']; ?></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
										   <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										   <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="viewcart.php?id=<?= $lappy['id']?>">add to cart</a></button>
									</div>
								</div>
							</div>
							<!-- /product -->
							
							 <?php endwhile; ?>

		<div class="clearfix visible-sm visible-xs"></div>
	</div>
						<!-- /store products -->
<?php
}
test();
?>