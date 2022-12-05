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
  <li><a href="adm_changepass.php">EDIT PASS</a></li>
  <li><a href="?sign=out">SIGN OUT</a></li>
  </ul>
  </div>
</nav>

<h1 align="center"> Welcome to the GadGetZ Admin Panel</h1>

</section>

<div class="date">

<h5><?php echo date('D M Y');?></h5>
   
</div>

<section class="update">
<div class="showtable">
<br>
<h1>  Showing the summery of work  details here.  </h1><br>
<div class="row">

<form class="fcontainer" action="adm_home.php" method="post">
<p align="center">
<span> <input type="submit" value="Show Product" name="show_p" class="showbtn" ></span>
</p>
</form>

<?php
include("connection.php");
if(isset($_POST['show_p'])){
  $sqlt="select * from products,currnt where products.P_ID=currnt.P_ID ";
  $rt=mysqli_query($con,$sqlt);
  echo"<table id='customers' class='customers'>";
  echo "<tr>
  <th>Proudct ID</th>
  <th>Proudct Type</th>
  <th>Brand</th>
  <th>Buying Price</th>
  
  <th>Quantity</th>
  <th>Selling Price</th>
  </tr>";
  while($row=mysqli_fetch_array($rt)){
    $P_ID=$row['P_ID'];
    $Type=$row['Type'];
    $Brand=$row['Brand'];
    $Price=$row['Price'];
    
    $qntty=$row['Quantity'];
    $sprice=$row['SPrice'];

  echo"<tr><td>$P_ID</td><td>$Type</td><td>$Brand</td><td>$Price</td><td>$qntty</td><td>$sprice</td></tr>";
  }
  echo "</table>";
}
?>
</div>
<br><br>

</div>


<section class="container" style="background-color:rosybrown ">
<div class="frm">
<section class="form">
  <form class="fcontainer"  action="adm_home.php" method="post" >
      <div class="row">
      <br>
<h2 align="center" >Info</h2>
<br>
<label for="P_ID"><b>Product ID</b></label><br>
<select name="P_ID">
    <?php
    include("connection.php");
    $sqlt="select P_ID from products";
    $rt=mysqli_query($con,$sqlt);
    while($row=mysqli_fetch_array($rt)){
        $P_ID=$row['P_ID'];
        echo "<option value='$P_ID'>$P_ID</option>";
    }
    ?>
</select><br><br>
  </div>



<label for="Quantity"><b>Quantity</b></label>
<input type="text" id="Quantity" name="Quantity" value='0' placeholder="Quantity" required><br><br>

<label for="SPrice"><b>Selling Price</b></label>
<input type="text" id="SPrice" name="SPrice" value='0' placeholder="Selling Price" required><br><br><br>

 <p align="center">
     <input type="submit" class="btn" value="Add" name="submit">
      <input type="submit" class="btn" value="Update info" name="updtinfo">
  </p>
  <br><br>
   
  </form>
</section>
</div>

  <?php
include("connection.php");
if(isset($_POST['submit'])){
    $P_ID=$_POST['P_ID'];
    $SPrice=$_POST['SPrice'];
    $Quantity=$_POST['Quantity'];
    
$sqlup="insert into currnt values('$P_ID',$SPrice,$Quantity)";
if(mysqli_query($con,$sqlup))
{
    echo "Successfully Inserted!";
}
else
{
echo "Error!".mysqli_error($con);
}
}
if(isset($_POST['updtinfo'])){
    $P_ID=$_POST['P_ID'];
    $SPrice=$_POST['SPrice'];
    $Quantity=$_POST['Quantity'];

if($SPrice==0)
{
    $sqlup="update currnt set Quantity=Quantity+$Quantity where P_ID='$P_ID'";
}
else
{
    $sqlup="update currnt set SPrice=$SPrice,Quantity=Quantity+$Quantity where P_ID='$P_ID'";
}

if(mysqli_query($con,$sqlup))
{
    echo "Successfully Updated!";
}
else
{
echo "Error!".mysqli_error($con);
}
}
?>

</section><br>
</section>

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