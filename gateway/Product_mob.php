<?php
class Product_mob 
{
	private $host  = 'localhost';
    private $user  = "root";
    private $password   = "";
    private $database  = "electro";   
	private $productTable = 'product_details';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($dbConnect));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}		
	public function getBrand(){
		$sqlQuery = "
			SELECT DISTINCT(brand)
			FROM ".$this->productTable." 
			WHERE status1 = '1' ORDER BY id DESC";
        return  $this->getData($sqlQuery);
	}
	public function getStorage(){
		$sqlQuery = "
			SELECT DISTINCT(storage1)
			FROM ".$this->productTable." 
			WHERE status1 = '1' ORDER BY storage1 DESC";
        return  $this->getData($sqlQuery);
	}
	public function getRam(){
		$sqlQuery = "
			SELECT DISTINCT(ram)
			FROM ".$this->productTable." 
			WHERE status1 = '1' ORDER BY ram ASC";
        return  $this->getData($sqlQuery);
	}
	public function searchProducts(){
		$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE status1 = '1' and category = 'mobile'";
		if(isset($_POST["minPrice"], $_POST["maxPrice"]) && !empty($_POST["minPrice"]) && !empty($_POST["maxPrice"])){
			$sqlQuery .= "
			AND price BETWEEN '".$_POST["minPrice"]."' AND '".$_POST["maxPrice"]."'";
		}
		if(isset($_POST["brand"])) {
			$brandFilterData = implode("','", $_POST["brand"]);
			$sqlQuery .= "
			AND brand IN('".$brandFilterData."')";
		}
		if(isset($_POST["ram"])){
			$ramFilterData = implode("','", $_POST["ram"]);
			$sqlQuery .= "
			AND ram IN('".$ramFilterData."')";
		}
		if(isset($_POST["storage1"])) {
			$storageFilterData = implode("','", $_POST["storage1"]);
			$sqlQuery .= "
			AND storage1 IN('".$storageFilterData."')";
		}
		$sqlQuery .= " ORDER By price";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$totalResult = mysqli_num_rows($result);
		$searchResultHTML = '';
		if($totalResult > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$searchResultHTML .= '
				
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="img/'. $row['image1'] .'" alt="" width="200px" height="400px">
								
									</div>
									<div class="product-body">
										<p class="product-category">Mobile</p>
										<h3 class="product-name"><a href="productview.php?id='. $row['id'] .'">'. $row['name'] .'</a></h3>
										<h4 class="product-price">₹'. $row['price'] .'</h4>
										<div class="product-rating">
												</div>
										<div class="product-btns">
										   <a href="wishlist.php?id='. $row['id'] .'"><button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
										   </div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="viewcart.php?id='. $row['id'] .'">
										add to cart</a></button>
									</div>
								</div>
							</div>
							<!-- /product -->
							

				';
			}
		} else {
			$searchResultHTML = '<h3>No product found.</h3>';
		}
		return $searchResultHTML;	
	}	
}
?>

