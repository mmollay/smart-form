<?php
$placeholder = 'Dateipfad';

$type_field = "
<div class='ui fluid action input'>
<input class='$form_id $class_input ui-input' placeholder='$placeholder' type='text' name ='$id' id='$id' value='$value'>
<div class='tooltip ui icon button mini load_img' onclick=\"call_finder('{$arr['hidden']['update_id']}','$id')\" title='Datei auswählen' ><i class='icon upload'></i></div>
</div>";


// return;

// $type_field = "
// <div class='ui fluid action input'>
// <input class='$form_id $class_input ui-input' placeholder='$placeholder' type='text' name ='$id' id='$id' value='$value'>
// <div class='tooltip ui icon button mini load_img' id='$id' title='Datei auswählen' ><i class='icon upload'></i></div>
// </div>";

// if (! $GLOBALS['set_finder']) {
// 	// Fancybox - model
// 	// $jquery .= "$('.load_img, .button_explorer').click( function() { $('.button_explorer').attr('href','../ssi_finder/index.php?id=\"+this.id+\"'); }); ";
	
// 	$jquery .= "
// 	//Laden des Explorer bei Verknüpfung
// 	$('.load_img, .button_explorer').click( function() {
// 		//$('.modal.ui').modal({ allowMultiple: true });
// 		fu_open_finder('?id='+this.id);
// 	$('#'+this.id).bind('focus',function()  { {$arr['finder']['onchange'] } $('#show_explorer').modal('hide'); });
// 	});";
// }

// $GLOBALS['set_finder'] = true;