<?php require_once("loading.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="icon" href="assets/web_images/rgukt_icon.jpeg" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<style type="text/css">
		#grad {
   			background-image: linear-gradient(to bottom right, red, yellow);
		}
		input[type=password]{
			width:40%;
		}
		form{
			margin-left: 30%;
			margin-top: 7%;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body class="bg-light">


	<!-- Main Heading -->
			<div class="align-center bg-full border border-success mx-auto" id="grad">
				<div class="container">
				<img src="assets/web_images/rgukt.png" alt="RGUKT LOGO"  height="70px" >
				<font class="title font-weight-bold">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES - BASAR
				</font>
				</div>
			</div>


<?php 

	require_once("connection.php");

	session_start();

	if(isset($_GET["token"])){



			if(isset($_GET["confirm_password"])){

?>

			 <div class="container">
		    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  		    	<strong>Hey User !</strong> Passwords doesn't match!!.
  		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	    	<span aria-hidden="true">&times;</span>
  		    	</button>
		    </div>
		    </div>			
<?php 
			}

		$token = mysqli_real_escape_string($conn,$_GET["token"]);
		$_SESSION["token"] = $token;
		$query = "SELECT * FROM `users` WHERE `AuthToken`='$token' ";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>=1){
			$user_array = mysqli_fetch_array($result);

			if($user_array['AuthToken']=='NULL'){
?>	
				<div class="alert alert-success container" role="alert">You have already used this token. Try another!.
   					<a href="forgot_password.php">Click Here</a>
				</div>		
<?php
			}else{
					display_reset_board(); 
			}
		}else{
?>

			<div class="alert alert-success container" role="alert">Invalid Token! Try Another One.
   					<a href="forgot_password.php">Click Here</a>
			</div>		

<?php			
		}
	}else if (isset($_POST["submit_update_password"])) {


		$password = mysqli_real_escape_string($conn,$_POST["password"]);
		$confirm_password  =  mysqli_real_escape_string($conn,$_POST["confirm_password"]);

		if($password!=$confirm_password){

			header("Location: reset_password.php?token=".$_SESSION['token']."&confirm_password=0");

		}else{
			
			$token = $_SESSION["token"];
			$query = "SELECT * FROM `users` WHERE `AuthToken`='$token' ";
			$result = mysqli_query($conn,$query);
			$user_array = mysqli_fetch_array($result);

			$enc_password = md5($password);

			$query = "UPDATE `users` SET `Password`='$enc_password' ,  `AuthToken`='NULL'   WHERE `AuthToken`='$token' ";

			$result = mysqli_query($conn,$query);

			if($result){
				unset($_SESSION["token"]);
?>
				<div class="alert alert-success container" role="alert">
   					Reset Password Successful! Login Here
   					<a href="login.php">Click Here</a>			
				</div>

<?php
			}else{      
?>
				<div class="alert alert-success container" role="alert">
   					Opps! Something went wrong password haven't Updated!
				</div>
<?php 
			}

		}
	}else{
		echo "Invalid Entry";
	}
 
 ?>



<?php 

	function display_reset_board(){ 
?>
<!--  for checking both passwords fields are same or not and updating password in database -->
<form action="reset_password.php" method="POST" >
                   <h2>Reset Password</h2>
                   <div class="form-group">
                     <label for="exampleInputPassword1">New Password</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                   </div>
                 
                   <div class="form-group">
                     <label for="exampleInputPassword1">Confirm Password</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password">
                   </div>
                   
                 	<input type="submit" name="submit_update_password" value="Submit" class="btn btn-primary">
                 
</form>
<?php 
			}

 ?>




<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</body>
</html>