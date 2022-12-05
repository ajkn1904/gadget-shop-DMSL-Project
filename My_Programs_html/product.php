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
  <li><a href="aprvOrdr.php">APPROVE</a></li>
  
  <li><a href="adm_home.php">A.HOME</a></li>
  <li><a href="adm_changepass.php">EDIT PASS</a></li>
  <li><a href="?sign=out">SIGN OUT</a></li>
  </ul>
  </div>
</nav>
</section>
<div class="date">

<h5><?php echo date('D M Y');?></h5>
   
</div>

</div>
<div>
<br>
</div>

<section class="container">

<h3 align="center">ADD NEW PRODUCT</h3>
<div class="frm">



<section class="form">

  



  <form class="fcontainer" action="product.php" method="post">  
    
  <label> <b> Type :</b></label>         
  <input type="text" placeholder=" Product Type " name="typ" required> <br>
  
  <label><b>Product Brand :</b></label>     
  <input type="text" placeholder="Product Brand " name="brand" required> <br> 
  
   
    <p align="center">
  <input type="submit" class="btn" value="Add" name="submit">
  </p>

  </form> </ul>
  
  </section>
  

  <?php 
  include("connection.php");
  if(isset($_POST['submit']))
  {
  $Type=$_POST['typ'];
  $Brand=$_POST['brand'];


  $query="insert into newproducts values('$Type','$Brand')";
  
  //echo $query;
  if(mysqli_query($con,$query))
  {
    echo "Successfully Inserted!";
   // header("Location:product.php");
  }
  else{
    echo "Error!".mysqli_error($con);
    //header("Location:product.php");
  }

 
}

?>
</div>







  <h3 align="center">ADD NEW PRODUCT's DETAIL</h3>

<div class="frm">
<section class="form">
  <form class="fcontainer"  action="product.php" method="post" enctype="multipart/form-data">
    <div class="row">

<label for="Type"><b>Product Type</b></label><br>
<select name="Type">
    <?php
    include("connection.php");
    $sqlt="select distinct Type from newproducts";
    $rt=mysqli_query($con,$sqlt);
    while($row=mysqli_fetch_array($rt)){
      $Type=$row['Type'];
      echo "<option value='$Type'>$Type</option>";
    }
    ?>
</select><br><br>
<label for="Brand"><b>Product Brand</b></label><br>
<select name="Brand">
    <?php
    include("connection.php");
    $sqlt1="select Brand from newproducts";
    $rt1=mysqli_query($con,$sqlt1);
    while($row=mysqli_fetch_array($rt1)){
      $Brand=$row['Brand'];
      echo "<option value='$Brand'>$Brand</option>";
    }
    ?>
</select><br><br>
  
    </div>
  <label> <b>Buying Price:</b> </label> 
  <input type="text" placeholder="Price" id="price" name="price"/> <br>   
  <br>
  
  <label><b>Image</b> </label>
  <input type="file" value="Choose Photo" name="pic" id="myBtn"/><br>
  <br>
 
 <p align="center">
    <input type="submit" class="btn" value="Add" name="submit1">
  </p>
  <br><br>
 
   
  </form>
</section>
  
</div>
  
  <?php 
  include("connection.php");
  if(isset($_POST['submit1']))
  {
    $Type=$_POST['Type'];
    $Brand=$_POST['Brand'];
    $Price=$_POST['price'];
  
  //product id
  $num=rand(10,1000);

  $P_ID="P-".$num;
  
  //image upload
  $ext=explode(".",$_FILES['pic']['name']);
  $P=count($ext);
  //echo $P;
  $ext=$ext[$P-1];
  echo $ext;
  $date=date("D:M:Y");
  $time=date("h:i:s");
 echo $date.$time.$P_ID;
  $image_name=md5($date.$time.$P_ID);
  $Image=$image_name.".".$ext;
  echo $Image;
  $query1="insert into products values('$P_ID','$Type','$Brand',$Price,'$Image')";
  echo $query1;
  if(mysqli_query($con,$query1))
  {
    echo "Successfully Inserted!";
    if($Image !=null)
    {
      move_uploaded_file($_FILES['pic']['tmp_name'],"Admin/$Image");
    }
  }
  else{
    echo "Error!".mysqli_error($con);
  }
  header("Location:product.php");
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

