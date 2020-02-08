<?php
$placeholder = 'Datum wählen';

if (! $setting)
	$json_setting = "'type':'date',";

if ($value != '0000-00-00' and $value)
	$json_setting .= "'initialDate':'new Date($value)',";
	
	
$json_setting .= "text: { months: ['Jänner', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'December'] },";

// $json_setting .= "formatter: { date: function (date, settings) { if (!date) return ''; var day = date.getDate(); var month = date.getMonth() + 1; var year = date.getFullYear(); return day + '-' + month + '-' + year; } },";

// specified settings
$json_setting .= $setting;

$type_field = "
<div class='ui calendar' id='$id'><div class='ui input left icon'><i class='calendar icon'></i><input type='text' placeholder='$placeholder'></div></div>";

$jquery .= "$('#$id').calendar({ 
 	$json_setting
});";