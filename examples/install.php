<?php
/**
 * ***********************
 * Installation - Routine
 * Just call this formular an insert your admin-passwort
 * **********************
 */

if ($_POST ['admin_user'] and $_POST ['admin_passwd']) {
	//Call Formular
	$admin_user = $_POST ['admin_user'];
	$admin_passwd = $_POST ['admin_passwd'];
	$db_user = $_POST ['db_user'];
	$db_passwd = $_POST ['db_passwd'];
	$db_name = $_POST ['db_name'];
	
	//Install DB data for "demo"
	try {
		$pdo = new PDO ( 'mysql:host=localhost;', $admin_user, $admin_passwd );
	} catch ( Exception $e ) {
		echo "<br><div class='ui message warning'>" . $e->getMessage () . "</div>";
		exit ();
	}
	
	// Create database
	$sql [] = "DROP DATABASE `$db_name`"; //REMOVE DB - for test
	$sql [] = "DROP USER '$db_user'@'localhost'";
	$sql [] = "CREATE DATABASE $db_name";
	$sql [] = "use $db_name";
	$sql [] = "CREATE USER '$db_user'@'localhost' IDENTIFIED BY '$db_passwd'";
	$sql [] = "GRANT all privileges ON $db_name TO '$db_user'@'localhost'";
	$sql [] = "CREATE TABLE `list` (`id` int(11) NOT NULL,`firstname` varchar(50) NOT NULL,`secondname` varchar(50) NOT NULL,`birthday` date NOT NULL,`message` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1; ";
	$sql [] = "ALTER TABLE `list` ADD PRIMARY KEY (`id`);";
	$sql [] = "ALTER TABLE `list` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; COMMIT; ";
	$sql [] = "GRANT SELECT, INSERT, UPDATE, DELETE ON `$db_name`.* TO '$db_user'@'localhost';";
	
	$sql [] = "INSERT INTO `list` (`id`, `firstname`, `secondname`, `birthday`, `message`) VALUES
		(1, 'Test', 'User', '2020-02-03', ''),
		(2, 'Peter ', 'Gruber', '1975-01-20', ''),
		(3, 'Klaus', 'Kinsky', '1980-10-11', '');
		";
	
	foreach ( $sql as $value ) {
		if ($pdo->query ( $value )) {
			//echo $value;
		} else {
			$error_message .= "SQL Error in: " . $pdo->queryString . " - " . $pdo->errorInfo () [2] . "<br>";
		}
	}
	if ($error_message) {
		echo "<br><div class='ui message warning'>$error_message</div>";
	} else {
		echo "
		<br>
		<div class='ui message green'>
		Database '$db_name' installed!
		<br><br><a href='list.php'>[Go to Demo List]</a>
		</div>
		
		";
		//Change mysql_config
		//$content = file_get_contents ( 'inc/config.php' );
		$content = '
		<?
		//generated automatically
		$cfg_mysql[\'user\']     = \'' . $db_user . '\';
		$cfg_mysql[\'password\'] = \'' . $db_passwd . '\';
		$cfg_mysql[\'server\']   = \'localhost\';
		$cfg_mysql[\'db\']       = \'' . $db_name . '\';
		?>
		';
		$content = str_replace("\t", '', $content); //
		file_put_contents ( 'inc/config.php', $content );
	}
} else {
	//Call Formular
	include_once ("../include_form.php");
	
	$arr ['header'] = array ('title' => "Database installation for 'Demo-List'",'text' => 'here you get it','class' => 'small diverding white','segment_class' => 'attached message','icon' => 'database' );
	$arr ['form'] = array ('id' => 'form_install','class' => 'segment attached' );
	$arr ['ajax'] = array ('success' => "$('#show_data').html(data);",'dataType' => 'html' );
	$arr ['field'] ['admin_user'] = array ('type' => 'input','label' => 'Admin-User or Root)','validate' => true,'focus' => true,'value' => 'root' );
	$arr ['field'] ['admin_passwd'] = array ('type' => 'password','label' => 'Password (admin or root)','validate' => true,'focus' => true,'value' => 'Jgewl21;' );
	$arr ['field'] [] = array ('type' => 'line' );
	$arr ['field'] [] = array ('type' => 'header','text' => 'Add your Database' );
	$arr ['field'] [] = array ('type' => 'content','text' => 'Choose your own database name, user and password or just use the default-settings.' );
	$arr ['field'] [] = array ('type' => 'div','class' => 'fields two' );
	$arr ['field'] ['db_name'] = array ('type' => 'input','label' => 'Database-Name','validate' => true,'value' => 'demo' );
	$arr ['field'] ['db_user'] = array ('type' => 'input','label' => 'User','validate' => true,'value' => 'demo' );
	$arr ['field'] ['db_passwd'] = array ('type' => 'input','label' => 'Password for Demo-DB','validate' => true,'value' => 'demo123' );
	$arr ['field'] [] = array ('type' => 'div_close' );
	$arr ['field'] ['submit'] = array ('type' => 'button','value' => 'Install Database','class' => 'submit','align' => 'center' );
	
	$output_form = call_form ( $arr );
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Installation-Script</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
</head>
<body>
	<br>
	<div class="ui main text container">
	<?=$output_form['html']?>
	<div id='show_data'></div>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<?=$output_form['js']?>
</body>
</html>

<?php
