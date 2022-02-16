<?php
include 'Product_cam.php';
$product = new Product_cam();
if(isset($_POST["action2"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>