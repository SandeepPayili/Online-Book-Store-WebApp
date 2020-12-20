<?php require_once("loading.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!!</title>
	<meta charset="utf-8">
	<meta name="author" content="SANDEEP PAYILI(B171452)">
	<meta name="description" content="Online Book Store Web Site">
	<meta name="keywords" content="HTML,CSS,Javascript,Online Book Store Web Site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="theme-color" content="#009879">
	<link rel="icon" href="assets/web_images/rgukt_icon.jpeg" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<style type="text/css">
		#grad {
   			background-image: linear-gradient(to bottom right, red, yellow);
		}
	</style>
</head>
<body>


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
	if(!isset($_SESSION["userid"])){
		die(" <h1>Please Login to Continue........<h1>");
	}
	$userid = $_SESSION["userid"];
	$query = "SELECT * FROM `users` WHERE `ID`='$userid'";
	$result = mysqli_query($conn,$query);
	$user_array = mysqli_fetch_assoc($result);
?>
		<div class="container-fluid">
			<div class="navbar navbar-light bg-light sticky-top">
			<h1> Welcome!! <?php echo $user_array['Name']; ?> </h1>
		 		<div class="dropdown">
		 			<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuBotton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><?php echo $user_array['Email']; ?> </button>
		 		<div class="dropdown-menu" aria-labelledby="dropdownMenuBotton" >
						<a href="add_book.php" class="dropdown-item">Upload New book</a></li>
						<a href="my_profile.php" class="dropdown-item">My Profile</a></li>
						<a href="change_password.php" class="dropdown-item">Change Password</a></li>
						<a href="logout.php" class="dropdown-item">Log Out</a></li>
				</div>
			</div>
		</div>

<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
</body> 