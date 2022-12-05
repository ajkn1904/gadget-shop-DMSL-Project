<!DOCTYPE html>
<html lang="en"> 
<head> <ul>  
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form </title> 
	<link rel="stylesheet" href="signup_style.css"> 
</head>  
<body> 
<section class="header">
<div class="glogo">
<p align="center"><img src="gadlogo.jpg" width="80" height="80"></p>
 
  <h1 align="center">GadGetZ</h1>
  
<form class="container" action="project_signup.php" method="post" enctype="multipart/form-data">  
  
<label> <b> User Name :</b></label>         
<input type="text" placeholder=" User Name " name="name" required> <br>

<label><b>Phone Number :</b></label>     
<input type="text" placeholder=" Enter Your No.	+880" name="phone" required> <br> 
<label> <b>Email :</b> </label> 
<input type="email" placeholder=" xyz@gmail.com " id="email" name="email"/> <br>    
<label> <b>Password :</b> </label> 
<input type="Password" id="pass" name="pass"> 
<input type="checkbox" >Show Password<br><br>
<label><b>Re-type password :</b>  </label>
<input type="Password" id="repass" name="repass"><br>
<br>
<label type="select_btn"> <b>Select Location :</b> </label>   
<select id="location" name="loc">  
<option>SELECT</option>  
<option>DHK</option>  
<option>CTG</option>  
<option>SYL</option>  
</select>  
  <br> <br>
<label><b>Image</b> </label>
<input type="file" value="Choose Photo" name="img" id="myBtn"/><br>
<br>
 <label><b>Gender :</b></label>
<input type="radio" name="gen" value="male"> Male  
<input type="radio" name="gen" value="female"> Female  
  <br>
  <p align="center">
<input type="submit" class="btn" value="Submit" name="submit">
<input type="submit" class="btn" value="Cancel" name="cancel">

</p>

<p align="center"> Thank You! </p>
	</div></section>
</form> </ul>
<hr><ul>
<a href="home_page.php" class="btn"><b>HOME</b></a>
</ul>
</body>  
</html>

<?php 
include("connection.php");
if(isset($_POST['submit']))
{
$Name=$_POST['name'];
$Mobile=$_POST['phone'];
$Email=$_POST['email'];
$Password=$_POST['pass'];
$Re_password=$_POST['repass'];
$Location=$_POST['loc'];
$Gender=$_POST['gen'];

//customer id
$num=rand(10,1000);
//echo $num;
$Cus_id="C-".$num;

//image upload
$ext=explode(".",$_FILES['img']['name']);
$C=count($ext);
$ext=$ext[$C-1];
//echo $ext;
$date=date("D:M:Y");
$time=date("h:i:s");
//echo $date.$time.$Cus_id;
$image_name=md5($date.$time.$Cus_id);
$Image=$image_name.".".$ext;
echo $Image;
$query="insert into customer values('$Name',$Mobile,'$Location','$Gender','$Image','$Cus_id','$Email','$Password','$Re_password')";
if(mysqli_query($con,$query))
{
  echo "Successfully Inserted!";
  if($Image !=null)
  {
    move_uploaded_file($_FILES['img']['tmp_name'],"Uploadedimage/$Image");
  }
}
else{
  echo "Error!".mysqli_error($con);
}
header("Location:project_signup.php");
}
?>