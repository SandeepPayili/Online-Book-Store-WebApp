<?php require_once("loading.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
	<meta charset="utf-8">
	<meta name="author" content="SANDEEP PAYILI(B171452)">
	<meta name="description" content="Online Book Store Web Site">
	<meta name="keywords" content="HTML,CSS,Javascript,Online Book Store Web Site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="theme-color" content="#009879">
	<link rel="shortcut icon" href="assets/web_images/rgukt_icon.jpeg" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<style type="text/css">
		#grad {
   			background-image: linear-gradient(to bottom right, red, yellow);
		}
	</style>
</head>
<body class="container bg-light">
	<!-- Main Heading -->
			<div class="align-center sticky-top bg-full border border-success mx-auto" id="grad">
				<div class="container">
				<img src="assets/web_images/rgukt.png" alt="RGUKT LOGO"  height="70px" >
				<font class="title font-weight-bold">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES - BASAR
				</font>
				</div>
			</div> 
<?php
	require_once("connection.php");
	if(isset($_POST["registration_submit"])){
	    $name = $_POST["name"];
	    $email = $_POST["email"];
	    $password = $_POST["password"];
	    $password_encrypt = md5($password);
	    $phone_number = $_POST["PhoneNumber"];
	    $gender = $_POST["gender"];
	    $dob = $_POST["dob"];
	    $address = $_POST["address"];
	    $languages_array = implode(",", $_POST["languages"]);
	
		// Check if user details already exists...

		$query_name  = "SELECT * FROM `users` WHERE `Name`='$name' ";
		$query_email = "SELECT * FROM `users` WHERE `Email`='$email' ";

		$result_name = mysqli_query($conn,$query_name);
		$result_email = mysqli_query($conn,$query_email);


		if(mysqli_num_rows($result_name)>0 || mysqli_num_rows($result_email)>0){
?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
  				<strong>Hey User !</strong> Name or Email Address Already Exits!!.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
			</div>
<?php
		}else{  // Submitting data to database
			$query = "INSERT INTO `users` (`Name`, `Email`, `Password`, `PhoneNumber`, `Gender`, `DOB`, `Languages`, `Address`) VALUES ('$name', '$email', '$password_encrypt', '$phone_number', '$gender', '$dob', '$languages_array', '$address')";
			$result = mysqli_query($conn,$query);
			if($result){
				$query = "SELECT * FROM `users` WHERE `Email`='$email' AND `Password`='$password_encrypt' ";
				$result = mysqli_query($conn,$query);
				$user_array = mysqli_fetch_assoc($result);
				session_start();
				$_SESSION["userid"] = $user_array["ID"];
	 			header("Location:display_user_books.php");
			}else{
?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
  					<strong>Hey User !</strong> Error in inserting Data to Server!!.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
				</div>
<?php 
			}
		}
	}

?>




<?php 
	session_start();
	if(isset($_SESSION["userid"])){
		header("Location:display_user_books.php");
 } 
	else{
 ?>

	<h1 align="center">Registration!......</h1>
<form  action="registration.php" method="POST" enctype="multipart/form-data" >
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
		<input type="text" name="name" class="form-control" placeholder="Name" required id="name">
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">E-mail</label>
		<div class="col-sm-10">
		<input type="email" name="email" class="form-control" placeholder="user@gmail.com" required>
		</div>
	</div>
 
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
		<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		</div>
	</div>


	<div class="form-group row">
		<label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
		<div class="col-sm-10">
		<input type="number" name="PhoneNumber" id="phone" class="form-control" placeholder="0123456789" required>
		</div>
	</div>


  	<div class="form-group row">
	<label class="col-sm-2 col-form-label">Gender</label>  			
		<div class="col-sm-10">
		<input type="radio" name="gender" checked value="Male" required> Male
		<input type="radio" name="gender" value="Female" required> Female
		<input type="radio" name="gender" value="Others" required> Others
	</div>
  	</div>

  	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Date of Birth</label>
		<div class="col-sm-10">
			<input type="date" name="dob" required>
		</div>
	</div>

	<div class="form-group row">
		<label  class="col-sm-2 col-form-label"> Languages Known</label>
		<div class="col-sm-10">
		<input type="checkbox" name="languages[]" value="Telugu" checked> Telugu
		<input type="checkbox" name="languages[]" value="Hindi"> Hindi
		<input type="checkbox" name="languages[]" value="Tamil"> Tamil
		<input type="checkbox" name="languages[]" value="English"> English
		</div>
	</div>
		
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label"> Address </label>
		<div class="col-sm-10">
			<textarea placeholder="address here" rows="4" cols="45" name="address" required> </textarea>
		</div>
	</div>
		 
	<input type="submit" name="registration_submit" value="REGISTER" class="btn btn-primary">
	<input type="reset" name="" class="btn btn-primary">
</form>
<?php 
	}
 ?>
	<h1 class="text-center"><a href="index.php"  target="_self" >&larr;Go Home</a></h1>

<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
