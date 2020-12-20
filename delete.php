<?php require_once("loading.php"); ?>
<?php 

	require_once("connection.php");
	session_start();
	$_SESSION['delete_book'] = true  ;
	if(isset($_GET['book_id'])){
		$book_id  = $_GET['book_id'];
		$query = "DELETE FROM `books` WHERE `ID`='$book_id' ";
		$result = mysqli_query($conn,$query);
		header("Location: display_user_books.php");
	}
	else{
		echo "Invalid Entry";
	}

 ?>