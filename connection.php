<?php require_once("loading.php"); ?>
<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "book_store";

$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn){
	die("<p>ERROR: Please Check Connection to Database.</p>");
}

 ?>