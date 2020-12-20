<?php require_once("loading.php"); ?>
<?php 

	require_once("common_header.php");


	// After change password

		if(isset($_SESSION["change_password"])){
?>

			<div class="container">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
  				<strong>Hey User !</strong> Password Updated Successfully!.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>
			</div>
<?php 

		unset($_SESSION["change_password"]);

		}




		// Display user books

				$uploaded_user = $user_array['Name'];
				$my_uploads = "SELECT * FROM `books` WHERE `UploadedBy`='$uploaded_user' ";
				$result_uploads = mysqli_query($conn,$my_uploads);
				// Displayijg User Uploaded Books
				if(mysqli_num_rows($result_uploads)){
					echo "<h1 align='center'>My Uploads</h1>";
?>
					<table border="1" cellpadding="3" align="center">
					<tr> <th>#</th><th>Cover Photo</th><th>Author</th><th>Publishers</th><th>Category</th><th>Price</th><th>Edit Book</th><th>Delete Book</th></tr>
<?php
					$i=1;
					while ($row=mysqli_fetch_assoc($result_uploads)) {
?>			
					<tr><td><?php echo "$i"; ?></td><td><a href="<?php echo $row['eBookPath']; ?>" target="_blank"><img src="<?php echo $row['CoverPhoto']; ?>" height="100px" width="100px"></a></td><td><?php echo $row['Author']; ?></td><td><?php echo $row['Publishers']; ?></td><td><?php echo $row['Category']; ?></td><td><?php echo $row['Price']; ?></td><td><a href="edit_book.php?author=<?php echo $row['Author']; ?>&publishers=<?php echo $row['Publishers']; ?>&price=<?php echo $row['Price']; ?>&category=<?php echo $row['Category'] ?>&coverphoto=<?php echo $row['CoverPhoto']; ?>&ebookpath=<?php echo $row['eBookPath']; ?>&id=<?php echo $row['ID']; ?>"> Edit </a></td><td><a href="delete.php?book_id=<?php echo $row['ID']; ?>" > Delete </a></td></tr>
<?php
					$i++; }
?>
					</table>
<?php
				}else{
					echo "<h1 align='center' > Yet No Uploads!...</h1>"; }
 ?>
 <h1 class="text-center"><a href="index.php"  target="_self" >&larr;Go Home</a></h1>