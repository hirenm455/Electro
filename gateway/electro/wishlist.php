<?php

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

$price1=$product['price'];
$ip=getIp();


if($product)
{
  $sql1="INSERT INTO wishlist(prod_id,price,ip) VALUES('$prod_id','$price1','$ip') ";
  $conn->query($sql1);
  
}
?>

<body>

 <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Product</th>
                 <th scope="col">Price</th>
                
              </tr>
            </thead>
            <tbody>
<?php
$subtotal=0;
$sql1="SELECT * FROM wishlist WHERE ip='$ip'";

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

?> 	
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/<?=$img?>" height="100px" width="100px">
                    </div>
                    <td>
                    <div class="media-body">
                      <p><h4><?= $name; ?></h4></p>
                    </div>
                  </td>
                  </div>
                </td>
                <td>
                  <h5><?= $sprice; ?></h5>
                </td>
                <td>
                  <div class="product_count">
                   
                  </div>
                </td>
                <td>
                  <h5></h5>
                </td>
                <td>
                  <a href="removewishlist.php?cid=<?=$prod_id ?>"><i class="fa fa-close" style="font-size:24px"></i>
</a>
                </td>
              </tr>


      <?php
       }}
       ?>



              <tr>
                <td></td>
                <td></td>
                <td>
                  
                </td>
                <td>
                 
                </td>
              </tr>
             
            </tbody>
          </table>
          
        </div>
      </div>
  </section>



</body>
<?php
include 'footer.php';
?>    