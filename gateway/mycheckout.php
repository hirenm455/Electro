

<?php
include 'header.php';
function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


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

$price1=$product['price'];
$ip=getIp();



?>
<body>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<form method="post" action="payTm/PaytmKit/pgRedirect.php">

							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address"  required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country" required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="zip-code" placeholder="ZIP Code" required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone" required>
							</div>
						
						</div>
						<!-- /Billing Details -->

					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<?php
							$subtotal=0;
							
							$sql1="SELECT * FROM cart WHERE ip='$ip'";

							$cart=$conn->query($sql1);

							while($cr=mysqli_fetch_array($cart))
							{
							      $prod_id= $cr['prod_id']; 
							      $sql2="SELECT * FROM product_details WHERE id='$prod_id'";
							      $prod=$conn->query($sql2);
							       
							        while($pd=mysqli_fetch_array($prod))
							        {
							          $prods=array($pd['price']);
							          $name=$pd['name'];
							          $brand=$pd['brand'];
							          $sprice=$pd['price'];
							          $img=$pd['image1'];

							         $total=$sprice*1;
							
							?>
							<div class="order-products">
								<div class="order-col">
									<div>1 x <?= $name; ?></div>
									<div>₹<?= $sprice; ?></div>
								</div>
							</div>
							<?php
							 
      								$subtotal= $subtotal+$total;
      
								}}
							?>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">₹<?= $subtotal; ?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							
							
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>


						
							<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
								name="ORDER_ID" autocomplete="off"
								value="<?php echo  "ORDS" . rand(10000,99999999)?>" hidden>

							<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001" hidden>
							<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" hidden>
					
							<input id="CHANNEL_ID" tabindex="4" maxlength="12"
								size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
							
							<input title="TXN_AMOUNT" tabindex="10"
								type="text" name="TXN_AMOUNT"
								value="<?php echo $subtotal;?>" hidden>

						
							<input value="CheckOut" type="submit" class="primary-btn order-submit"	onclick="" value="Place order">
						</form>


						<!--<a href="#" class="primary-btn order-submit">Place order</a>-->
					</div>
					<!-- /Order Details -->
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