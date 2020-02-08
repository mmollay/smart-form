<?php
include ('../inc/mysql.php');

$statement = $pdo->prepare ( "REPLACE INTO list (id,firstname,secondname,birthday) VALUES (?, ?, ?, ?)" );

if ($statement->execute ( array ($_POST ['update_id'],$_POST ['firstname'],$_POST ['secondname'],$_POST ['birthday'] ) )) {
	$ok = true;
} else
	$ok = false;

if ($ok == true) {
	echo "$('#edit').modal('hide');";
	echo "table_reload();";
} else {
	$error = "SQL Error in: " . $statement->queryString . " - " . $statement->errorInfo () [2];
	echo "alert('$error');";
}
