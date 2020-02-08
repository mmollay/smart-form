<?php
if ($contenteditable) {
	$contenteditable = " contenteditable='true' ";
}

$type_field .= "<div class='$class_content' id='$id' $setting $contenteditable align = '$align'>";
$type_field .= preg_replace ( "/{data}/", $value, $text );
$type_field .= "</div>";