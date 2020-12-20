<?php require_once("loading.php"); ?>
<?php

	require_once("common_header.php");

	if(isset($_POST["edit_book"])){
		$uploaded_by = $user_array['Name'];
		$author = $_POST["author"];
		$publishers = $_POST["publishers"];
		$price = $_POST["price"]; 
		$category = $_POST["category"];

		$query = "SELECT * FROM `books` WHERE `ID`='$_GET[id]' ";
		$result = mysqli_query($conn,$query);
		$book_array = mysqli_fetch_assoc($result);

		if(is_uploaded_file($_FILES["cover_photo"]["tmp_name"]) ) {

			unlink($book_array['CoverPhoto']);

			$cover_photo_file_name = $_FILES["cover_photo"]["name"];
			$cover_photo_tmp_path = $_FILES["cover_photo"]["tmp_name"];
			$cover_photo_target_path = "assets/books/$cover_photo_file_name";			

			move_uploaded_file($cover_photo_tmp_path,$cover_photo_target_path);

			$query = "UPDATE `books` SET `CoverPhoto`='$cover_photo_target_path' WHERE `ID`='$_GET[id]' ";
			$result = mysqli_query($conn,$query); 
			
		}
		if (is_uploaded_file($_FILES["ebook"]["tmp_name"]) ){
			unlink($book_array['eBookPath']);			

			$ebook_file_name = $_FILES["ebook"]["name"];
			$ebook_tmp_path = $_FILES["ebook"]["tmp_name"];	
			$ebook_target_path = "assets/books/$ebook_file_name";

			move_uploaded_file($ebook_tmp_path,$ebook_target_path);

			$query = "UPDATE `books` SET `eBookPath`='$ebook_target_path' WHERE `ID`='$_GET[id]' ";
			$result = mysqli_query($conn,$query);
		}
		$query = "UPDATE `books` SET `Author`='$author',`Publishers`='$publishers',`Price`='$price',`UploadedBy`='$uploaded_by',`Category`='$category' WHERE `ID`='$_GET[id]'";
		$result = mysqli_query($conn,$query);
		if($result){
			header("Location:display_user_books.php");
		}else{
			echo "Update unsuccessfull";
		}
	}else{
		echo "<font color='white' align='center'><h1 style='text-decoration:underline'>RGUKT BOOK STORE </h1></font>";
	}
?>


<?php 
	if(isset($_GET['id'])){
?>
		<form action="edit_book.php?id=<?php echo $_GET['id']; ?>" method="POST" align='center' id="add_book_form" enctype="multipart/form-data">
		<h2 class="text-center">Edit Book Here</h2>
		<div class="form-group row">
		<label for="author" class="col-sm-2 col-form-label">Author</label>
		<div class="col-sm-10">
		<input type="text" name="author" class="form-control"  required id="author" value="<?php echo  $_GET['author'];?>">
		</div>
		</div>


	<div class="form-group row">
		<label for="publishers" class="col-sm-2 col-form-label">Publishers</label>
		<div class="col-sm-10">
		<input type="text" name="publishers" class="form-control"  required id="author" value="<?php echo  $_GET['publishers'];?>">
		</div>
	</div>
	

	<div class="form-group row">
		<label for="price" class="col-sm-2 col-form-label">Price (&#8377;)</label>
		<div class="col-sm-10">
		<input type="number" name="price" class="form-control"  required id="author" value="<?php echo  $_GET['price'];?>">
		</div>
	</div>

	<div class="form-group row">
		<label for="category" class="col-sm-2 col-form-label">Select Category</label>
		<div class="col-sm-10">
			<select name="category" required="required"  >
			<option value="">[Select One]</option>
			<option value="b_tech" <?php if($_GET['category'] == 'b_tech'){ echo "selected";} ?> > B.Tech</option>
			<option value="aptitude" <?php if($_GET['category'] == 'aptitude'){ echo "selected";} ?>  >Aptitude</option>
			<option value="great_personalities" <?php if($_GET['category'] == 'great_personalities'){ echo "selected";} ?>  >Great Personalities</option>
			<option value="gk" <?php if($_GET['category'] == 'gk'){ echo "selected";} ?> >General Knowledge</option>
			<option value="human_values" <?php if($_GET['category'] == 'human_values' ){ echo "selected";} ?> >Human 	Values</option>
				</select>
		</div>
	</div>

	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Current  Cover Photo</label>
		<div class="col-sm-10">
		<a href="<?php echo $_GET['ebookpath']; ?>" target="_blank"><img src="<?php echo  $_GET['coverphoto']; ?>" 							height=100 width=100 >  </a>
		</div>
	</div>


	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Update Cover Photo</label>
		<div class="col-sm-10">
			<input type="file" name="cover_photo" accept="image/*" value="<?php echo $_GET['coverphoto']; ?>">
		</div>
	</div>


	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Update PDF</label>
		<div class="col-sm-10">
			<input type="file" name="ebook"  accept="application/*">
		</div>
	</div>
	<input type="submit" name="edit_book" value="Update" class="btn btn-success">	
</form>


<?php 
		}else{
			echo "Invalid Entry";
		}
 ?>