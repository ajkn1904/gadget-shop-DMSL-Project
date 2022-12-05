<!DOCTYPE html>
<Html>  
<head> 
<title>Registration Form 
</title>  
</head>  
<body> 
<p align="center"><img src="ULogo.png" width="140" height="100"></p>
  <h1 align="center">Premier University Chittagong</h1> 
  <h2 align="center">Registration</h2>  
<div>
<form>  <ul>  
  
<label> <b>Student's Name :</b></label>         
<input type="text" placeholder=" Student's Name " required size="20"/> <br> <br>  
<label> <b>Father's Name :</b> </label>     
<input type="text" placeholder=" Father's Name " required size="20"/> <br> <br>  
<label> <b>Mother's Name :</b> </label>         
<input type="text" placeholder=" Mother's Name " required size="20"/><br> <br> 
<label> <b>Blood Group :</b> </label>
<input type="text" placeholder=" Group" required size="5"/> <br> <br> 
<label> <b>Religion :</b> </label> 
<input type="text" placeholder=" Religion" required size="15"/> <br> <br>
<label> <b>Nationality :</b> </label> 
<input type="text" placeholder=" Country" required size="15"/> <br><br>
</div>
 <label> <b>Address :</b> </label> 
<textarea cols="50" rows="3" value="address">  
</textarea>  
<br> <br>

<label><b>Gender :</b></label><div>  
<input type="radio"/> Male  
<input type="radio"/> Female 
<input type="radio"/> Other   
  <br><br>
  
<label><b>Phone :</b></label>  
<input type="text" name="country code"  value="+880" size="3"/>   
<input type="text" placeholder=" Enter Your No." name="phone" required size="10"/> <br> <br>  

 <div> 
</label> 
<label> <b>Email :</b> </label> 
<input type="email" placeholder=" xyz@gmail.com " id="email" name="email"/> <br> <br>   
<label> <b>Password :</b> </label> 
<input type="Password" placeholder=" ........" id="pass" name="pass"> 
<input type="checkbox" >Show Password<br><br>
<label><b>Re-type password :</b>  </label>
<input type="Password" placeholder=" ........" id="repass" name="repass">
<input type="checkbox" >Show Password<br><br>
<br>
<label><b>Upload Image</b> </label>
<input type="file" value="Choose Photo" id="myBtn"/><br><br>

<div>
<label> <b>Select Course :</b> </label>   
<select>  
<option>Course</option>  
<option>CSE</option>  
<option>EEE</option>  
<option>ME</option>   
</select>  
  </div><br> 
  
  <p align="center">
<input type="button" value="Submit"/> 
<input type="button" value="Cancel"/> 
</p>

<p align="center"> Thank You! </p>
	
</form> </ul>
<hr><ul>
<footer><a href="login.php"><b>Home</b></a></footer></ul>
</body>  
</html>  