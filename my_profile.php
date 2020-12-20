<?php require_once("loading.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
	<meta charset="utf-8">
	<meta name="author" content="SANDEEP PAYILI(B171452)">
	<meta name="description" content="Online Book Store Web Site">
	<meta name="keywords" content="HTML,CSS,Javascript,Online Book Store Web Site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="theme-color" content="#009879">
	<link rel="shortcut icon" href="assets/web_images/rgukt_icon.jpeg" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body class="container bg-light">

<?php 
	require_once("common_header.php");
?>

<h1 align="center">    User  Profile  </h1>
<form   method="POST" enctype="multipart/form-data" >
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
		<input type="text" name="name" class="form-control" placeholder="Name" required id="name" value="<?php echo $user_array['Name']; ?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">E-mail</label>
		<div class="col-sm-10">
		<input type="email" name="email" class="form-control" placeholder="user@gmail.com" required value="<?php echo $user_array['Email']; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
		<div class="col-sm-10">
		<input type="number" name="PhoneNumber" id="phone" class="form-control" placeholder="0123456789" required value="<?php echo $user_array['PhoneNumber']; ?>">
		</div>
	</div>


  	<div class="form-group row">
	<label class="col-sm-2 col-form-label">Gender</label>  			
		<div class="col-sm-10">
		<input type="radio" name="gender" checked value="Male" required <?php if($user_array['Gender'] == 'Male') {echo "checked";} ?> > Male
		<input type="radio" name="gender" value="Female" required <?php if($user_array['Gender'] == 'FeMale') {echo "checked";} ?> > Female
		<input type="radio" name="gender" value="Others" required <?php if($user_array['Gender'] == 'Others') {echo "checked";} ?> > Others
	</div>
  	</div>

  	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Date of Birth</label>
		<div class="col-sm-10">
			<input type="date" name="dob" required value="<?php echo $user_array["DOB"]; ?>">
		</div>
	</div>

	<?php 
		$languages_array = explode(",", $user_array['Languages']);
	 ?>

	<div class="form-group row">
		<label  class="col-sm-2 col-form-label"> Languages Known</label>
		<div class="col-sm-10">
		<input type="checkbox" name="languages[]" value="Telugu"
				<?php foreach ($languages_array as $key => $value) 
			 	if($value == "Telugu" ) echo "checked" ;  ?>            > Telugu
		<input type="checkbox" name="languages[]" value="Hindi" 
			 <?php foreach ($languages_array as $key => $value) 
				if($value == "Hindi" ) echo "checked" ;  ?>         	>Hindi
		<input type="checkbox" name="languages[]" value="Tamil"
			<?php foreach ($languages_array as $key => $value) 
				  if($value == "Tamil" ) echo "checked" ;  ?>          >Tamil
		<input type="checkbox" name="languages[]" value="English"
			<?php foreach ($languages_array as $key => $value) 
				  if($value == "English" ) echo "checked" ;  ?>        >English
		</div>
	</div>
		
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label"> Address </label>
		<div class="col-sm-10">
			<textarea placeholder="address here" rows="4" cols="45" name="address" required><?php echo $user_array["Address"];?></textarea>
		</div>
	</div>
</form>
	<h1 class="text-center"><a href="" class="home">&larr;Go Home</a></h1>
</body>
</html>