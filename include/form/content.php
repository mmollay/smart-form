<?php
if ($contenteditable) {
	$contenteditable = " contenteditable='true' ";
}

$type_field = "<div class='$class_content' id='$id' $setting $contenteditable align = '$align'>";

if ($color or $size or $inverted) {
	
	if ($inverted)
		$add_class_inverted = 'inverted';
		
		$type_field .= "<span class='ui $color $size $add_class_inverted text'>";
}

$type_field .= preg_replace ( "/{data}/", $value, $text );

if ($color or $size or $inverted)
	$type_field .= "</span>";
	
	$type_field .= "</div>";