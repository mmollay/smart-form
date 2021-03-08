<?php
//Call array
include (__DIR__ . '/../data.php');

$row_id = $_POST ['id'];
$id = preg_replace ( '[row_]', '', $row_id );

//Remove from array
unset($arr_temp['field'][$id]);

$array_code = save_array ( $arr_temp );
echo '$("#generate_code").val("$arr_temp=' . $array_code . ';");';
//Remove from list
echo "$('#$row_id').remove();";
