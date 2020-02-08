<?php

//http://themesanytime.com/products/colorpicker/default-picker-full-demo.html#docs-block

if (!$value) $value = 'transparent';

$type_field = "
<span class='colorpicker-input colorpicker-input--position-right'>
<input id='$id' type='text' class='ui-color form-control $form_id $class_input' placeholder='red' value='$value'>
<span id='$id-anchor' class='colorpicker-custom-anchor colorpicker-circle-anchor'>
<span data-color='' class='colorpicker-circle-anchor__color' style='background: rgb(0, 0, 0) none repeat scroll 0% 0%;'>
</span>
</span>";

// $type_field = "
// <span class='colorpicker-input colorpicker-input--position-right'>
// <input id='$id' type='text' class='form-control colorpicker-anchor' placeholder='red'>
// <span id='$id-anchor' class='colorpicker-custom-anchor colorpicker-circle-anchor'>
// <span data-color='' class='colorpicker-circle-anchor__color' style='background: rgb(0, 0, 0) none repeat scroll 0% 0%;'>
// </span>
// </span>
// </span>";



$jquery .= "
	var colorPicker = new ColorPicker.Default('#$id',{ 
		color: '$value', 
	  	history: { hidden: false, colors: ['transparent','white', 'silver', 'gray','black','red','maroon','yellow','olive','lime','green','aqua','tail','blue','navy','fuchsia','puple'] } 
	} ); 
	colorPicker.on('change', function(color) { $('#$id').focus(); $('#$id').css('background-color',$('#$id').val()); }); 
";