<?php
//Develop
session_start ();
$sort = $_POST ['sort'];

for($i = 0; $i < count ( $sort ); $i ++) {
	echo "\n$i -> " . $sort [$i];
}

?>