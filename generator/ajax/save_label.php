<?php
include (__DIR__ . '/../data.php');

//Save label value for Field
$value = $_POST ['value'];
$id = $_POST ['id'];
$id = preg_replace ( '[label_]', '', $id );

$arr_temp['field'][$id]['label'] = $value;

$array_code = save_array ( $arr_temp );
echo '$("#generate_code").val("$arr_temp=' . $array_code . ';");';
