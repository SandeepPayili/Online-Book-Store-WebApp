<?php require_once("loading.php"); ?>

<!DOCTYPE html>
<html id="index">
<head>
	<title>Book Store</title>
	<meta charset="utf-8">
	<meta name="author" content="SANDEEP PAYILI(B171452)">
	<meta name="description" content="Online Book Store Web Site">
	<meta name="keywords" content="HTML,CSS,Javascript,Online Book Store Web Site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="refresh" content="1000">
	<meta name="theme-color" content="#009879">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<link rel="shortcut icon" href="assets/web_images/rgukt_icon.jpeg"  type="image/x-icon">
	<style type="text/css">
		#grad {
   			background-image: linear-gradient(to bottom right, red, yellow);
		}
		a ,.btn,.navbar-text{
			color: white !important;
		}
		.mynav{
			background-image: linear-gradient(to bottom, rgba(0,10,100,0.1), rgba(0,200,100,1));	
		}
		.dropdown-item{
			color: black !important;	
		}
		.margintoleft{
			margin-left: 20%;
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

<div class="container">
	

<nav class="navbar navbar-expand-lg navbar-light bg-primary mynav">
  <a class="navbar-brand font-weight-bold" href="index.php">  <img src="assets/web_images/rgukt_icon.jpeg" height="30px" style="border-radius: 100%;">  <I>RGUKT BOOK STORE</I></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse margintoleft" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<?php 
      session_start();
      if(isset($_SESSION["userid"])){
 ?>          
           <li class="nav-item "><a class="nav-link" href="logout.php">Logout</a></li>
           <li class="nav-item"><a class="nav-link" href="display_user_books.php">My Account</a></li>
<?php 
        }else{
?>
           <li class="nav-item "><a class="nav-link" href="login.php">Login</a></li>
           <li class="nav-item"><a class="nav-link" href="registration.php">Sign Up</a></li>
<?php
        }
 ?> 
         
      <li class="nav-item">
        <a class="nav-link" href="catalogue.php">Catalogue</a>
      </li>
    </ul>

    <ul class="navbar-nav">
      		 <li class="nav-item">
     			<div class="dropdown">
					<button class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</button>
  					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    					<a class="dropdown-item" href="b_tech.php">B.Tech</a>
    					<a class="dropdown-item" href="aptitude.php">Aptitude</a>
    					<a class="dropdown-item" href="great_personalities.php">Great Personalities</a>
    					<a class="dropdown-item" href="gk.php">General Knowledge</a>
    					<a class="dropdown-item" href="human_values.php">Human Values</a>
	  				</div>
				</div>
  			 </li>
    </ul>

  </div>
</nav>


<p></p>


	<div class="jumbotron">
  		<h1 class="display-4">Welcome to Online Book Store!</h1>
  		<p class="lead">Here you can read all available books.</p>
  	 
 <?php  
 		if(isset($_SESSION["userid"])){
 ?>
 				You Can View Your Uploads.
      			<a class="btn btn-primary btn-lg" href="display_user_books.php" role="button">My Account</a>
<?php   }
		else{
?>
				You Can Upload books by Signing Up.
				<a class="btn btn-primary btn-lg" href="registration.php" role="button">Sign Up</a>	  	<?php
		}
?>
      <hr class="my-4">
  		
  		<h1>Learning is Essential in this Unforgiving times.</h1>
	</div>


</div>	

	<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
 
</body>
</html>