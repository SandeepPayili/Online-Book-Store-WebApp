<?php require_once("loading.php"); ?>
<?php 

	require_once("connection.php");

 ?>


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

<?php 

	require_once("common_header.php");

	$userid = $_SESSION["userid"];

	if(isset($_POST["submit_change_password"])){
		
		$new_password = $_POST["new_password"];
		$new_confirm_password = $_POST["new_confirm_password"];

		if($new_password != $new_confirm_password){
?>
			<div class="container">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
  				<strong>Hey User !</strong> Passwords aren't match.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>
			</div>
<?php 
		}else{
			$password = md5($new_password);
			$query = "UPDATE `users` SET `Password` = '$password' WHERE `ID`= '$userid' ";
			$result = mysqli_query($conn,$query);

			$_SESSION["change_password"] = "1";

			header("Location: display_user_books.php");

		}

	}

 ?>



<!-- form card change password -->
			<p></p>
			<div class="container">
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 align-center">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" method="POST">
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" class="form-control" id="inputPasswordNew" required="" name="new_password">
                                    <span class="form-text small text-muted"> The password must be 8-20 characters, and must <em>not</em> contain spaces. </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="" name="new_confirm_password">
                                    <span class="form-text small text-muted"> To confirm, type the new password again. </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right" name="submit_change_password">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
<!-- /form card change password -->

<h1 class="text-center"><a href="index.php"  target="_self" >&larr;Go Home</a></h1>


</body>
</html>