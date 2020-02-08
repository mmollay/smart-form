<?php
/*
 * UPDATE am 28.12.2016
 * Version 1.4.4
 * */

session_start ();
$list_id = $_POST['list_id'];

// Suchparameter uebergeben in Session
// if (isset($_GET['search_text'])) $_SESSION['search_text'] = $_GET['search_text'];

if ($_POST["filter_type"] == 'reset') {
	unset ( $_SESSION['filter'] );
}

// SEARCH INPUT - FIELD
if ($_POST["filter_type"] == 'input_search') {
	$_SESSION["input_search"] = array ( $list_id => $_POST["filter_value"] );
	$_SESSION["limit_pos"] = array ( $list_id => '' );
	// PAGE
} elseif ($_POST["filter_type"] == 'limit_pos') {
	$_SESSION["limit_pos"] = array ( $list_id => $_POST["filter_value"] );
} // SELECT - FILTER
elseif ($_POST["filter_type"] == 'filter') {
	$_SESSION["filter"][$list_id][$_POST["filter_name"]] = $_POST["filter_value"];
	$_SESSION["limit_pos"] = array ( $list_id => '' );
}

$_POST['table_reload'] = true;
include ("include_list.php");

if (! is_array ( $_SESSION['smart_list_config'][$list_id] )) {
	// Ruft Cookie-Array
	$cookie = unserialize ( $_COOKIE['smart_list_config'] );
}

if ($_SESSION['smart_list_config'][$list_id]['config_path'])
	$config_path = $_SESSION['smart_list_config'][$list_id]['config_path'];
elseif ($cookie[$list_id]['config_path'])
	$config_path = $cookie[$list_id]['config_path'];

if ($_SESSION['smart_list_config'][$list_id]['mysql_connect_path'])
	$mysql_connect_path = $_SESSION['smart_list_config'][$list_id]['mysql_connect_path'];
elseif ($cookie[$list_id]['mysql_connect_path'])
	$mysql_connect_path = $cookie[$list_id]['mysql_connect_path'];

if ($_SESSION['smart_list_config'][$list_id]['data'])
	$data = $_SESSION['smart_list_config'][$list_id]['data'];
elseif ($cookie[$list_id]['data'])
	$data = $cookie[$list_id]['data'];

if ($config_path and $mysql_connect_path)
	echo call_list ( $config_path, $mysql_connect_path, $data );
else
	echo "Session ist abgelaufen";