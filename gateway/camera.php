<?php
include 'header.php';

?>

<body>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script src="search2.js"></script>


<?php include('container.php');?>
	<div class="container">		
	<?php
	include 'Product_cam.php';
	$product = new Product_cam();	
	?>	
	<div class="row">
	<div class="col-md-3">                    
		<div class="list-group">
			              
			</div>			
		    
		<div class="list-group">
			<h3>Brand</h3>
			<div class="brandSection">
				<?php
				$brand = $product->getBrand();
				foreach($brand as $brandDetails){	
				?>
				<div class="list-group-item checkbox">
				<label><input type="checkbox" class="productDetail brand" value="<?php echo $brandDetails["brand"]; ?>"  >
				 <?php echo $brandDetails["brand"]; ?></label>
				</div>
				<?php }	?>
			</div>
		</div>
		
		
	</div>
	<div class="col-md-9">

	 <br />
		<div class="row searchResult">
		</div>
	</div>
    </div>	
</div>	


</body>
<?php
include 'footer.php';
?>