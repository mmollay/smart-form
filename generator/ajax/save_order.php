<?php
//Call array
include (__DIR__ . '/../data.php');

$field_new_array = array ();
foreach ( $_POST ['row'] as $index ) {
	$field_new_array [$index] = $arr_temp ['field'] [$index];
}

//change fields - new positions
$arr_temp ['field'] = $field_new_array;

$array_code = save_array ( $arr_temp );
echo '$("#generate_code").val("$arr_temp=' . $array_code . ';");';

//file_put_contents ( 'inc/config.php', $content );
