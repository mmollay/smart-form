<?php
//Edit the field
include_once ("../../include_form.php");
$id = $_POST ['id'];
$id = preg_replace ( '[row_]', '', $id );

/**
 * *************************************************
 * Check with type from data array
 * *************************************************
 */
include ("../data.php");

if (is_array ( $arr_temp ['field'] [$id] )) {
	foreach ( $arr_temp ['field'] [$id] as $arr_key => $arr_value ) {
		${$arr_key} = $arr_value;
	}
}

if (is_array ( $array )) {
	foreach ( $array as $array_key => $array_value ) {
		$value_list .= "\n$array_value";
	}
}

if ($type == 'splitter1') {
	// Splitter einstellungen
} else {
	//$array_nl_field = array ('email' => 'Email {%email%}','company_1 ' => 'Firma {%company%}','company_2 ' => 'Firma (Zusatz)','firstname' => 'Vorname {%firstname%}','secondname' => 'Nachname {%secondname%}','street' => 'Strasse','city' => 'Stadt','zip' => 'PLZ','web' => 'Internet','zip' => 'PLZ','telefon' => 'Telefon','set_newsletter' => 'Checkbox Abonnieren','commend' => 'Zusatzinfos','commend2' => 'Zusatzinfos 2','uploads' => 'Hochgeladene Dateien' ); // , 'intro' => 'Anrede'

	$arr ['field'] [] = array ('tab' => 'form_first','type' => 'div','class' => 'two fields' );

	$arr ['field'] ['label'] = array ('tab' => 'form_first','label' => 'Titel','type' => 'input','value' => $label );

	// 	if ($type == 'input' or $type == 'textarea' or $type == 'checkbox' or $type == 'uploader') {
	// 		$arr ['field'] ['newsletter_field'] = array ('tab' => 'form_first','label' => 'Zuweisung für Newsletter Kontakt','array' => $array_nl_field,'value' => $newsletter_field,'type' => 'dropdown' );
	// 	}

	$arr ['field'] [] = array ('tab' => 'form_first','type' => 'div_close' );

	if ($type == 'slider') {
		$arr ['field'] [] = array ('tab' => 'form_first','type' => 'div','class' => 'two fields' );
		$arr ['field'] ['min'] = array ('tab' => 'form_first','label' => 'Minimal','type' => 'input','value' => $min,'placeholder' => 0 );
		$arr ['field'] ['max'] = array ('tab' => 'form_first','label' => 'Maximal','type' => 'input','value' => $max,'placeholder' => 10 );
		$arr ['field'] ['unit'] = array ('tab' => 'form_first','label' => 'Einheit','type' => 'input','value' => $unit,'placeholder' => 'Tage' );
		$arr ['field'] ['class_color'] = array ('tab' => 'form_first','label' => 'Farbe','type' => 'dropdown','value' => $class_color,'array' => 'color' );
		$arr ['field'] ['class_ticked'] = array ('tab' => 'form_first','label' => 'Mit Rasterung','type' => 'checkbox','value' => $class_ticked );
		$arr ['field'] [] = array ('tab' => 'form_first','type' => 'div_close' );
	}

	if ($type == 'dropdown' or $type == 'radio') {
		$arr ['field'] ['array'] = array ('tab' => 'form_first','label' => 'Optionen','type' => 'textarea','value' => $value_list );
	}

	if (in_array ( $type, array ('input','dropdown','radio' ) )) {
		$arr ['field'] [] = array ('tab' => 'form_first','type' => 'div','class' => 'two fields' );
		$arr ['field'] ['value'] = array ('tab' => 'form_first','label' => "Value",'type' => 'input','value' => $value );
		$arr ['field'] ['placeholder'] = array ('tab' => 'form_first','label' => 'Platzhalter','type' => 'input','value' => $placeholder );
		$arr ['field'] [] = array ('tab' => 'form_first','type' => 'div_close' );
	}

	if ($type == 'checkbox') {
		$arr ['field'] ['default_value'] = array ('tab' => 'form_first','label' => 'Default','type' => 'checkbox','value' => $default_value );
	}

	if ($type == 'button') {
		$arr ['field'] ['value'] = array ('tab' => 'form_first','label' => 'Button-Text','type' => 'input','value' => $value );
	}
	
	
	if ($type != 'text') {
		$arr ['field'] ['validate'] = array ('tab' => 'form_first','label' => 'Validate','type' => 'checkbox','value' => $validate );
		$arr ['field'] ['help'] = array ('tab' => 'form_first','label' => 'Info-Feld','type' => 'input','value' => $help,'placeholder' => 'Infotext' );
	}

	if ($type == 'textarea') {
		$arr ['field'] ['rows'] = array ('tab' => 'form_first','label' => 'Hight','type' => 'dropdown','placeholder' => '','array' => array (2,3,4,5,6,7,8,10,11,12,13,14 ),'value' => $rows );
	}

	if ($type == 'text') {
		$arr ['field'] ['text'] = array ('type' => 'ckeditor','toolbar' => 'mini','value' => $text );
	}
}

$array_semgent_or_message2 = array ('segment' => 'Segment','message' => 'Infofeld' );
$array_segment_grade2 = array ('primary' => 'Primär','secondary' => 'Sekundär','tertiary' => 'Tertiär' );

if (! $segment_or_message) {
	$segment_or_message = 'segment';
}

$arr ['hidden'] ['update_id'] = $id;
$arr ['hidden'] ['type'] = $type;
$arr ['form'] = array ('action' => 'ajax/save_field.php','id' => "form_formular_field",'class' => 'small','inline' => true );

// $arr['buttons'] = array ( 'align' => 'center' );
$arr ['button'] ['submit'] = array ('value' => "Save",'color' => 'blue' );
$arr ['button'] ['close'] = array ('value' => "Cancel",'js' => "$('.ui.modal').modal('hide');" );

$output_form = call_form ( $arr );
echo $output_form ['js'];
echo $output_form ['html'];

