<?php
include (__DIR__ . '/../data.php');

//Get new Fields
$type = $_POST ['type'];

//Uniq ID
$id = md5 ( uniqid ( rand (), TRUE ) );
$arr ['field'] [$id] = array ();

include_once (__DIR__ . "/../../include_form.php");

if ($type == 'dropdown' or $type == 'radio') {
	$default_array = array ('1' => 'Value 1','2' => 'Value 2' );
	$default_json_array = json_encode ( $default_array );
}

$type_label ['checkbox'] = 'Checkbox';
$type_label ['toggle'] = 'Toggle';
$type_label ['radio'] = 'Radio-Buttons';
$type_label ['select'] = 'Selectfeld';
$type_label ['textarea'] = 'Textfield';
$type_label ['input'] = 'Insertfield1';
$type_label ['fielddate'] = 'Date';
$type_label ['button'] = 'Button';

if ($type == 'text') {
	$text = 'Textfield';
}

if ($type == 'text') {
	if ($_SESSION ['admin_modus'])
		$setting = "contenteditable='true'";
	$arr ['field'] [$id] = array ('class_content' => 'cktext','setting' => $setting,'type' => 'content','text' => $text );
} elseif ($type == 'dropdown') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => 'dropdown','array' => $default_array,'placeholder' => '--bitte wählen--' );
} elseif ($type == 'slider') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => 'slider','max' => 10,'class' => 'labeled ticked red' );
} elseif ($type == 'checkbox' or $type == 'toggle') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => $type );
} elseif ($type == 'radio') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => 'radio','array' => $default_array );
} elseif ($type == 'textarea') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => 'textarea' );
} elseif ($type == 'input') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => $type );
} elseif ($type == 'button') {
	$arr ['field'] [$id] = array ('value' => $type_label [$type],'type' => 'button' );
} elseif ($type == 'fielddate') {
	$arr ['field'] [$id] = array ('label' => $type_label [$type],'type' => 'date' );
} elseif ($type == 'splitter1') {
	$arr ['field'] [$id] = array ('type' => 'grid','class' => '','column' => [ "first" => '8',"second" => "8" ] );
}

$output_form = call_form ( $arr );
$output = $output_form ['html'] . $output_form ['js'];

$arr_temp ['field'] [$id] = $arr ['field'] [$id];
save_array ( $arr_temp );
echo $output;

// echo "
// <div  id='row_field-501' class='ui message mini'>
// <i class='order-button bordered arrows alternate icon'></i>
// $output
// </div>";


