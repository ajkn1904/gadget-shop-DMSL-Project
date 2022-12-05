<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login page</title>
	<link rel="stylesheet" href="signin_style.css">
</head>
<body><ul>
<section class="header">
<div class="glogo">
<p align="center"><img src="gadlogo.jpg" width="80" height="80"></p>
 
  <h1 align="center">GadGetZ</h1>
  
<form class="container" action="project_signin.php" method="post" enctype="multipart/form-data">    
            <label><b>Email :</b> </label>   
            <input type="text" placeholder="xyz@gmail.com" name="email" required><br><br>
            <label><b>Password :</b> </label>   
            <input type="password" placeholder="Enter Password" name="password" required><br><br>  
            <p align="center">
            <input type="submit" class="btn" value="Submit" name="submit"></p>
            <br>


<?php 
include("connection.php");
if(isset($_POST['submit']))
{
  $Email=$_POST['email'];
  $Password=$_POST['password'];

  $sqlC="select email,password from customer where email='$Email' and password='$Password'";
  $sqlA="select email,password from admin where email='$Email' and password='$Password'";

      $rC=mysqli_query($con,$sqlC);
      $rA=mysqli_query($con,$sqlA);
      
      if(mysqli_num_rows($rC)>0)
      {
        $_SESSION['email']=$Email;
        $_SESSION['customer_signin_status']="Loged in";
        header("Location:cst_home.php");
      }
      else if(mysqli_num_rows($rA)>0){
        $_SESSION['email']=$Email;
        $_SESSION['admin_signin_status']="Loged in";
        header("Location:adm_home.php");
      }
      else{
        echo "<p style='color: red;'>Incorrect Email or Password. Try again!</p>";
      }  
}
?>

<br>
<p>Have no account? <a href="project_signup.php"> <b>Register Now</a></p>		

</div>
 	
   </section>
   </form>
<a href="home_page.php" class="btn"> HOME</a>  </ul> 
</body>
</html>

