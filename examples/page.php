<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Smart - Page - Example</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
</head>
<body>
	<div class="ui main text container">
		<br>
		<br>
		<div class='ui message'>
	<?php
	include (__DIR__ . '/inc/mysql.php');
	$id = $_GET ['id'];
	$query2 = $GLOBALS ['mysqli']->query ( "SELECT firstname,secondname,category FROM list WHERE id = '$id' " );
	$array = mysqli_fetch_array ( $query2 );
	echo "<a href='list.php'>< back</a><hr>";
	echo "Firstname: " . $array ['firstname'];
	echo "<br>";
	echo "Secondame: " . $array ['secondname'];
	?>
	
	</div>
	</div>
</body>
</html>