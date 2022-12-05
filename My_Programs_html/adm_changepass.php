<?php
session_start();
if($_SESSION['admin_signin_status']!="Loged in" and ! isset($_SESSION['email']))
header("Location:home_page.php");
//logout code
if(isset($_GET['sign']) and $_GET['sign']=="out"){
  $_SESSION['admin_signin_status']="Loged out" ;
  unset($_SESSION['email']);
  header("Location:project_signin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UFT-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
	<link rel="stylesheet" href="adm_style.css">
  <link rel="stylesheet" href="table.css">
  <link rel="stylesheet" href="form_styl.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<section class="header">
<nav>
<div class="glogo">
    <img src="gadlogo.jpg" alt="logo">
  </div>
  <div class="navlink">
  
  <ul>
  <li><a href="aprvOrdr.php">APPROVE</a></li>
 
  <li><a href="product.php">ADD-PRODUCT</a></li>
  <li><a href="">C.REVIEW</a></li>
  <li><a href="adm_home.php">A.HOME</a></li>
  <li><a href="?sign=out">SIGN OUT</a></li>
  </ul>
  </div>
  </div>
  </nav>
  </section>
  <div class="date">

<h5><?php echo date('D M Y');?></h5>
   
</div>
<div>
<br>
</div>

<section class="container">
<h2 align="center">Change Password</h2>
<div class="frm">
<section class="form">
<form class="fcontainer" action="adm_changepass.php" method="post" enctype="multipart/form-data">  
  

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
    $sql="select Password from admin where Password='$opass' and Email='$Email'";
    $r=mysqli_query($con,$sql);
    //echo $sql;

    if(mysqli_num_rows($r)>0){
    {
      $sql1="update admin set Password='$npass' where Email='$Email'";
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
<hr>

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