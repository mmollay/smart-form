<?php
if (! is_array ( $array_icon )) {
	$array_icon = array ( 'checkmark' ,
			'heart' ,
			'home' ,
			'empty heart' ,
			'idea' ,
			'rocket' ,
			'alarm' ,
			'idea' ,
			'star' ,
			'announcement' ,
			'smile' ,
			'smile outline' ,
			'grin outline' ,
			'grin wink outline' ,
			'grin tongue squint outline' ,
			'thumbs up' ,
			'handshake' ,
			'plug' ,
			'space shuttle' ,
			'power' ,
			'play' ,
			'compass' ,
			'compass outline' ,
			'add user' ,
			'map signs' ,
			'sign in' ,
			'mail' ,
			'mail outline' ,
			'mail square' ,
			'copy' ,
			'hand pointer' ,
			'in cart' ,
			'money' ,
			'dove' ,
			'car side' ,
			'thumbtack' ,
			'gift' ,
			'comment' ,
			'fruit-apple' ,
			'snowman' ,
			'award' ,
			'theater masks' ,
			'music' ,
			'radiation' ,
			'spa' ,
			'carrot' ,
			'fruit-apple' ,
			'leaf' ,
			'lemon' ,
			'lemon outline' ,
			'pepper hot' );
}

foreach ( $array_icon as $icon ) {
	$js_icon = preg_replace ( '/ /', '+', $icon );
	$data_html .= "<a onclick=get_icon('$id','$js_icon')><i class='icon $icon'></i></a>"; // $('#$id').val('$js_icon').change();
}

$data_html .= "<hr><a href='http://fomantic-ui.com/elements/icon.html' target='icon'>mehr...</a>";

if (!$value) {
    $button_value = 'search';
}
else {
    $button_value = '';
}

$type_field = "
<div class='ui fluid action input'>
<input class='$form_id $class_input' placeholder='icon'  type='text' name ='$id' id='$id' value='$value'><div class='{$arr['form']['size']} ui icon button tooltip-click' data-html=\"$data_html\" data-position='bottom right'><i id='button_icon_$id' class='$button_value $value large icon'></i></div>
</div>";