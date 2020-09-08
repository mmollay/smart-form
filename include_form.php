<?php
/*
 * --------------------------------------------------------------------------------------------------------
 * | SMART - FORM (ssi-Product)
 * | Form-Generator: Using Semantic-UI Library
 * | 06.09.2020 - mm@ssi.at
 * | Version 2.x
 * --------------------------------------------------------------------------------------------------------
 */
session_start ();

// Function call Formular
function call_form($arr) {
	date_default_timezone_set ( 'Europe/Vienna' );

	if (! is_array ( $arr )) {
		return "Form is not defined";
		exit ();
	}

	$dataType = "script";

	if ($arr ['form'] ['inline'])
		$inline = $arr ['form'] ['inline'];
	if ($arr ['ajax'] ['dataType'])
		$dataType = $arr ['ajax'] ['dataType'];

	// FORM - ID
	if ($arr ['form'] ['id']) {
		$form_id = $arr ['form'] ['id'];
		// Automatische Vergabe der ID
	} else {
		$form_id = 'smartForm' . ++ $GLOBALS ['ii'];
	}
	$data .= "\n\t\t form_id : '$form_id',"; // Wird auch übergeben und jquery-requests anpassen zu können (Bsp.: Messages)

	if ($arr ['sql'] ['query']) {

		$mysql_query = $GLOBALS ['mysqli']->query ( $arr ['sql'] ['query'] ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
		$mysql_array = mysqli_fetch_array ( $mysql_query );

		if ($arr ['sql'] ['key']) {
			$sql_key ['value'] = $mysql_array [$arr ['sql'] ['key']];
		} else
			// Wird automatisch genommen (erstes Feld)
			$sql_key ['value'] = $mysql_array [0];
	}

	// Default - Field ID
	$field_id = 100;

	if ($arr ['field']) {

		foreach ( $arr ['field'] as $key1 => $value1 ) {

			// Sollte keine ID vergeben worden sind wird eine erzeugt
			if (! $key1) {
				$field_id ++;
				$id = 'field-' . $field_id;
			} else if (! is_int ( $key1 ))
				$id = $key1;
			// Id darf keine Zahl sein, sonst wird diese erweitert durch field-
			else if (is_int ( $key1 )) {
				$id = 'field-' . $key1;
			}

			// ID - kann auch manuell gesetzt werden Bsp.: $arr['field']['domain']

			// if ($key1)

			foreach ( $value1 as $key2 => $value2 ) {
				${$key2} = $value2;
			}

			if ($read_only)
				$read_only = 'read-only';

			if ($disabled) {
				$disabled = "disabled='disabled' ";
			}

			// Jquery - Focus
			if ($focus) {
				if ($type == 'select' or $type == 'multiselect') {
					$jquery_focus = "$('#dropdown_$id').delay(800).focus(); ";
				} else
					$jquery_focus = "$('#$id').delay(800).focus(); ";

				$focus = '';
			}

			if ($arr ['value'] [$id])
				$value = $arr ['value'] [$id];

			if ($value === '0000-00-00')
				$value = '';
			if ($value_default && ! $value)
				$value = $value_default;

			$value_default = '';

			if (isset ( $mysql_array [$id] ) && ! $value) {
				// Auslesen der Werte aus der Datenbank
				// Wenn value nicht manuel gesetzt ist wird dieser aus der Datenbank genommen
				$value = $mysql_array [$id];
			}

			if (! is_array ( $value )) {
				// Macht Übergabe für Sonderzeichen in Inputfelder und Co möglich
				// $value = htmlspecialchars ( $value );
				$value = htmlspecialchars_decode ( $value );
			}

			// Infotext in einen popup
			if ($info) {
				// $info_tooltip = "<span data-tooltip='$info' ><i class='icon help circle tooltip grey'></i></span>";
				$info_tooltip = "<span title='$info' class='tooltip' ><i class='icon help circle grey'></i></span>";
			}

			if ($label === ' ')
				$label = '&nbsp;'; // Zeigt ein unsichbares Label an

			// Wird momentan in Dropdown eingesetzt
			if ($arr ['form'] ['size'] == 'massive')
				$option_style = 'font-size:22px';
			elseif ($arr ['form'] ['size'] == 'huge')
				$option_style = 'font-size:20px';
			elseif ($arr ['form'] ['size'] == 'big')
				$option_style = 'font-size:18px';
			elseif ($arr ['form'] ['size'] == 'large')
				$option_style = 'font-size:16px';
			elseif ($arr ['form'] ['size'] == 'small')
				$option_style = 'font-size:14px';
			elseif ($arr ['form'] ['size'] == 'tiny')
				$option_style = 'font-size:14px';
			elseif ($arr ['form'] ['size'] == 'mini')
				$option_style = 'font-size:12px';
			else
				$option_style = '';

			$onchange = preg_replace ( "/{id}/", $id, $onchange );

			if (file_exists ( __DIR__ . "/include/form/$type.php" ))
				include (__DIR__ . "/include/form/$type.php");
			elseif (in_array ( $type, array ('toggle','checkbox' ) ))
				// TOGGLE , CHECKBOX
				include (__DIR__ . "/include/form/checkbox.php");
			elseif ($type == 'explorer' or $type == 'finder')
				include_once (__DIR__ . "/include/form/finder.php");
			// INPUT,DATE, TIME
			elseif (in_array ( $type, array ('input','date','time' ) ))
				include (__DIR__ . "/include/form/input.php");
			// SELECT, MULTISELECT
			elseif ($type == 'dropdown' or $type == 'select' or $type == 'multiselect')
				include (__DIR__ . "/include/form/dropdown.php");

			/**
			 * **********************************************************************************************************
			 * END INPUTS and more
			 * **********************************************************************************************************
			 */

			if (is_array ( $rules ) or $validate) {
				$required = 'required';
			}

			// segment
			if ($segment) {
				if ($segment === true)
					$segment = '';
				$segment = "segment ui $segment";
				// message
			} elseif ($message) {
				if ($message === true)
					$message = '';
				$message = "message ui $message";
			}

			if (in_array ( $type, array ('hidden','tab','accordion','div','div_close','header' ) )) {
				$field .= $type_field;
			} else {

				/**
				 * *******************
				 * Field - Begin
				 * *******************
				 */
				//style='border:1px solid red;' 
				$field_div = "\n<div  id='row_$id' class='field row_field $required $class $segment $message'>";
				if ($label) {
					if ($label === true)
						$label = "&nbsp;";
					$field_div .= "<label class='$form_id label {$label_class}' id='label_$id'>$label $info_tooltip <span class='check_message'></span> $add_label_content</label>";
				}
				if (($type == 'input') and $label_right) { // Label im Input Right
					if ($label_right_click)
						$add_label_click = "onclick=\"$label_right_click\"";

					if ($label_right_tooltip)
						$add_label_right_tooltip = "data-tooltip='$label_right_tooltip'";

					if ($label_left_tooltip)
						$add_label_left_tooltip = " data-tooltip='$label_left_tooltip'";

					if (! $label_right_id)
						$label_right_id = "label_right_$id";

					$field_div .= "<div class='ui right labeled input'>$type_field<div id='$label_right_id' class='ui label $label_right_class' $add_label_click $add_label_right_tooltip>$label_right</div></div>";
				} else if (($type == 'input') and $label_left) { // Label im Input Left
					if ($label_left_click)
						$add_label_click = "onclick=\"$label_left_click\"";
					$field_div .= "<div class='ui left labeled input'><div id='label_left_$id' class='ui label $label_left_class' $add_label_click $add_label_left_tooltip>$label_left</div>$type_field</div>";
				} else if (($type == 'select' or $type == 'multiselect') and $label_right) { // Label im Input Right
					$field_div .= "<div class='ui right labeled input'>$type_field<div id='label_left_$id' class='ui label $label_right_class' $add_label_right_tooltip>$label_right</div></div>";
				} else if (($type == 'select' or $type == 'multiselect') and $label_left) { // Label im Input Left
					$field_div .= "<div class='ui labeled input'><div class='ui label'>$label_left</div>$type_field</div>";
				} else
					$field_div .= $type_field;

				$field_div .= $footer;
				$field_div .= "</div>";
			/**
			 * *******************
			 * Field - End
			 * *******************
			 */
			}

			if (! $grid) {
				$field .= $field_div;
			} else {

				//Übergabe an grid
				$grid_content [$grid] = $field_div;
			}

			$grid = '';
			$field_div = '';

			if ($type_field2) {
				$field .= "<div class='$required $class field'>";
				$field .= $type_field2;
				$field .= "</div>";
			}

			// Short - Version for valtiation
			if ($type == 'smart_password') {
				$valitation .= "'$id': { identifier: '$id', rules: [{ type: 'empty', prompt: 'Bitte Passwort eingeben'},{ type: 'length[8]', prompt: 'Das Passwort muss min. 8 Zeichen haben'},{ type:'containsNumbers', prompt: 'Passwort muss eine Zahl beinhalten' }] },";
				$valitation .= "'{$id}_repeat': { identifier: '{$id}_repeat', rules: [{ type: 'empty', prompt: 'Bitte Passwort eingeben'},{ type: 'match[$id]', prompt: 'Passwort stimmt nicht überein'}] },";
				$jquery .= "$.fn.form.settings.rules.containsNumbers = function(value){ var regex = new RegExp('[0-9]'); return regex.test(value); }";
			} else if ($validate == true) {
				if (in_array ( $type, array ('toggle','checkbox','slider' ) )) {
					$val_type = 'checked';
				} else {
					$val_type = 'empty';
				}

				if ($validate === true)
					$validate = 'empty';

				if (! $prompt)
					$prompt = 'Eingabe überprüfen';

				// Wenn mehr als 1 type gewählt wird, dann wird "empty" verwendet und
				if (str_word_count ( $validate ) > 1) {
					$prompt = "$validate";
					$validate = 'empty';
				}

				if ($id) {
					if ($validate == 'empty') {
						if ($type == 'radio')
							$val_type = 'checked';
						$valitation .= "'$id': { identifier: '$id', rules: [{ type: '$val_type', prompt: '$prompt'}] },";
					} elseif ($validate) {
						$valitation .= "'$id': { identifier: '$id', rules: [{ type: '$validate', prompt: '$prompt'},{ type: 'empty', prompt: '$prompt'}] },";
					}
				}
			}

			// Complex version with a lot of possibilties
			if (is_array ( $rules )) {
				$valitation_rules = json_encode ( $rules );
				$valitation .= "'$id': { rules: $valitation_rules },";
			} elseif ($rules) {
				$valitation .= "'$id': '$rules',";
			}

			if ($type == 'date') { // $('#$id').calendar('get date')
				$add_data .= "data.push({ name: '$id', value: change_calendar_data( $('#$id').calendar('get date') )  });";
			} else if ($type == 'radio') {
				// $data .= "\n\t\t '$id' : $('.$id:checked.$form_id').val(),";
				$add_data .= "data.push({ name: '$id', value: $('.$id:checked.$form_id').val() });";
			} else if ($type == 'recaptcha') {
				// Google captcha
				// echo 'g-recaptcha-response';
				// $data .= "\n\t\t 'recaptcha' : $('#g-recaptcha-response').val(),";
				$add_data .= "data.push({ name: 'recaptcha', value: $('#g-recaptcha-response').val() });";
			} else if ($type == 'ckeditor_inline') {
				// INLINE - CKEDITOR with DIV
				// $add .= "\n\t\t '$id' : $('#$id.$form_id').html(),";
			} elseif ($type == 'ckeditor5') {
				$add_data .= "data.push({ name: '$id', value: myEditor_$id.getData() });";
			} elseif ($id) {
				// Input, Textarea
				// $data .= "\n\t\t '$id' : $('#$id.$form_id').val(),";
			}

			// Tab
			if (is_array ( $arr ['tab'] ) and $tab) {
				$tab_field [$tab] .= $field;
				$tab = '';
				// Reguler
			} else {
				$set_field .= $field;
			}
			$field = '';

			$add_label_content = '';
			$data_html = "";
			$icon = "";
			$min = '';
			$max = '';
			$step = '';
			$toolbar = '';
			$message = '';
			$segment = '';
			$text = '';
			$size = '';
			$add_class = '';
			$id = '';
			$value = '';
			// unset($placeholder);
			$placeholder = '';
			$label = '';
			$type_field = '';
			$type = '';
			$required = '';
			$class = '';
			$rules = '';
			$validate = '';
			$valitation_rules = '';
			$date = '';
			$read_only = '';
			$prompt = '';
			$val_type = '';
			$type_field2 = '';
			$disabled = '';
			$class_input = '';
			$label_right = '';
			$label_left = '';
			$label_left_class = '';
			$label_left_click = '';
			$footer = '';
			$info_tooltip = '';
			$info = '';
			$onclick = '';
			$format = '';
			$options = '';
			$rows = '';
			$style = '';
			$onchange = '';
			$column = '';
		}
	} else {
		$field = "<h4 class='header ui'>Keine Felder definiert</h4>";
	}

	if ($arr ['button']) {
		// if (!is_array($arr['tab'])) $buttons = "<br>";
		$buttons .= "<div class='actions'><div class='field {$arr['buttons']['class']}' align='{$arr['buttons']['align']}' id='{$arr['buttons']['id']}'>";
		foreach ( $arr ['button'] as $key => $value ) {
			foreach ( $value as $key2 => $value2 ) {
				$$key2 = $value2;
			}

			if ($value) {
				if ($js)
					$set_onclick = "onclick=\"$js\" ";
				elseif ($onclick)
					$set_onclick = "onclick=\"$onclick\" ";

				if ($info)
					$add_class = 'tooltip';
				else
					$add_class = '';
				if ($type == 'submit' or $id == 'submit')
					$type = 'submit';
				else
					$type = '';

				if ($icon) {
					$icon = "<i class='icon $icon'></i> ";
					$class = "icon $class";
				}
				if ($tooltip)
					$tooltip = "data-tooltip='$tooltip'";
				$buttons .= "<div $tooltip class='ui $color $class button $form_id $key $add_class {$arr['form']['size']}' type='$type' id='$id' $set_onclick >$icon$value</div>";
				$id = '';
				$onclick = '';
				$type = '';
				$js = '';
				$tooltip = '';
				$icon = '';
			}
			$color = '';
			$class = '';
		}

		$buttons .= '</div></div>';
	}

	// print_r($arr_accordion_close);

	$hidden = '';
	// HIDDEN
	if ($arr ['hidden']) {
		foreach ( $arr ['hidden'] as $key => $value ) {
			$hidden .= "\n\t<input type=hidden name='$key' id='$key' value='$value' >";
			$data .= "\n\t\t $key : '$value' ,";
		}
	}

	// Hidden Field for db
	if ($sql_key ['value']) {
		$hidden .= "<input type=hidden name='update_id' id='update_id' value='{$sql_key['value']}' >";
		$data .= "\n\t\t update_id : '{$sql_key['value']}',";
	}

	// Default
	// $button_submit = 'Speichern';
	$button_reset = 'Abbrechen';
	$message_success = 'Speicherung war erfolgreich';

	if ($arr ['message'] ['success']) {
		$message_success = $arr ['message'] ['success'];
	}

	if ($arr ['button'] ['reset']) {
		$button_reset = $arr ['button'] ['reset'] ['value'];
	}

	// BREITE der Formulares
	if ($arr ['form'] ['width']) {
		$form_style = "max-width:{$arr['form']['width']}px;";
	}

	if ($arr ['header']) {
		if ($arr ['header'] ['icon']) {
			$add_header_icon = "<i class='{$arr['header']['icon']} icon'></i>";
			$add_header_icon_class = 'icon';
		}
		$output_form_open_header = "
		<div class='ui top $add_header_icon_class {$arr['header']['segment_class']}'>
			$add_header_icon
			<div class='content'>
				<div class='ui header {$arr['header']['class']}'>
					{$arr['header']['title']}
				</div>
			{$arr['header']['text']}
			</div>
		</div>";
	}

	if ($arr ['footer']) {
		$output_form_open_footer = "<div class='ui bottom {$arr['footer']['segment_class']}'>{$arr['footer']['text']}</div>";
	}

	// Form wird nur angezeigt wenn arr['form'] definiert worden ist
	if (is_array ( $arr ['form'] ) || is_array ( $arr ['ajax'] )) {
		if ($arr ['form'] ['align'])
			$output_form_open .= "<div align='{$arr['form']['align']}'>";

		$output_form_open .= "<div style='text-align:left; $form_style'>";
		$output_form_open .= $output_form_open_header;
		$output_form_open .= "<form id='$form_id' name ='$form_id' class='ui $segment_attached {$arr['form']['class']} {$arr['form']['size']} form'>";
		// wird benötigt wenn 'dataType' => html ist, wird bsp.: "ok" übergeben
		if (! $GLOBALS ['data_value']) {
			$output_form_close .= "<input id='data' name='data' type='hidden'>";
			$GLOBALS ['data_value'] = true;
		}
		$output_form_close .= "</form>";
		$output_form_close .= $output_form_open_footer;
		$output_form_close .= "</div>";

		if ($arr ['form'] ['align'])
			$output_form_close .= "</div>";
	}

	// if ($arr['header']) {
	// $output_form_close .= "</div></div>";
	// }

	/**
	 * ******* Auflistung Der Felder, wenn eingestellt mit TAB *****************
	 */

	$output_content .= $output_form_open;

	// Tab
	if (is_array ( $arr ['tab'] )) {

		// Darstellungsart TAB
		$tab_class = $arr ['tab'] ['class'];

		$content_class = $arr ['tab'] ['content_class'];
		if (! $tab_class) {
			$tab_class = "top attached";
			$content_class = "bottom attached $content_class";
		}

		foreach ( $arr ['tab'] ['tabs'] as $tab_key => $tab_value ) {
			if (! $arr ['tab'] ['active'])
				$arr ['tab'] ['active'] = 'first';
			if ($arr ['tab'] ['active'] == "$tab_key")
				$tab_active = 'active';
			else
				$tab_active = '';

			if ($content_class != 'basic') {
				$set_segment = 'segment ';
			}

			// Anzeigen wenn content vorhanden ist
			if ($tab_field [$tab_key]) {

				$tab_title .= "\n<a class='$tab_active item' id='$tab_key' data-tab='$tab_key'>$tab_value</a>";
				$tab_content .= "\n<div class='ui $set_segment tab $form_id {$arr['form']['size']} $content_class $tab_active' data-tab='$tab_key'>{$tab_field[$tab_key]}</div>";
			}
		}

		$output_content .= "<div id='tabgroup_$form_id'><div class='ui $tab_class tabular menu {$arr['form']['size']}'>$tab_title</div>$tab_content<div></div></div>";
		if ($content_class == 'basic') {
			$output_content .= "<br>";
		}

		if (! is_array ( $arr ['tab'] ))
			$output_content .= "<br>"; // Zeilenumbruch wenn TAB mit Einfassung verwendet wird (also keine spzifische Darstellung)

		$jquery .= "$('#tabgroup_$form_id .menu .item').tab();";
	}

	$output_content .= $set_field;

	if ($inline == 'list') {
		$output_content .= "<div style='text-align:left;' class='ui error message'></div>";
		$inline = '';
	}
	$output_content .= $buttons;
	$output_content .= $hidden;
	$output_content .= $output_form_close;

	/**
	 * **************************************************************************
	 */

	if (! $arr ['form'] ['keyboardShortcuts']) {
		$keyboardShowtcuts = "keyboardShortcuts : false,";
	} else
		$keyboardShowtcuts = "";

	$output ['html'] = $output_content;

	// Uebergibt POST/GET als json
	if ($arr ['ajax'] ['dataType'] == 'json') // json_stringify
		$json_stringify = 'JSON.stringify';

	// Standardmässig wird Form aufgerufen
	if ($arr ['form'] ['action'] !== false) {

		if (! $arr ['form'] ['action']) {
			$arr ['form'] ['action'] = $_SERVER ['PHP_SELF'];
		}

		if ($arr ['ajax'] ['xhr']) {
			$add_xhr = "
 			xhr: function(){
				var xhr = $.ajaxSettings.xhr();
				xhr.onprogress = function(e){
					data = e.currentTarget.responseText.substr(responseLen);
					responseLen = e.currentTarget.responseText.length;
					{$arr['ajax']['xhr']}
				};
				return xhr;
			},";
		}

		$add_function_submit .= "
						
		function submitForm_$form_id() {
		 var responseLen = 0;
		 var data = $('#$form_id').serializeArray();
		 $add_data
		 
		  $.ajax({
		    type: 'POST',
		    global   : false,
		    url: '{$arr['form']['action']}',
		    data: data,
		    dataType: '$dataType',
		    $add_xhr
		    beforeSend: function(){
		    	{$arr['ajax']['beforeSend']}
		    	$('#$form_id').attr('class','ui loading form $form_id {$arr['form']['size']} {$arr['form']['class']}');
			},
		    success: function(data){
		    	$('#$form_id').attr('class','ui form $form_id {$arr['form']['size']} {$arr['form']['class']}');
				$('.message .close').on('click', function() {
	  				$(this).closest('.message').fadeOut();
				});
				{$arr['ajax']['success']}
			}
		  });
		  return false;
		}
		";
	} // Wenn "'action' => false" wird nur success auf aufgerufen
	else {
		$add_function_submit .= "function submitForm_$form_id() {  {$arr['ajax']['success']} return false; }";
	}

	$output ['js'] .= "<script>";
	$output ['js'] .= "
					
		function change_calendar_data(date){
			date1 = new Date ( date );
			date = date1.getDate();
			year = date1.getFullYear();
			month = date1.getMonth()+1;
			return year+'-'+month+'-'+date;
		}
		
		
		function get_icon(id,icon) {
			var icon = icon.replace('+', ' ');
			$('#button_icon_'+id).attr('class',icon+' large icon');
			$('#'+id).val(icon).change();
			$('.tooltip-click').popup('hide');
		}
		
	  	$(document).ready(function() {
	  	
			//$('.link.remove.icon').hide();
			//versteckt 'x' bei den Inputs wenn kein Eintrag vorhanden ist
			$('.ui-input').each(function () {
				if ($(this).val()) $('.link.remove.icon#icon_'+$(this).attr('id')).show();
				else  $('.link.remove.icon#icon_'+$(this).attr('id')).hide();
			});
			
			$('.ui-input').change( function(){
				if (!$(this).val())
					$('.link.remove.icon#icon_'+$(this).attr('id')).hide();
				else
					$('.link.remove.icon#icon_'+$(this).attr('id')).show();
			})
			
			
			$('.ui.accordion').accordion();
			$('.ui.accordion').accordion({ onOpen: function (item) {  $('.modal').modal('refresh'); } });
			//$('.tooltip').popup({ position:'right center' });
			$('.tooltip').popup();
			$('.tooltip-right').popup({ position:'right center' });
			$('.tooltip-top').popup({ position:'top center' });
			$('.tooltip-left').popup({ position:'left center' });
			$('.tooltip-click').popup({ on: 'click' });
			
			
	  		$jquery
	  		
		  	$('#$form_id.ui.form').form({
		  		fields: { $valitation },
		  		inline: '$inline',
		  		transition: 'fade down',
		  		$keyboardShowtcuts
		  		onSuccess: submitForm_$form_id
			});
			$jquery_focus
			{$arr['ajax']['onLoad']}
		});
		$add_function_submit";
	$output ['js'] .= "</script>";

	return $output;
}

include_once (__DIR__ . '/functions/filelist.php');