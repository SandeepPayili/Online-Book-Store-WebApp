<?php require_once("loading.php"); ?>
<?php 
	require_once("connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta name="theme-color" content="#009879">
	<link rel="icon" href="assets/web_images/rgukt_icon.jpeg" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<style type="text/css">
		#grad {
   			background-image: linear-gradient(to bottom right, red, yellow);
		}
		.reset-form{
			margin-left: 37%;
			margin-top: 5%;
		}
	</style>
</head>
<body class="bg-light">

<div class="align-center sticky-top bg-full border border-success mx-auto" id="grad">
		<div class="container">
		<img src="assets/web_images/rgukt.png" alt="RGUKT LOGO"  height="70px" >
		<font class="title font-weight-bold">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES - BASAR
		</font>
		</div>
</div>


<?php 

	if(isset($_POST["submit_reset_password"])){
		$email = mysqli_real_escape_string($conn,$_POST["reset_email"]) ;
		$query = "SELECT * FROM `users` WHERE `Email`='$email'";
		$result = mysqli_query($conn,$query);
		$user_array = mysqli_fetch_assoc($result);
		$row = mysqli_num_rows($result);
		if($row >=1){
			$token = bin2hex(random_bytes(15));

			// mailing user token
			$to_email = $email;
			$subject = "Forgot Password Activation Link!";

			$body = "Hi, ".$email ;
			$body .= "                            

			";
			$body .= "To complete the reset password process, please open the following link:";
			$body .= " 		" ;
			$body .= "http://localhost/Book_Store_Project/reset_password.php?token=".$token;

			$headers = "From: RGUKT BOOK STORE";

			if (mail($to_email, $subject, $body, $headers)) {
?>
    			<div class="alert alert-success container" role="alert">
   				We sent an reset password link to your mail i.e., <?php echo $to_email ; ?>. Please Check your Inbox/spam folder to reset your password.
					</div>
<?php 
			
			// Inserting token in database
			$query = "UPDATE `users` SET `AuthToken`='$token' WHERE `Email`='$email' " ;
			$result = mysqli_query($conn,$query);

			} else {
?>    			
			    <div class="container">
			    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  			    <strong>OOPS !</strong> Email Sent Failed Please Try Again!
  			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		    <span aria-hidden="true">&times;</span>
  			    </button>
			    </div>
			    </div>			
<?php 	
			}
		}else{
?>
			<div class="container">
			<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  			<strong>Hey User !</strong> Email Address haven't Registered!
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>
			</div>
			</div>
<?php 
		}
	}
?>

<form action="forgot_password.php" method="POST">	
<div class="container card" style="width: 18rem;margin-top: 2rem;">
  <div class="card-body">
    <h5 class="card-title">Reset Password</h5>
    <input type="email" name="reset_email" placeholder="Enter Your Email" style="width: 100%;">
    <p>	</p>
    <input type="submit" name="submit_reset_password" value="Send Mail" class="btn btn-info">
  </div>
</div>
</form>



<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html> 