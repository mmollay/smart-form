<?php
if ($onclick)
	$onclick = "onclick=\"$onclick\" ";
if ($value)
	$text = $value;

	if ($icon) {
		$icon = "<i class='icon $icon'></i> ";
		$class_button = "icon $class_button";
	}
	
$type_field = "<button title='$tooltip' class='tooltip $color button ui $class_button' name = '$id' id ='$id' $onclick>$icon $text</button>";
$onclick = '';