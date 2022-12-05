<?php
session_start();
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
<html>
<head>
<meta charset="UFT-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
	<link rel="stylesheet" href="cus_style.css">
  
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
  <li><a href="pndng.php">PANDING</a></li>
  <li><a href="">REVIEW</a></li>
  <li><a href="cus_lptp.php">ORDER</a></li>
  <li><a href="cst_chgps.php">PASSWORD</a></li>
  <li><a href="?sign=out">SIGN OUT</a></li>
  </ul>
  </div>
 

<div class="iconsnav" onclick="menuToggle();">
<h2>ME</h2>
<div class="card">

<?php
  include("./connection.php");
  $Email=$_SESSION['email'];
  $sqlC="select image,name,gender,location,mobile,email from customer where email='$Email'";
  $rC=mysqli_query($con,$sqlC);
  $row=mysqli_fetch_assoc($rC);
  
$Name=$row['name'];
$Mobile=$row['mobile'];
$Email=$row['email'];
$Location=$row['location'];
$Gender=$row['gender'];
$Image=$row['image'];

echo "<h3>Hey, I'm $Name!</h3><br>";
echo "<div class='fimg' style='height:100px;'><img src='Uploadedimage/$Image' height='80px' width='100px'></div>";
echo "<p><b>Gender :  </b>$Gender</br><b>Mobile : </b>$Mobile</br><b>Email  : </b>$Email</br><b>Address : </b>$Location</br></p>";
?>
</div>
  
<script>
  function menuToggle(){
    const toggleMenu = document.querySelector('.card');
    toggleMenu.classList.toggle('active')
  }
</script>

</div>

</nav>

<h1 align="center"> Welcome to the GadGetZ Member Panel</h1>

</section>

<div class="date">
<h5><?php echo date('D M Y');?></h5>  
</div>

</div>
<div>
<br>
</div>



<section class="product" id="product" name="product">

<h1 class="head" name="head" align="center"> Latest <span> Products </span><span> & </span><span> Updates </span></h1>


<div class="boxcontainer" name="boxcontainer">


<div class="box" name="box">
<span class="discount">30% off on Laptop of all brands.</span>
<div class="image">
<img src="laptopN.jpg" alt="">
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="cus_lptp.php" class="fas fa-shopping-cart"></a>
<a href="#" class="fas fa-eye"></a>
<a href="#" class="fas fa-share"></a>

</div>
</div>
<div class="content">
<h3>Laptop</h3>


<div class="price" name="price">150.00/-<span>170.50/-</span></div>
<div class="icons">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star-half-alt"></i>
</div>
</div>
</div>

<div class="box" name="box">
<span class="discount">15% off on Smart Phone of all brands.</span>
<div class="image">
<img src="phone.jpg" alt="">
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="cus_lptp.php" class="fas fa-shopping-cart"></a>
<a href="#" class="fas fa-eye"></a>
<a href="#" class="fas fa-share"></a>
</div>
</div>
<div class="content">
<h3>Smart Phone</h3>
<div class="price" name="price">50.00/-<span>55.50/-</span></div>
<div class="icons">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
</div>
</div>

<div class="box" name="box">
<span class="discount">12% off on Headphone of all brands.</span>
<div class="image">
<img src="headphone.jpg" alt="">
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="cus_lptp.php" class="fas fa-shopping-cart"></a>
<a href="#" class="fas fa-eye"></a>
<a href="#" class="fas fa-share"></a>
</div>
</div>
<div class="content">
<h3>Headphone</h3>
<div class="price" name="price">39.00/-<span>40.00/-</span></div>
<div class="icons">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
</div>
</div>

<div class="box" name="box">
<span class="discount">20% off on Earbuds of all brands.</span>
<div class="image">
<img src="earbud.jpg" alt="">
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="cus_lptp.php" class="fas fa-shopping-cart"></a>
<a href="#" class="fas fa-eye"></a>
<a href="#" class="fas fa-share"></a>
</div>
</div>
<div class="content">
<h3>Earbuds</h3>
<div class="price" name="price">15.00/-<span>17.50/-</span></div>
<div class="icons">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star-half-alt"></i>
</div>
</div>
</div>

<div class="box" name="box">
<span class="discount">25% off on Smart Glasses of all brands.</span>
<div class="image">
<img src="smartglass.jpg" alt="">
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="cus_lptp.php" class="fas fa-shopping-cart"></a>
<a href="#" class="fas fa-eye"></a>
<a href="#" class="fas fa-share"></a>
</div>
</div>
<div class="content">
<h3>Smart Glasses</h3>
<div class="price" name="price">45.00/-<span>47.50/-</span></div>
<div class="icons">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star-half-alt"></i>
</div>
</div>
</div>

<div class="box" name="box">
<span class="discount">5% off on Watch of all brands.</span>
<div class="image">
<img src="watch.jpg" alt="">
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="cus_lptp.php" class="fas fa-shopping-cart"></a>
<a href="#" class="fas fa-eye"></a>
<a href="#" class="fas fa-share"></a>
</div>
</div>
<div class="content">
<h3>watch</h3>
<div class="price" name="price">15.00/-<span>17.50/-</span></div>
<div class="icons">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
</div>
</div>



</div>

<p align="center">
<button class="shopbtn" style="vertical-align:middle"><span><b>Visit More </b></span></button>
</p>

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