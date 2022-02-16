
<!DOCTYPE html>
<html>
<head>

  <title>LOGIN / REGISTER</title>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro Ecommerce</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    

   <script type="text/javascript" src="SignIn_SignUp.js"></script>
    <link type="text/css" rel="stylesheet" href="login_register.css"/>
    <link type="text/css" rel="stylesheet" href="header.css"/>
    

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<?php
require_once 'init.php';

session_start();
if(isset($_POST['login']))
{  
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   
   $sql = "select * from registration where userEmail='".$email."' and password='".$pass."'";
  $result1=$conn->query($sql);

  if(mysqli_num_rows($result1)==1)
  {

    echo "Logged in";
    $_SESSION["email"] = $email;
    header('Location: index.php');    
  }
  else
  {
    echo "Login failed";
  }

   mysqli_close($conn);
}

if(isset($_POST['register']))
{  
   $username = $_POST['username'];
   $useremail = $_POST['useremail'];
   $userpass = $_POST['userpass'];
   $usermobile = $_POST['usermobile'];

   $sql = "INSERT INTO registration (userName,userEmail,password,userMobile)
   VALUES ('$username','$useremail','$userpass','$usermobile')";

   if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
   } else {
    echo "Error: " . $sql . "

" . mysqli_error($conn);
   }
   mysqli_close($conn);
}
?>


<body>
 <!-- HEADER -->
    <header>
      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-4">
              <div class="header-logo">
                <a href="index.php" class="logo">
                  <img src="./img/logo.png" alt="">
                </a>
              </div>
            </div>
            <!-- /LOGO -->
            <!-- ACCOUNT -->
            <div class="col-md-8 clearfix">
                  
            </div> 
            <!-- /ACCOUNT -->

          </div>
                    
                  
          <!-- row -->
        </div>
        <!-- container -->
  
      </div>

      <!-- 
 <hr style='background-color: #000; color: #1F2F98; width:100%;'/>  /MAIN HEADER -->
    </header>
    <!-- /HEADER -->
  <!-- Modal content -->
  <div class="modal-content"> 
<div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="<?php $_PHP_SELF ?>" id="regi" method="post">
      <br><br><br><br>
      <h1>Create Account</h1>
      <span>or use your email for registration</span>
      <input type="text" 
      placeholder="Name" 
      required="true"
      name="username" 
      title="Please enter valid name" />
      <input type="email"
      name="useremail"
       placeholder="Email" 
       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
       title="abc@gmail.com or abc@gmail.co.in" 
       maxlength="30"
       required="true"/>
      <input type="password"
      name="userpass"
       placeholder="Password"
       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
       required="true" 
       />
      <input type="tel"
      name="usermobile"
       placeholder="Mobile number" 
       required="true" 
       minlength="9"
       maxlength="10"
       title="Must contain only number" 
       />
      <input type="submit" name="register" value="Sign Up">
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="<?php $_PHP_SELF ?>" method="post" id="login">
      <br><br><br><br><br><br><br><br>
      <h1>Sign in</h1>
      <span>or use your account</span>
      <input type="email"
      name="email"
       placeholder="Email"
       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
       maxlength="30"
       required="true" 
        />
      <input type="password"
      name="pass"
       placeholder="Password" 
       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
       required="true" 
       />
      <a href="#">Forgot your password?</a>
      <input type="submit" name="login" value="Sign In">
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <br><br>
        <img src="Login_logo.png" height="250px"width="250px">
        <h1><font color="#fff">Welcome Back!</font></h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn" onclick="s()">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <br><br>
        <img src="Login_logo.png" height="250px"width="250px">
        <h1><font color="#fff">Hello, Friend!</font></h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp"onclick="s()">Sign Up</button>
      </div>
    </div>
  </div>
</div>
  </div>



</body>
</html>
