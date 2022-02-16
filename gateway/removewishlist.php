
<?php


require_once 'init.php';


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


$ip = getIp();

if(isset($_GET['cid']) && !empty($_GET['cid']))
{
	$delete_id = (int)$_GET['cid'];
	$sql4 = "DELETE FROM wishlist WHERE prod_id = '$delete_id' AND ip = '$ip'";
	$conn->query($sql4);
	header('Location: wishlist.php');
}

?>
