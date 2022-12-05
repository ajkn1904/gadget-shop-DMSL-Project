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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    
    <link rel="stylesheet" href="adm_style.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="form_styl.css">

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
  <li><a href="product.php">ADD-PRODUCT</a></li>
  
  <li><a href="adm_home.php">A.HOME</a></li>
  <li><a href="adm_changepass.php">EDIT PASS</a></li>
  <li><a href="?sign=out">SIGN OUT</a></li>
  </ul>
  </div>
</nav>
</section>
<hr>
<div class="date">

<h5><?php echo date('D M Y');?></h5>
   
</div>

<div>
<br>
</div>


<section>
<div style="background-color:blanchedalmond">
<section name="container">

      <div class="row">
      <h2 align="center" >Customer's Orders</h2>
<?php
include("connection.php");

  $sql="select * from cusorderdetails where Status=0 ";
  $r=mysqli_query($con,$sql);

  echo"<table id='customers' class='customers'>";
  echo "<tr>
  <th>Order ID</th>
  <th>Email</th>
  <th>Order Date</th>
  <th>Action</th>
  </tr>";

  while($row=mysqli_fetch_array($r)){
    $O_Id=$row['O_Id'];
    $Email=$row['Email'];
    $O_date=$row['O_date'];
    
    echo"<tr>
    <td>$O_Id</td><td>$Email</td><td>$O_date</td><td><a href='aprvOrdr.php?action=show&O_Id=$O_Id'><b>Show Details</b></a></td>
    </tr>";
  }
  echo "</table>";
?>
</div>


<div class="fcontainer">
<div class="row">
<?php
include("connection.php");
echo "<hr/>";

if(isset($_GET['action']) and $_GET['action'] == 'show')
{
  echo "<h2 align='center'>Order Details</h2>";
  $O_Id=$_GET['O_Id'];
  $_SESSION['O_Id']=$O_Id;
  $sql="select * from ordertrack where O_Id='$O_Id'";
//echo $sql;
  $r=mysqli_query($con,$sql);

  $sql3="select Email from cusorderdetails,ordertrack where ordertrack.O_Id=cusorderdetails.O_Id ";
  $r3=mysqli_query($con,$sql3);


  echo"<table id='customers' class='customers'>";
  echo "<tr>
  <th>Order ID</th>
  <th>Email</th>
  <th>Proudct ID</th>
  <th>Quantity</th>
  <th>Total Price</th>
  </tr>";
 
  $gtotal=0;
  
  while ($row=mysqli_fetch_array($r)){
    $O_Id=$row['O_Id'];
    while ($row1=mysqli_fetch_array($r3)){
    $Email=$row1['Email'];
  }
    $P_ID=$row['P_ID'];
    $Quantity=$row['Quantity'];
    $TotalP=$row['TotalP'];


    echo"<tr>
    <td>$O_Id</td><td>$Email</td><td>$P_ID</td><td>$Quantity</td><td>$TotalP</td>
    </tr>";
  $gtotal=$gtotal+$TotalP;
//echo $gtotal;
  }
  //echo "</table>";

  echo "<tr><td colspan='4' align='right'><b>Grand Total</b></td><td>$gtotal</td></tr>";

  echo "</table>";
}

?>


<form  action='aprvOrdr.php' method='post'>
  <div class="row"><p align="center">
    <input type="submit" value="Confirm Order" name="cnfrmordr">
    </p></div>
</form>


<?php
  include("connection.php");
  if(isset($_POST['cnfrmordr'])){
    $O_Id=$_SESSION['O_Id'];
    $sql="select * from ordertrack where O_Id='$O_Id'";
    $r=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($r)){
      $P_ID=$row['P_ID'];
      $Quantity=$row['Quantity'];
      $sqlupdt="update currnt set Quantity=Quantity-$Quantity
      where P_ID='$P_ID'";
      mysqli_query($con,$sqlupdt);
    }
    $sqlordrupdt="update cusorderdetails set Status=1 where O_Id='$O_Id'";
    mysqli_query($con,$sqlordrupdt);
    header("Location:aprvOrdr.php");
  }

?>
</div>
</div>


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

