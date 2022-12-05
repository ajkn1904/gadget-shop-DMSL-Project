<?php
session_start();
//cart implementation
if(isset($_POST['addcart'])){
  if(isset($_POST['cart'])){
    $item_array_id=array_column($_SESSION['cart'],'item_id');
    if(!in_array($_GET['id'],$item_array_id)){
$count=count($_SESSION['cart']);
$item_array=array(
'item_id'=>$_GET['id'],
'item_brand'=>$_POST['brand'],
'item_price'=>$_POST['hprice'],
'item_q'=>$_POST['qntty'],
);
$_SESSION['cart'][$count]=$item_array;
    }
    else{
      echo "<script>alert('Item already added')</script>";
      echo "<script>window.location='cus_lptp.php'</script>";
    }
  }
  else{
    $item_array=array(
      'item_id'=>$_GET['id'],
      'item_brand'=>$_POST['brand'],
      'item_price'=>$_POST['hprice'],
      'item_q'=>$_POST['qntty'],
      );
      $_SESSION['cart'][0]=$item_array;
  }
}
//item remove from cart
if(isset($_GET['action'])and $_GET['action'] == 'delete')
{
  foreach ($_SESSION['cart'] as $keys => $values)
  {
    if($values['item_id']==$_GET['id']){
      unset($_SESSion['cart'][$keys]);
    }
  }
}

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
  <li><a href="pndng.php">PANDING</a></li>
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



<section class="container">
<h1 align="center">Order Here</h1>
<div class="frm">
<section class="form">

<form class="fcontainer"  action="cus_lptp.php" method="post">
<div class="card">

<label for="Type"><b>Select Product Type</b></label><br>
  <select name="Type">
    <?php
    include("connection.php");
    $sqlb="select distinct Type from products";
   
    $rb=mysqli_query($con,$sqlb);
    while($card=mysqli_fetch_array($rb)){
      $Type=$card['Type'];
      echo "<option value='$Type'>$Type</option>";
    }
    
    ?>
  </select><br><br>


  <label for="Brand"><b>Select Brand</b></label><br>
  <select name="Brand">
    <?php
    include("connection.php");
    $sqlb="select Brand from products";
   
    $rb=mysqli_query($con,$sqlb);
    while($card=mysqli_fetch_array($rb)){
      $Brand=$card['Brand'];
      echo "<option value='$Brand'>$Brand</option>";
    }
    
    ?>
  </select><br><br>

 
  <div class="fcontainer" align="center">
  <input type="submit" value="Go" name="go">
  </div>

  </div>
</form>
</section>
</div>
</section>



  <div>
    <?php
    include("connection.php");
    if(isset($_POST['go'])){
      $c=$_POST['Brand'];
      $qury="select * from products,currnt where products.P_ID=currnt.P_ID and  products.Brand='$c'";
      $r=mysqli_query($con,$qury);
      echo"<table id='customers' class='customers'>";
      echo "<tr>
  <th>Proudct Type</th>
  <th>Product ID</th>
  <th>Brand</th>
  <th>Price</th>
  <th>Add Quantity</th>
  <th>Image</th>
  <th>Action</th>
  </tr>";
  while($container=mysqli_fetch_array($r)){
    $id=$container['P_ID'];
    $type=$container['Type'];
    $brand=$container['Brand'];
    $sprice=$container['SPrice'];
    $qntty=$container['Quantity'];
    $image=$container['Image'];
   echo"
   <h3 align='center'>Details</h3>
   <form class='fcontainer' action='cus_lptp.php?action=add&id=$id' method='post'>";
  echo"<tr><td>$type</td><td>$id</td><td>$brand</td><td>$sprice</td>
  <td>
  <input type='text' name='qntty' value='1' style='background: lightblue'>
  <input type='hidden' name='brand' value='$brand'>
  <input type='hidden' name='hprice' value='$sprice'>
  </td>
  <td><img src='Admin/$image' height='70px' width='70px'></td>
  <td>
  <section class='showbtn'>
  <input type='submit' name='add'  value='Add to Cart'></td>
  </section>
  </tr>";
  echo"</form>";
  }
  echo"</table>";
    }
    ?>
  </div>        

  <?php 
  
  if(isset($_POST['add']))
  {
    include("connection.php");

    //order id
  $num=rand(10,1000);
  $O_Id="O-".$num;

$O_date=date("Y:M:d");
$Email=$_SESSION['email'];
$Brand=$_POST['brand'];
$Quantity=$_POST['qntty'];
$sqlordr="insert into cusorderdetails values('$O_Id','$Email','$O_date',0)";
mysqli_query($con,$sqlordr);
//echo $sqlordr;
$qury="select P_ID from products where Brand ='$Brand' ";
//echo $qury;
$r=mysqli_query($con,$qury);
$container=mysqli_fetch_assoc($r);
  $P_ID=$container['P_ID'];
 // echo"   P_ID:=$P_ID";
  
$qury1="select SPrice from currnt where P_ID='$P_ID'";
//echo $qury1;

$r1=mysqli_query($con,$qury1);
$container1=mysqli_fetch_assoc($r1);
  $SPrice=$container1['SPrice'];
  $TotalP=$Quantity*$SPrice;
  
  
  //echo "   SPrice:=$SPrice";
  //echo $TotalP;

  $query="insert into ordertrack values('$O_Id', '$P_ID', '$Quantity', '$SPrice', '$TotalP')";
  //echo $query;
  mysqli_query($con,$query);
    echo "Successfully Ordered!";
  }
  ?>

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


