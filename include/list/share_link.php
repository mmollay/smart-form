<?php
//Submit share_link for send Listpage with filtersettings
session_start ();
$search = $_SESSION ["input_search"] [$_GET ['list_id']];

foreach ( $_SESSION ["filter"] [$_GET ['list_id']] as $key => $value ) {
	$link .= "&$key=$value";
}

if ($search or $link)
	$add_hash = "?search=" . $search . $link;

$_SESSION ['page_link'] [$_GET ['list_id']] = $_GET ['href'] . $add_hash; //Generate by call_table.php
