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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panding</title>
    
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
  <li><a href="cst_home.php">C.HOME</a></li>
  <li><a href="cst_chgps.php">PASSWORD</a></li>
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

<section style="background-color:blanchedalmond">
<h2 align="center">Order Status</h2>
<section name="container">
<?php
include("connection.php");

  $sql="select * from cusorderdetails,ordertrack,products where cusorderdetails.O_Id=ordertrack.O_Id and ordertrack.P_ID=products.P_ID";
  $r=mysqli_query($con,$sql);

  echo"<table id='customers' class='customers'>";
  echo "<tr>
  <th>Order ID</th>
  <th>Email</th>
  <th>Type</th>
  <th>Brand</th>
  <th>Product ID</th>
  <th>Order Date</th>
  <th>Status</th>
  </tr>";

  while($row=mysqli_fetch_array($r)){
    $O_Id=$row['O_Id'];
    $Email=$row['Email'];
    $Type=$row['Type'];
    $Brand=$row['Brand'];
    $P_ID=$row['P_ID'];
    $O_date=$row['O_date'];
    $Status=$row['Status'];
    
    
    if($Status==0){
    echo"<tr>
    <td>$O_Id</td><td>$Email</td><td>$Type</td><td>$Brand</td><td>$P_ID</td><td>$O_date</td><td style='color: red'><b>PANDING</b></td>
    </tr>";}

    if($Status==1){
      echo"<tr>
      <td>$O_Id</td><td>$Email</td><td>$Type</td><td>$Brand</td><td>$P_ID</td><td>$O_date</td><td style='color: green'><b>ON THE WAY</b></td>
      </tr>";}
  }
  echo "</table>";


?>





</section>

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
