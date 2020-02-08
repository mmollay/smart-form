<?php
/**
 * ******************************************************************
 * Diese file wird in dem include_form.php bei File-Upload geladen
 * ******************************************************************
 */
$type_field .= "<input id='$id" . "_upload_dir' class='$form_id $class_input' name ='$id" . "_upload_dir' type='hidden' value='$upload_dir'>";
$type_field .= "<input id='$id" . "_upload_url' class='$form_id $class_input' name ='$id" . "_upload_url' type='hidden' value='$upload_url'>";

if (is_array ( $option )) {
	$options = json_encode ( $options );
} else
	$options = "{" . $options . "}";

$doc_root = $_SERVER ['DOCUMENT_ROOT'];

if (! $upload_dir) {
	echo "Parameter: 'upload_dir' is not defined!";
	return;
}

if ($accept) {
	// Erlaubte Endungen für das hochladen der Daten
	foreach ( $accept as $key => $value ) {
		$accept_files ['input'] .= ".$value,";
		$accept_files ['config'] .= "$value|";
	}
} else {
	$accept_files ['input'] = ".gif,.png,.jpg,.jpeg";
	$accept_files ['config'] = "gif|jpe?g|png";
}

if (! $thumbnail)
	$thumbnail = array ('max_width' => 200,'max_height' => 180 ); // 'crop' => true ,

// Dir zu zum anlegen, Speicher und löschen der der Files
$_SESSION ['upload_dir'] = $upload_dir;
// Url zum anzeigen der Bilder und Daten
$_SESSION ['upload_url'] = $server_name . $upload_url;

$_SESSION ['upload_config'] = array ('upload_url' => $_SESSION ['upload_url'],'upload_dir' => $_SESSION ['upload_dir'],'accept_file_types' => "/\.({$accept_files['config']})$/i",'image_versions' => array ('thumbnail' => $thumbnail ) );

/**
 * ************************************
 * BUTTON - FileUPLOAD
 * ************************************
 */
$set_button_upload ['color'] = '';
$set_button_upload ['icon'] = "<i class='icon plus'></i>";
$set_button_upload ['text1'] = 'Bild wählen';
$set_button_upload ['text2'] = 'Bilder wählen';

// Button erzeugen falls arr defeniert ist
if ($button_upload) {

	if (is_array ( $button_upload )) {

		if ($button_upload ['color'])
			$set_button_upload ['color'] = $button_upload ['color'];

		if ($button_upload ['icon']) {
			$set_button_upload ['icon'] = "<i class='icon {$button_upload['icon']}'></i>";
		}

		if ($button_upload ['text']) {
			$set_button_upload ['text1'] = $set_button_upload ['text2'] = $button_upload ['text'];
		}
	} else {
		$set_button_upload ['text1'] = $set_button_upload ['text2'] = $button_upload;
	}
}

if ($button_upload == 'hidden') {
	$style_button_upload = "style='display: none;";
}

/**
 * ********************************************************************
 * Aufrufen der FILES
 * ********************************************************************
 */
if (is_dir ( $_SESSION ['upload_dir'] )) {

	// Sortable - Files (Experiment) - Do not work right no - needs save "atcion" - Save inner db or file.txt
	if ($interactions ['sortable'] == true) {
		$_SESSION ['arr_cart'] ['sortable'] = true;
	} else
		$_SESSION ['arr_cart'] ['sortable'] = false;

	// Remove - Files
	if ($interactions ['removeable'] === false) {
		$_SESSION ['arr_cart'] ['removeable'] = false;
	} else {
		$_SESSION ['arr_cart'] ['removeable'] = true;
	}

	$_SESSION ['IgnoreFileList'] = array ('' );
	
	if ($handle = opendir ( $_SESSION ['upload_dir'] )) {
		$li_output = '';
		while ( false !== ($card_name = readdir ( $handle )) ) {
			++ $card_id;

			// Nur anzeigen wenn Datei kein DIR ist oder in der IgnoreFileList steht
			if (! in_array ( $card_name, $_SESSION ['IgnoreFileList'] ) && is_file ( "{$_SESSION['upload_dir']}/$card_name" )) {

				$card_list .= upload_card_admin ( $_SESSION ['upload_url'], $card_name, $card_id );

				// falls Liste erzeugt wird und ein Bild vorhanden ist, wird dieses gewählt und in das Hiddenfeld übergeben (singlemode)
				if ($card_name) {
					// $jquery .= "$('#$id').val('{$_SESSION['upload_url']}$card_name');";
					//$type_field .= "<input id='$id' class='$form_id' name ='$id' type='hidden' value='{$_SESSION['upload_url']}$card_name'>";
					$single_file_name = $card_name;
				}
			}
		}
		closedir ( $handle );
	}

	//     if (! $card_name)
	//         $type_field .= "<input id='$id' class='fist_file_upload $form_id' name ='$id' type='hidden' value=''>";
}

// Button nur anzeigen wenn nicht "hidden" gesetzt wurden
if ($mode == 'single') {
	$input_fileupload = "
        {$set_button_upload['icon']} {$set_button_upload['text1']}
        <input id='fileupload-$id' type='file' name='files[]' accept='{$accept_files['input']}'>
        <input id='$id' class='$form_id single_file_upload' name ='$id' type='hidden' value='$single_file_name'>
        ";
	// Es werden alle Bilder aus dem Folder gelöscht und das neue wird hochgeladen
	$fileupload_start = "del_folder();";
} else {
	$input_fileupload = "{$set_button_upload['icon']} {$set_button_upload['text2']}<input id='fileupload-$id' type='file' name='files[]' multiple accept='{$accept_files['input']}'>";
}

$str_set_button_upload = "<div class='column'><div $style_button_upload class='tooltip ui icon fluid {$set_button_upload['color']} button fileinput-button'>$input_fileupload</div></div>";

/**
 * ******************************************************
 * Erweiterung Webcam - html5
 * ******************************************************
 */
if ($webcam) {

	$button_webcam = "
	<div class='column'><div id='button-start-webcam'><div class='tooltip ui fluid visible button' title='Erstelle ein Bild mit der Webcam'><i class='icon green photo'></i>Webcam</div></div></div>
	<div class='ui popup' id = 'popup_container_webcam' >
	<div class='ui card' >
	<div class='content' id='container-webcam_text'>Bitte Freischaltung bestätigen</div>
    <div id='container-webcam'></div>
    <div class='ui green bottom attached button' id='take-snapshot'><i class='icon photo'></i>Foto machen</div>
  	</div></div>";

	// $str_webcam = "<br>Webcam<div id='container-webcam'></div><a style='display: none' class='button ui green' id='take-snapshot'><i class='icon photo'></i> Foto machen</a>";
	if (is_array ( $webcam )) {
		if (! $webcam ['width'])
			$webcam ['width'] = 640;
		if (! $webcam ['height'])
			$webcam ['height'] = 480;
	}
}

/**
 * ********************************************************************
 * Darstellungsart
 * ********************************************************************
 */

if ($mode == 'single') {
	$sub_header_text = '<br>Datei hineinziehen oder <b>HIER</b> klicken';
} else {
	$sub_header_text = '<br>Dateien hineinziehen oder <b>HIER</b> klicken';
}

if ($card_list)
	$style_dropzone = 'display:none;';
else {
	$style_dropzone = $dropzone ['style'];
}

$hide_dropzone = true;

if (! $hide_dropzone) {
	// Drop-Zone anzeigen wenn noch kein Inhalt vorhanden ist
	$updloadfile_cards = "
			<div style='cursor: pointer; $style_dropzone' id='message_empty_cards'>
			<h3 class='ui center aligned icon header grey'>
			<i class='circular folder open grey icon'></i>
			<div class='content fade well'>Drop-Zone<div class='sub header'>$sub_header_text<br><br></div></div>
			</h3>
			</div>";
}

// Container für die Bilder
$updloadfile_cards .= "<div class='ui $card_class doubling cards uploaded-cards'>" . $card_list . "</div>";

if ($button_upload == 'hidden' and ! $button_webcam) {
	$hidden_segment_button = $str_set_button_upload;
	$style_border_radius = 'border-radius:5px;';
} else {
	// $message_button = "<div class='ui attached fluid segment' style='border-top-left-radius:5px; border-top-right-radius:5px;'><div class='header'><div class='ui equal width grid'>$str_set_button_upload $button_webcam</div></div></div>";
	$message_button = "$str_set_button_upload ";
}

if ($view == 'default' or ! $view) {
	$type_field .= "
		$message_button	
		<div class='ui bottom basic fluid segment' style='$style_border_radius'>
		<div id='progress' style='display:none' class='ui indicating progress small'><div class='bar'><div class='progress'></div></div><div class='label'>Upload-Status</div></div>
		$hidden_segment_button
		$str_webcam
		$updloadfile_cards
		</div>
	";
}

/**
 * ********************************************************************
 * File - Sortable - Mode
 * ********************************************************************
 */

if ($interactions ['sortable'] == true) {
	$jquery .= "	
	 $( '.uploaded-cards' ).sortable({
		handle: '.button_move',
		tolerance: 'pointer',
		update     : function() { 
			var serial = $('.uploaded-cards').sortable('serialize');
			$.ajax({ url: smart_form_wp+'ajax/sort_save.php' , data : serial, type: 'post' });
		},
	});
 	$( '.uploaded-cards' ).disableSelection();";
}

/**
 * ********************************************************************
 * JQUERY - FileUpload
 * ********************************************************************
 */
$jquery .= "

$('.uploaded-cards .image').dimmer({ on: 'hover' });

$( '#message_empty_cards' ).click(function() {
	$('#fileupload-$id').trigger('click');
});

$('#progress').hide();

if ($('.uploaded-card').length == 0 ) $('#message_empty_cards').show();	

$('#fileupload-$id').fileupload({
	url : smart_form_wp+'jquery-upload/server/php/',
	dataType: 'json',
	autoUpload : true,
	disableImageResize : /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
	dropZone: $('.uploaded-cards, #message_empty_cards'),
	start: function () {
		$fileupload_start
		$('#progress').show();
	},
	done: function (e, data) {
		$.each(data.result.files, function (index, file) {
			if (file.url) {
				add_file (file.name);
				$('#$id').val('{$_SESSION['upload_url']}'+file.name);
				$('#message_empty_cards').hide();
			} else if (file.error) {
			}
		});
		{$ajax_success}
		$('#progress').delay( 1000 ).fadeOut('slow');
		//$('#progress').progress({ percent: 0 });
		setTimeout( function()  { $('.uploaded-cards .image').dimmer({ on: 'hover' }); }, 500);
	},
	progressall: function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$('#progress').progress({ percent: progress });
	},

},$options);";

/**
 * **********************************************************************
 * JQUERY - Webcam
 * **********************************************************************
 */
if ($webcam) {

	$jquery .= "
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );";

	$jquery_save .= "
		var sayCheese = new SayCheese('#container-webcam', { snapshots: true, width:300 });
	
	sayCheese.on('start', function() {
		//$('#take-snapshot').show();
		//this.takeSnapshot();
		$('#container-webcam_text').remove();
	});
	
	sayCheese.on('error', function(error) {
		// handle errors, such as when a user denies the request to use the webcam,
		// or when the getUserMedia API isn't supported
		$('#container-webcam_text').html('Der Browser unterstützt diese Funktion nicht.<br>Funktionierdende Browser:<br>Firefox, Chorme & Opera');
	});
	
	sayCheese.on('snapshot', function(snapshot) {
	
		var data = snapshot.toDataURL();
	
		$.ajax( {
			url      : smart_form_wp+'ajax/add_file.php',
			global   : false,
			async    : false,
			type     : 'POST',
			data     : ({ imageData : data }),
			dataType : 'html',
			success :  function (data) {
				$(data).appendTo('.uploaded-cards');
				$('.tooltip').popup();
				$('#message_empty_cards').hide();	
				ion.sound({ sounds: [{name: 'camera_flashing'}], path: smart_form_wp+'js/ion.sound/sounds/', preload: true, volume: 1.0 });
				ion.sound.play('camera_flashing');
				$('#container-webcam').transition('pulse');
			}
		});
	});
	
	$('#take-snapshot').click( function () { 
		var width = {$webcam['width']}, height = {$webcam['height']};
		sayCheese.takeSnapshot(width, height);
	});
	
	$('#button-start-webcam').popup({ popup : $('#popup_container_webcam'), on  : 'click' });
	
	$('#button-start-webcam').click(function() {
		if ($('#container-webcam_text').html()) sayCheese.start();
	});
	
";
}

