<?php
if ($rows) {
	$rows = "rows = '$rows' ";
}
if ($readonly)
	$readonly = 'readonly';
$type_field = "<textarea $readonly $setting $rows name ='$id' class='$form_id $class_input' id='$id' $disabled $set_disabled placeholder='$placeholder' style='$style' >$value</textarea>";
$readonly = '';