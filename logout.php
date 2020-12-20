<?php require_once("loading.php"); ?>
<?php 
		session_start();
		if(isset($_SESSION["userid"])){
			session_unset();
			session_destroy();
			header("Location:index.php");
		}else{
			echo "Invalid Entry";
		}
 ?>