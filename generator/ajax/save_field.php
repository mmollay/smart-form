<?php
//Call array
include (__DIR__ . '/../data.php');
$update_id = $_POST ['update_id'];

//clean all value from the field
 $arr_temp ['field'] [$update_id] = array();

foreach ( $_POST as $key => $value ) {

	if ($key != 'update_id') {
		if ($key == 'array') {
			$arr_temp ['field'] [$update_id] ['array'] = explode ( "\n", $_POST ['array'] );
		} else
			//echo "$update_id = $key->$value<br>";
			$arr_temp ['field'] [$update_id] [$key] = $value;
	}
}

$array_code = save_array ( $arr_temp );

echo '$("#generate_code").val("$arr_temp=' . $array_code . ';");';
echo 'call_form();';
echo "$('.ui.modal').modal('hide');";