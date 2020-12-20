<?php 
	function display_category_books($display_category,$db_category){
			require_once("loading.php"); 
			require_once("connection.php");
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title><?php echo "$display_category"; ?></title>
				<link rel="shortcut icon" href="assets/web_images/rgukt_icon.jpeg" >
				<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
				<style type="text/css">
				#grad {
   				background-image: linear-gradient(to bottom right, red, yellow);
					}</style>
	
			</head>
			<body class="container bg-light">

			<!-- Main Heading -->
			<div class="align-center sticky-top bg-full border border-success mx-auto" id="grad">
				<div class="container">
				<img src="assets/web_images/rgukt.png" alt="RGUKT LOGO"  height="70px" >
				<font class="title font-weight-bold">RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES - BASAR
				</font>
				</div>
			</div>

			<h1 class="text-center font-italic"><?php echo "$display_category"; ?></h1>
			<table border="1" align="center" cellpadding="7" class="table table-hover"> 
			<thead>
				<tr><th scope="col">#</th>
				<th scope="col">Cover Page</th>
				<th scope="col">Author Name</th>
				<th scope="col">Publisher</th>
				<th scope="col">Price</th></tr>
			</thead>
<?php
			$query = "SELECT * FROM `books` WHERE `Category`= '$db_category' " ;
			$result = mysqli_query($conn,$query);
			$i=1;
			while($row = mysqli_fetch_assoc($result)){
?>
			<tbody>
				<tr><th scope="row"><?php echo $i++; ?></th>
					<td><a href="<?php echo $row['eBookPath']; ?>" target="_blank"><img src="<?php echo $row['CoverPhoto']; ?>" height="100" width="100"></a></td>
					<td><?php echo $row['Author']; ?></td>
					<td><?php echo $row['Publishers']; ?></td>
					<td> <?php echo $row['Price']; ?></td></tr>
<?php 		}  ?>
			</tbody>
			</table>
			<h1 class="text-center"><a href="index.php"  target="_self" >&larr;Go Home</a></h1>

			
			<script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

			</body>
			</html>
<?php  }

 ?>