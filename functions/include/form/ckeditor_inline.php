<?php
if (! $toolbar)
	$toolbar = 'basic';

$jquery .= "\n\t $('#$id').ckeditor({creator: 'inline', toolbar: '$toolbar','filebrowserBrowseUrl': '../ssi_smart/admin/ckeditor_link.php?type=Images',$config});";
$type_field = "<div contenteditable='true' $setting $rows name ='$id' class='ui message $form_id $class_input' id='$id' $disabled $set_disabled placeholder='$placeholder' style='min-height:100px; $style' >$value</div>";