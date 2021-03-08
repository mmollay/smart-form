<?php
include (__DIR__ . '/../data.php');
$update_id = $_POST ['update_id'];

echo '$("#generate_code").val("$arr_temp=' . $array_code . ';");';
