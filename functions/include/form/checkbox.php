<?php
if (! isset ( $label_text ))
	$class .= ' inline'; // damit Valitation rechts richtig dargestellt wird

if ($value == true) {
	$checked = "checked";
	//$set_value = 1;
	$jquery .= "\n\t$('#checkbox_$id').checkbox('check');";
	
} else {
	$checked = "";
	$jquery .= "\n\t$('#checkbox_$id').checkbox('uncheck');";
	//$set_value = 0;
}

// 07.02.2019 -> $id aus dem class ausgehängt
$type_field = "
<div class='ui checkbox $checked $type $read_only' id='checkbox_$id'>
	<input class='ui-checkbox $form_id $class_input' $disabled type='checkbox' checked='$checked' value='1' id='$id' name='$id'>
	<label class='label {$label_class}' id='label_$id'><div class='ui {$arr['form']['size']} text'>$label $info_tooltip</div></label>
</div>
";

$type_field .= "$label_right";

//$jquery .= "\n\t$('.ui.checkbox#checkbox_$id').checkbox();";

if ($onchange) {
	$jquery .= "\n\t$('#checkbox_$id	').checkbox('setting', 'onChange', function () { $onchange });";
}
if ($label_text === '')
	$label_text = "&nbsp;";

$label = $label_text; // Es wird label_text verwendet

$checked = '';