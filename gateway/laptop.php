
<?php
include 'header.php';
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script src="search.js"></script>


<?php include('container.php');?>
	<div class="container">		
	<?php
	include 'Product.php';
	$product = new Product();	
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
		<div class="list-group">
			<h3>RAM</h3>
			<?php			
			$ram = $product->getRam();
			foreach($ram as $ramDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="checkbox" class="productDetail ram" value="<?php echo $ramDetails['ram']; ?>" > <?php echo $ramDetails['ram']; ?> </label>
			</div>
			<?php    
			}
			?>
		</div>    
		<div class="list-group">
			<h3>Internal Storage</h3>
			<?php
			$storage = $product->getStorage();
			foreach($storage as $storageDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="checkbox" class="productDetail storage" value="<?php echo $storageDetails['storage1']; ?>"  > <?php echo $storageDetails['storage1']; ?> </label>
			</div>
			<?php
			}
			?> 
		</div>
	</div>
	<div class="col-md-9">

	 <br />
		<div class="row searchResult">
		</div>
	</div>
    </div>	
</div>	
<?php
include 'footer.php';
?>
