<?php
if ($contenteditable) {
	$contenteditable = " contenteditable='true' ";
}
$color = 'red';


$type_field .= "<div $setting $contenteditable align = '$align'>";
if ($color)
	$type_field = "<span class='ui $color text'>";
	
$type_field .= preg_replace ( "/{data}/", $value, $text );

if ($color)
	$type_field .= "</span>";
	
	

$type_field .= "</div>";

$contenteditable = '';
$setting = '';