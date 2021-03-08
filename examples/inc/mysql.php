<?php
include ('config.php');

// $cfg_mysql['user']     = 'demo';
// $cfg_mysql['password'] = 'demo123rew';
// $cfg_mysql['server']   = 'localhost';
// $cfg_mysql['db']       = 'demo';

//Install DB data for "demo"
try {
	$pdo = new PDO ( 'mysql:host=localhost;', $cfg_mysql ['db'], $cfg_mysql ['password'] );
} catch ( Exception $e ) {
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Install DB</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
</head>
<body><br>
	<div class="ui main text container">
		<a href='../index.php'>< Back</a>
		<div class="ui message warning">
		Database for demo list is not yet installed<br>
		<a href='install.php'>[Install mysql-db for Demo-List]</a>
		</div> 
		
		
	</div>
</body>
</html>
<?php
	exit ();
}

$GLOBALS ['mysqli'] = new mysqli ( $cfg_mysql ['server'], $cfg_mysql ['user'], $cfg_mysql ['password'], $cfg_mysql ['db'] ) or die ( "Could not open connection to server {$cfg_mysql['server']}" );

$pdo = new PDO ( 'mysql:host=localhost;dbname=demo', $cfg_mysql ['db'], $cfg_mysql ['password'] );