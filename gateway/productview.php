<?php
include 'header.php';

require_once 'init.php';


if(isset($_GET['id']))
{
  $id1 =$_GET['id'];
}
else
{
  $id1='';
}
$id1=(int)$id1;

$sql = "select * from product_details where id = '$id1'";
$results=$conn->query($sql);
$product=mysqli_fetch_assoc($results);
$prod_id=$product['id'];
$prod_name=$product['name'];
$prod_price=$product['price'];
$prod1=$product['image1'];
$prod2=$product['image2'];
$prod3=$product['image3'];
$prod4=$product['image4'];
$prod_storage=$product['storage1'];
$prod_ram=$product['ram'];
$prod_brand=$product['brand'];
$prod_cate=$product['category'];



?>
<body>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/<?=$prod1?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/<?=$prod2?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/<?=$prod3?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/<?=$prod4?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./img/<?=$prod1?>" alt="" width="100px">
							</div>

							<div class="product-preview">
								<img src="./img/<?=$prod2?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/<?=$prod3?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/<?=$prod4?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h1><b><?= $prod_name; ?></b></h1>
							
							<div>
								<h4 class="product-price">Price: ₹<?= $prod_price; ?></h4>
								<span class="product-available">In Stock</span>
							</div>
							<p>
								<h4 class="product-price">Brand: <?= $prod_brand; ?></h4>
							</p>
							<p>
								<h4 class="product-price">Category: <?= $prod_cate; ?></h4>
							</p>
							<p>
								<h4 class="product-price">Ram: <?= $prod_ram; ?></h4>
							</p>
							<p>
								<h4 class="product-price">Storage: <?= $prod_storage; ?></h4>
							</p>

							<br><br>

							<div class="add-to-cart">
								
								<button class="add-to-cart-btn"><a href="viewcart.php?id=<?=$prod_id ?>"><i class="fa fa-shopping-cart"></i> add to cart</a></button>
							</div>


						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<?php
														$sql43 = "select * from feedback where prod_id = '$prod_id'";
														$results43=$conn->query($sql43);
														
														while($feedback=mysqli_fetch_array($results43)):	
													?>
													<li>
														<div class="review-heading">
															<h5 class="name"><?= $feedback['name']; ?></h5>
															<p class="date"><?= $feedback['email']; ?></p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p><?= $feedback['comment']; ?></p>
														</div>
													</li>

							 					<?php endwhile; ?>
													
												</ul>
											
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method="post" action="<?php $_PHP_SELF ?>" id="feedback">
													<input class="input" type="text" placeholder="Your Name" name="name">
													<input class="input" type="email" placeholder="Your Email" name="email">
													<textarea class="input" placeholder="Your Review" name="comment"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn" id="feed" name="feed">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
										<?php

if(isset($_POST['feed']))
{  
   $name = $_POST['name'];
   $email = $_POST['email'];
   $comment = $_POST['comment'];

   $sql = "INSERT INTO feedback (comment,name,email,prod_id)
   VALUES ('$comment','$name','$email','$prod_id')";

   if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
   } else {
    echo "Error: " . $sql . "

" . mysqli_error($conn);
   }
   mysqli_close($conn);
}
?>
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		</body>
<?php
include 'footer.php';
?>