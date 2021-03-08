<?php
//Remove session_value set back default - values
if ($_POST ['action'] == 'set_default') {
	session_start ();
	$_SESSION ['arr_temp'] = '';
}

include ("../data.php");
include (__DIR__ . "/../../include_form.php");
$output_form = call_form ( $arr_temp );
echo $output_form ['html'] . $output_form ['js'];
?>