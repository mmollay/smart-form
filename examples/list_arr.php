<?php
include ("../include_list.php");
$array = call_list ( 'inc/array_list_arr.php', 'inc/mysql.php' );
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Smart - List - Example</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
</head>
<body>
	<div class="ui main text container">
		<br> <br> <a href='../index.php'>< Back</a> <br> <br>
	<?=$array['html']?>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<script>var smart_form_wp = '../'</script>
	<script src="../js/smart_list.js"></script>
	<?=$array['js']?>
</body>
</html>