<?php require_once("loading.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Book !!</title>
	<meta charset="utf-8">
	<meta name="author" content="SANDEEP PAYILI(B171452)">
	<meta name="description" content="Online Book Store Web Site">
	<meta name="keywords" content="HTML,CSS,Javascript,Online Book Store Web Site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="theme-color" content="#009879">
	<link rel="icon" href="assets/web_images/rgukt_icon.jpeg" >
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body class="container">
<?php 

	require_once("common_header.php");

	if(isset($_POST["submitting_book"])){
		$uploaded_by = $user_array['Name'];
		$author = $_POST["author"];
		$publishers = $_POST["publishers"];
		$price = $_POST["price"];
		$category = $_POST["category"];
		$cover_photo_file_name = $_FILES["cover_photo"]["name"];
		$cover_photo_tmp_path = $_FILES["cover_photo"]["tmp_name"];
		$ebook_file_name = $_FILES["ebook"]["name"];
		$ebook_tmp_path = $_FILES["ebook"]["tmp_name"];
		$cover_photo_target_path = "assets/books/$cover_photo_file_name";
		$ebook_target_path = "assets/books/$ebook_file_name";
		if(move_uploaded_file($cover_photo_tmp_path,$cover_photo_target_path) && move_uploaded_file($ebook_tmp_path,$ebook_target_path)){
			$query = "INSERT INTO `books` (`CoverPhoto`,`Author`,`Publishers`,`Category`,`Price`,`UploadedBy`,`eBookPath`) VALUES ('$cover_photo_target_path','$author','$publishers','$category','$price','$uploaded_by','$ebook_target_path')";
			$result = mysqli_query($conn,$query);
			if($result){
?>
			<table border="2" align="center" class="table table-hover"> 
				<tr><th colspan="5" class="text-center">Uploaded Book</th></tr>
				<tr><th>Cover Photo</th><th>Author</th><th>Publishers</th><th>Price</th><th>Category</th></tr>
				<tr><td><a href="<?php echo "$ebook_target_path"; ?>" target="_blank" ><img src="<?php echo "$cover_photo_target_path"; ?>" height="50px" width="50px" align="center"></a></td><td><?php echo "$author"; ?></td><td><?php echo "$publishers"; ?></td><td><?php  echo "$price"; ?></td><td><?php echo "$category"; ?></td></tr>
			</table>
<?php   
			}else{
				echo "<center><font color='red'>File Details Upload to Database Failed!!!!!!!!!!!!!!!...</font></center>";
			}
		}else{
			echo "<center><font color='red'>file Upload to Server Failed</font></center>";
		}
	}
 ?>
<form  action="add_book.php" method="POST" enctype="multipart/form-data" >
	<h2 class="text-center">Upload New Book Here</h2>
	<div class="form-group row">
		<label for="author" class="col-sm-2 col-form-label">Author</label>
		<div class="col-sm-10">
		<input type="text" name="author" class="form-control" placeholder="Author" required id="author">
		</div>
	</div>
	<div class="form-group row">
		<label for="publishers" class="col-sm-2 col-form-label">Publishers</label>
		<div class="col-sm-10">
		<input type="text" name="publishers" class="form-control" placeholder="Publishers" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="price" class="col-sm-2 col-form-label">Price (&#8377;)</label>
		<div class="col-sm-10">
		<input type="number" name="price" class="form-control" placeholder="Price" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="category" class="col-sm-2 col-form-label">Select Category</label>
		<div class="col-sm-10">
		<select name="category" required="required">
		<option value="">[Select One]</option>
		<option value="b_tech">B.Tech</option>
		<option value="aptitude">Aptitude</option>
		<option value="great_personalities">Great Personalities</option>
		<option value="gk">General Knowledge</option>
		<option value="human_values">Human Values</option>
		</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="cover_photo" class="col-sm-2 col-form-label">Upload Cover Photo</label>
		<div class="col-sm-10">
		<input type="file" name="cover_photo" accept="image/*" required>
		</div>
	</div>

	
	<div class="form-group row">
		<label for="cover_photo" class="col-sm-2 col-form-label">Upload pdf</label>
		<div class="col-sm-10">
		<input type="file" name="ebook"  accept="application/*">
		</div>
	</div>

	<input type="submit" name="submitting_book" class="btn btn-primary">	
	<input type="reset" name="" class="btn btn-primary">

</form>
	<h1 class="text-center"><a href="index.php"  target="_self" >&larr;Go Home</a></h1>
</body>
</html>