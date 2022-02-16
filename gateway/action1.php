<?php
include 'Product_mob.php';
$product = new Product_mob();
if(isset($_POST["action1"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>