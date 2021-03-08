<?php
session_start ();

if (is_array ( $_SESSION ['arr_temp'] )) {
	$arr_temp = $_SESSION ['arr_temp'];
} else {
	//Default valuess
	//Data for formular 
	$arr_temp ['form'] = array ('id' => 'formular','action' => 'ajax/handler.php','class' => 'sortable segment' );

	//$arr_temp ['field'] ['date'] = array ('type' => 'date','label' => 'Date','validate' => true,'info' => 'Choose your date' );

	// 		$arr_temp ['field'] ['firstname'] = array ('grid' => 'first','type' => 'input','label' => 'Firstname','placeholder' => 'Firstname','validate' => true,'value' => 'test' );
	// 		$arr_temp ['field'] ['secondname'] = array ('grid' => 'second','type' => 'input','label' => 'Secondname','placeholder' => 'Secondname' );
	// 		$arr_temp ['field'] ['grid'] = array ('type' => 'grid','class' => '','column' => [ "first" => '8',"second" => "8" ] );

	$arr_temp ['field'] ['firstname'] = array ('type' => 'input','label' => 'Firstname','placeholder' => 'Firstname','validate' => true,'value' => 'test' );
	$arr_temp ['field'] ['secondname'] = array ('type' => 'input','label' => 'Secondname','placeholder' => 'Secondname' );

	$arr_temp ['field'] ['radio'] = array ('type' => 'radio','label' => 'Drop','search' => true,'clearable' => true,'array' => array ('wood' => 'Wood','water' => 'Water' ) );
	$arr_temp ['field'] ['drop'] = array ('type' => 'dropdown','label' => 'Drop','search' => true,'clearable' => true,'array' => array ('wood' => 'Wood','water' => 'Water' ) );
	$arr_temp ['field'] ['submit_button'] = array ('type' => 'submit','value' => 'Submit','align' => 'center' );

	//Set Default SESSION
	$_SESSION ['arr_temp'] = $arr_temp;
}

$output_code = var_export ( $_SESSION ['arr_temp'], true );
$output_code = preg_replace ( '!\s+!', ' ', $output_code );

//Save array, set session, send code for textarea
function save_array($array) {
	//Save data inner session
	$_SESSION ['arr_temp'] = $array;

	//Generate Array for Textarea
	$array_code = var_export ( $array, true );
	$array_code = preg_replace ( '!\s+!', ' ', $array_code );
	return $array_code;
}