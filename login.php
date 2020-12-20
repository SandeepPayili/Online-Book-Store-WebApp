<?php require_once("loading.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="author" content="SANDEEP PAYILI(B171452)">
	<meta name="description" content="Online Book Store Web Site">
	<meta name="keywords" content="HTML,CSS,Javascript,Online Book Store Web Site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="theme-color" content="#009879">
	<link rel="icon" href="assets/web_images/favicon.ico" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<style type="text/css">
		#grad {
   			background-image: linear-gradient(to bottom right, red, yellow);
		}
	</style>
</head>
<body class="bg-light">
	<!-- Main Heading -->
			<div class="align-center sticky-top bg-full border border-success mx-auto" id="grad">
				<div class="container">
				<img src="assets/web_images/rgukt.png" alt="RGUKT LOGO"  height="70px" >
				<font class="title font-weight-bold">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES - BASAR
				</font>
				</div>
			</div>
		<div class="container align-center">
			<img src="assets/web_images/rgukt.png" alt="RGUKT LOGO" class="justify-content-center">
			<font style="size:40%">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES - BASAR</font>
		</div>
<?php 
	require_once("connection.php");
	// Checking whether entered this page from login form only
	if(isset($_POST['submit'])){
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password = md5($password);

		$query = "SELECT * FROM `users` WHERE `Email`='$email' AND `Password`='$password' ";
		$result = mysqli_query($conn,$query);
		// Checking For Failure Login
		if(  mysqli_num_rows($result)<=0){			
?>		
		<div class="container">
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
  			<strong>Hey User !</strong> Email Address or Password invalid!!.
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>
		</div>
		</div>

<?php 
 		}else{
 			$user_array = mysqli_fetch_assoc($result);
 			session_start();
 			$_SESSION["userid"] = $user_array['ID'];
 			header("Location: display_user_books.php");
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
	<div class="container">
	<form  action="login.php" method="POST" >
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  			</div>

  			<div class="form-group">
    		<label for="exampleInputPassword1">Password</label>
    		<input type="password" name="password" required class="form-control" id="password">
  			</div>

			<div class="form-group form-check">
    		<input type="checkbox" class="form-check-input" id="checkbox">
    		<label class="form-check-label" for="exampleCheck1">Show Password</label>
  			</div>

			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			<input type="reset" name="" class="btn btn-primary">
			<p></p>
			<ul class="list-group list-group-horizontal">
				<li class="list-group-item"><a href="forgot_password.php">Forgot Password</a></li>

				<li class="list-group-item"><a href="index.php" class="home"> &larr; Go Home</a></li>
			</ul>
	</form>
	</div>
<?php 
	}
 ?>
	<script type="text/javascript">
		var checkbox = document.getElementById("checkbox");
		var password = document.getElementById("password");
		checkbox.addEventListener("click",function(){
			if(password.type == "password"){
				password.type = "text"; 
			}else{
				password.type = "password";
			}
		});
	</script>



<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>