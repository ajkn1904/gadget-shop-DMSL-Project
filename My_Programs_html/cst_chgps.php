<?php
session_start();
//log out
if($_SESSION['customer_signin_status']!="Loged in" and ! isset($_SESSION['email']))
header("Location:home_page.php");
//logout code
if(isset($_GET['sign']) and $_GET['sign']=="out"){
  $_SESSION['customer_signin_status']="Loged out" ;
  unset($_SESSION['email']);
  header("Location:project_signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current</title>
    
    <link rel="stylesheet" href="cus_style.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="form_styl.css">
</head>
<body>
<section class="header">
<nav>
<div class="glogo">
    <img src="gadlogo.jpg" alt="logo">
  </div>
  <div class="navlink">
  
  <ul>
  <li><a href="cus_lptp.php">ORDER</a></li>
  <li><a href="">PANDING</a></li>
  <li><a href="cst_home.php">C.HOME</a></li>
  <li><a href="?sign=out">SIGN OUT</a></li>
  </ul>
  </div>
</section>

<div class="date">
<h5><?php echo date('D M Y');?></h5>  
</div>


</div>
<div>
<br>
</div>


<section class="container">
<h2 align="center">Change Password</h2>
<div class="frm">
<section class="form">
<form class="fcontainer" action="cst_chgps.php" method="post" enctype="multipart/form-data">  
  <div class="card">

<label> <b>Old Password :</b> </label> 
<input type="Password" id="pass" name="pass"> <br><br>
<label> <b>New Password :</b> </label> 
<input type="Password"  id="npass" name="npass"><br><br>
<label><b>Re-type password :</b>  </label>
<input type="Password" id="repass" name="repass"><br>
<br>
<p align="center">
<input type="submit" class="btn" value="Submit" name="submit">

</p>


</div>
</form> </ul>


<?php
if(isset($_POST['submit']))
{
  include("connection.php");
  $Email=$_SESSION['email'];
  $opass=$_POST['pass'];
  $npass=$_POST['npass'];
  $repass=$_POST['repass'];
//echo  $npass;
  if($npass==$repass){
    $sql="select Password from customer where Password='$opass' and Email='$Email'";
    $r=mysqli_query($con,$sql);
    //echo $sql;

    if(mysqli_num_rows($r)>0){
    {
      $sql1="update customer set Password='$npass' where Email='$Email'";
      //echo $sql1;
      if(mysqli_query($con,$sql1))
      {
        echo "Password Changed Successully!";
      }
    }
  }
    else
      {
       echo "<p style='color:red' align='center'>Old password does not match! Try again.</p>";
      }
    
  }


  else{
      echo "<p style='color:red' align='center'>New password does not match with Re-typed password! Try again.</p>";
    }
}

?>


</section>
</div>



</section>

</div>
<div>
<br>
</div>


<footer>
<div class="footer-content">
    
</div>
<h3>My GadGetZ</h3>
 
 <ul class="socials">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
 </ul>
 <div class="footer-bottom">
   <P>Terms & Privacy </P>
</div>
<p>copyright &copy;2022 <a href="#"></a>  </p>
</footer>
</body>
</html>