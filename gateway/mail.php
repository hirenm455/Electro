
<?php
 $host  = "localhost";
 $user  = "root";
 $password   = "";
 $database  = "electro";   
 $feedbackTable = 'feedback';
 $dbConnect = false;
$conn = new mysqli($host,$user,$password,$database);
  if($conn->connect_error)
  {
  die("Error failed to connect to MySQL: " . $conn->connect_error);
  }
  else
  {
    $dbConnect = $conn;
   }
        
   $exp = $_POST['experience'];
   $comment = $_POST['comments'];
   $name = $_POST['name'];
   $email = $_POST['email'];

   $sql = "INSERT INTO feedback (rating,comment,name,email)
   VALUES ('$exp','$comment','$name','$email')";

   if (mysqli_query($conn, $sql)) 
   {
    header("Location:ReplicaPage.php");

   } 
   else 
   {
    echo "Error: " . $sql . " " . mysqli_error($conn);
  }


?>