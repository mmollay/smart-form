<?php
if ($max)
	$array = get_array_number_range ( $min, $max, $step );

if (is_array ( $array )) {
	foreach ( $array as $key2 => $value2 ) {
		
		if ($key2 == $value or $default_select == true) {
			// $checked = "checked='checked' ";
			$field_checked = ' checked';
			
			$default_select = '';
		} else {
			// $checked = "checked='' ";
			$field_checked = '';
		}
		
		$option .= "<div class='field'>";
		$option .= "<div class='ui radio $class_radio checkbox $id $field_checked' >";
		$option .= "<input class='$id $form_id' name='$id' value='$key2' id='$key2' $field_checked type='radio' >";
		$option .= "<label for='$key2' class='ui {$arr['form']['size']} text'><span class='ui text $class_radio_text'>$value2</span></label>";
		$option .= "</div>";
		$option .= "</div>";
		
		$checked = '';
	}
}

if ($overflow)
	$overflow_style = "style='overflow: $overflow;' ";
else
	$overflow_style = '';

$type_field = "$option";

if ($grouped)
	$add_class_checkbox = 'grouped';
else {
	$add_class_checkbox = 'inline';
}
// $type_field = "<div class='ui form'><div class='fields'>$option</div></div>";
$type_field = "<div class='fields $add_class_checkbox' $overflow_style>$option</div>";
$grouped = '';
$option = '';
// if (! $GLOBALS['set_checkbox']) {
$jquery .= "\n\t $('.ui.checkbox.$id').checkbox();";
if ($onchange)
	$jquery .= "\n\t $('.ui.checkbox.$id').checkbox('setting', 'onChange', function () { $onchange });";
					
// }
// $GLOBALS['set_checkbox'] = true;