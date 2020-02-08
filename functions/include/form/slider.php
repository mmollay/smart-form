<?php

//Daten auslesen:
//$('#id').bind("DOMSubtreeModified",function(){ if($('#'+this.id).html()) save_value_element(update_id,this.id,$('#'+this.id).html()); });


// SLIDER
// $this->data .= "\n\t\t $id : $('#hidden_$id').val(),";
$add_data .= "data.push({ name: '$id', value: $('#hidden_$id').val() });";

$type_field .= "<div class='ui {$arr['form']['size']} slider' id='$id"."_slider'></div><input type='hidden' id='hidden_$id' value='$value'><span  hidden style='visibility:hidden' class='$form_id ui-slider-value $class' id='$id'>$value</span>";

$add_label_content = "<div class='label {$arr['form']['size']} ui'><span id='$id"."_amount'>$value</span> $unit</div>";

if (! $min)
	$min = 0;

if (! ($value))
	$value = $min;

$slider_option = '';
$slider_option .= "
onChange: function(value) {  $('#$id,#$id"."_amount').html (value); $('#hidden_$id').val (value); $onChange },
onMove: function(value) { $('#$id,#$id"."_amount').html (value); $('#hidden_$id').val (value); $onMove },";

if ($start)
	$value = $start;

// Wenn % in Zahlencode vorkommt ist Value = ''
if (preg_match ( "/%/", $value ))
	$value = '';
if ($min !== '')
	$slider_option .= "min: $min,";
if ($max)
	$slider_option .= "max: $max,";
if ($step)
	$slider_option .= "step: $step,";
if ($smooth)
	$slider_option .= "smooth: true,";
if (isset ( $value ))
	$slider_option .= "start: $value,";

if ($labelType)
	$slider_option .= "labelType: '$labelType',";

$jquery .= "$('#$id"."_slider').slider({ $slider_option });";

$labelType = $smooth = $step = $max = $min = '';

return;

if (! $min)
	$min = 0;

if (! ($value))
	$value = $min;

// Wenn % in Zahlencode vorkommt ist Value = ''
if (preg_match ( "/%/", $value ))
	$value = '';
if ($min !== '')
	$slider_option .= "min: $min,";
if ($max)
	$slider_option .= "max: $max,";
if ($step)
	$slider_option .= "step: $step,";
if (isset ( $value ))
	$slider_option .= "value: $value,";

$slider_option .= "range: 'min',";

$jquery .= '$("#' . $id . '").slider({
' . $slider_option . '
	slide: function(event, ui) {
		$("#' . $id . '_amount") . html ( ui . value );
		$("#hidden_' . $id . '") . val ( ui . value );
	}
	});';

$type_field .= "<table border=0 width=100% style='padding-left:4px;'><tr><td><div style='width:100% float:left' id=\"$id\"></div></td><td style='width:30px'>";
if (! $hide_number)
	$type_field .= "<span style='width:20px; display:block; text-align:right; float:left' id=\"$id" . "_amount\">$value </span>";
$type_field .= "<td style='width:20px'>$unit</td>";
$hidden .= "<input type=hidden id='hidden_$id' name='$id' value='$value'>";
$type_field .= "</tr></table>";