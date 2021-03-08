<?php
foreach ( $arr ['data'] as $id => $array_value ) {
	$count_line++;
	$array ['id'] = $id;
	foreach ( $array_value as $key => $value ) {
		$array [$key] = $value;
	}
	//$array[$id] =  print_r ($value);
	include (__DIR__ . '/body.php');
	$no_body = true;
}

$txt_count_all = "Einträge: <b>$count_line</b>";