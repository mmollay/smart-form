<?php
/*
 * --------------------------------------------------------------------------------------------------------
 * | SMART - FORM (ssi-Product)
 * | Form-Generator: Using Semantic-UI Library
 * | 08.02.2020 - mm@ssi.at
 * | Version 2.x
 * --------------------------------------------------------------------------------------------------------
 */
/*
 * ******************************************************************************************
 * SETTINGS
 * ******************************************************************************************
 */
/**
 * header (Bsp.: $arr['header'] = array ( 'text' => "Formular",'class' => ' grey' );
 * : 'class=> 'grey dividing' //dividing = 'Unterstrich
 * : 'segment_class'=> 'tertiary inverted red segment'; (Bsp.: Hintergrundfarbe rot in dritter Stufe
 * : 'segment_class'=> 'basic' //segment ist ausgeblendet
 * : 'text'=> 'Überschrift'
 *
 * form
 * : 'id' => 'form_name'
 * : 'width' => '600'
 * : 'align' => 'center'
 * : 'action' => 'handler.php' || FALSE //Default wirdf die gleiche Datei aufgerufen
 * : 'class' => 'segment', //Size oder andere Parameter können ebenfalls hier verwendet werden
 * : name => '',
 * : 'inline' => false, true, list (Verification - Kommentare werden nicht angezeigt)
 * : 'dataType' => json, //übergibt POST/GET als Json
 * : keyboardShortcuts => true //Enter führt das Form aus
 *
 * ajax
 * : 'success' => 'after_submt()'
 * : '-> table_reload(); //Load Table after submit the script
 * : '-> location.reload(); //Ladet Seite neu
 * : 'beforeSend' => 'before_send()'
 * : 'onLoad' => 'before_load()',
 * : 'dataType' => "html" | "json" | "script" (zur Weiterverwertung Request vom Server zu Ajax verwende "data" Bsp.: alert( data );
 *
 * value
 * : array ('value1' => '1', 'value1' => '2'); //Werte werden, wenn vorhanden als Value in das Form eingebunden
 *
 * finder //Globale Einstellungen für den Explorer
 * : 'onchange' => "alert('test');" //Bsp.: Speichern nach Eingabe save_value_element('$update_id',this.id,$('#'+this.id).val());
 *
 * html
 * :text (value) => '<div>' //wenn nur html code ohne "field" eingebunden werden soll
 *
 *
 * sql
 * : 'query' => "SELECT * FROM test where id = '21'"
 * : key => 'id' (Optional - Wenn leer dann wird das erste Feld automatisch genommen)
 *
 *
 * FIELDS************************************************************************************
 *
 * 'field' => [tab]
 * : 'tabs' => arr('first' => 'tab1, 'second' => 'tab2')
 * : 'active' =>'first'
 * : 'class' => 'pointing secondary red' | 'secondary red' // Default: top attached
 * : content_class'=>"secondary red inverted", 'basic' = 'keine Darstellung von Rahmen
 * : 'close' => true
 *
 * 'field' => [accordion]
 * : 'title' =>'ACC1';
 * : 'active' =>'first' //by default thia accordion is open
 * : 'class' => 'pointing secondary red' | 'secondary red' // Default: top attached
 * : content_class'=>"secondary red inverted", 'basic' = 'keine Darstellung von Rahmen
 * : 'close' => true*
 *
 * 'field' => [header]
 * : 'placeholder' => 'Vorname'
 * : 'value' => 'wert'
 * : 'value_default' => 'wert' //Wenn leer ist wird dieser Wert genommen
 * : 'validate' => true | email | number,.... (http://semantic-ui.com/behaviors/form.html#/examples)
 * : prompt => 'Bitte Eingabe machen'; //bei Validate Text für Beschreibung bei Fehler
 * : rules => array ( [ 'type' => 'email' , prompt => 'Email angeben' ],[ 'type' => 'max[6]' , prompt => 'Min. 6 Zeichen angeben' ],[ 'type' => 'max[6]' , prompt => 'Min. 6 Zeichen angeben' ] )
 * : rules => 'empty' //Schnelle Version
 * : 'disabled' => true
 * : read_only = true
 * : class => four wide (one, two, three, ... sixten)
 * : 'info' => 'Infotext für jeweiliges Eingabefeld'
 * : 'label' => 'Bezeichnung', (oder "true" - Wird ohne Text angezeigt aber die Inhalt mit "leer" befüllt ( damit Feld in der richtigen Postion erscheint
 * : segment => true; or 'red,...' (http://semantic-ui.com/elements/segment.html
 * : 'message' => true; or 'red,...'
 *
 * * 'field' => [header]
 * : 'text' => 'Überschrift'
 * : 'size' => '4' (h1-h6)
 * : 'class' => 'dividing red large' (Unterstrichen, gross, rot)
 *
 * 'field' =>[uploader]
 * : upload_dir => '/uplaod/'; //Immer absoluten Pfad angeben
 * : upload_'url' => 'upload/';
 * : options => array (imageMaxWidth => 1000, imageMaxHeight => 1000) Bsp.: verkleinert das Bild schon Clientseitig auf die gewünschte Grösse - verhindert Ladezeiten
 * : card_class =>'four stackable' //Darstellung
 * : mode => 'single | multi' Default is 'multi'
 * : '-> server_name => 'https://center.ssi.at' //übergibt einen gesamten Pfad bei Submit sonst verweist er auf den eigenen Server - gilt vorerst nur im Singlemode
 * : ajax_ 'success' => "$('#key').focus();
 * : button_upload => "Foto zum Hochladen auswählen";
 * : button_upload => array('text'=>"Foto zum Hochladen auswählen", 'color' => 'red', 'icon' => 'upload' );
 * : button_upload => 'hidden'
 * : accept' => array('png','jpg','jpeg') //Defaut - 'png','jpg','jpeg','gif'
 * : thumbnail => array ( 'crop' => true , 'max_width' => 100 , 'max_height' => 100 ) //Default array ( 'crop' => true , 'max_width' => 200 , 'max_height' => 200 )
 * : webcam => array('width'=>'800','height'=>'600') | true (default 640x480)
 * : dropzone => array('style'=>'height:100px;')
 * : interactions => array('removeable=>false,'sortable'=>true); //default removeable => true, sor'table' => false
 *
 * 'field' =>[gallery] //Zeigt eine Gallery
 * : file_dir => '/upload/';
 * : file_'url' => 'upload/';
 * : card_class =>'four stackable'
 * : accept' => array('png','jpg','jpeg')
 * : thumbnail => array ( 'crop' => true , 'max_width' => 100 , 'max_height' => 100 )
 *
 * 'field' => [ckeditor]
 * : 'config' => ""
 * `-> //autosave "on: { instanceReady: function() { var buffer = CKEDITOR.tools.eventsBuffer( 5000, function() { $.ajax({ url: 'inc/save_nl_content.php', type :'POST' , data: ({ id : '{$_POST['update_id']}', text : $('#text').val() }) }); } ); this.on( 'change', buffer.input ); } }";
 *
 * 'field' => [ckeditor_inline] //using just inner div
 * : 'config' => "";
 * `-> //autosave "on: { instanceReady: function() { var buffer = CKEDITOR.tools.eventsBuffer( 5000, function() { $.ajax({ url: 'inc/save_nl_content.php', type :'POST' , data: ({ id : '{$_POST['update_id']}', text : $('#text').val() }) }); } ); this.on( 'change', buffer.input ); } }";
 *
 * : 'toolbar' =>'basic' | 'mini' | 'simple'
 * :
 * 'field' => [color] //colorpicker
 *
 * 'field' => [icon] Auswahl der semantic-ui Icons
 * : array_'icon' => array('search','tags') //optional setting
 *
 * 'field' => ['toggle' , 'checkbox' , 'slider']
 * : 'onchange' => alert( $(this).val() ) ;
 * : 'label' => 'Text neben checkbox'
 * : label_'text' => 'Titel der checkbox'
 * : class_input => 'no_auto_save',
 *
 * 'field' => [button]
 * : 'class' => 'red'
 * : 'class_button' => 'fluid red' //gesamte Breite
 * : 'onclick' => 'alert('test');
 * : 'onclick' => 'window.open('index.php')';
 * : 'onclick' => '$('#form_name.ui.form').submit()'; //Sumit - Formular
 * : 'tooltip' => 'Kicke um weiter zu kommen';
 * : 'value' or 'text' => 'Button-text'
 *
 * 'field' => [input]
 * : 'label_right' => ".html"; (id='label_left_$id')
 * : 'label_right_class' => "button"
 * : 'label_right_id' => "id"
 * : 'label_right_tooltip' => "Mehr Info zum Element"
 * : 'label_right_click' => "alert('test');" //window.location.replace("http://stackoverflow.com"); //window.open("file2.html"); - New window
 * : 'label_left' => "http://"; (id='label_right_$id')
 * : 'label_left_class' => "button"
 * : 'label_left_id' => "id"
 * : 'lable_left_click' => "alert('test');"
 * : 'label_left_tooltip' => "Mehr Info zum Element"
 * : 'focus' => true (dropdown multiselect with class "search" doesn't work)
 * : 'icon' => time
 * : 'search' => true //DEVELOP muss noch in den Funktionen vervollständigt werden (Bsp. Faktura -> issues -> form)
 * $('.ui.search.text').search({ apiSettings: { url: 'inc/search_list.php?q={query}' }, minCharacters : 2, onSelect : function(result,response){ $('#text').val(result['description']); } });
 *
 * : 'class_input' => 'autosave' Erweitert das Inputfeld mit einer classe //Bsp.: Wenn gewisse Felder mit Autosave gespeichert werden sollen
 * : 'icon_position' => left(default) OR right
 * : 'format' => 'euro',dollar,percent,%
 * : 'time' => true (old version)
 * : 'clearable' => true //zeigt einen Button zu löschen des Inhaltes an
 *
 * 'field' => [slider]
 * : min=>0
 * : max=>1000
 * : step=>10
 * : unit=>'Tagen'
 * : slide=>alert(ui.value) //call after slide
 * : hide_number=>true //Disable the value (int)
 *
 *
 *
 * 'field' => ['time'](new version)
 * : 'option'=>"format: 'H:mm' Bsp.: felicegattuso.com/projects/datedropper/
 *
 * 'field' => ['date'] (new version)
 * : 'option' => " data-lock='from' " Bsp.: felicegattuso.com/projects/timedropper/
 *
 * 'field' => [textarea]
 * : 'rows' => 2 //Default = ''
 * : readonly => true
 *
 * 'field' => [recaptcha] (no-robot-checker) from Google //https://www.google.com/recaptcha/
 * //Client-Side
 * <script src='https://www.google.com/recaptcha/api.js'></script> muss eingebunden werden
 * //php $_POST['recaptcha'] = '$key' (wird übergeben; *
 * //Server-Side
 * $secretKey = 'xxxxxxxxxx';
 * $verifydata = file_get_contents ( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recaptcha );
 * $response = json_decode ( $verifydata );
 * if ($response->success == false) {
 * echo "alert('Bitte bestätigen, dass Sie kein Roboter sind!');";
 * exit ();
 * } elseif ($response->success == true) {
 * //echo 'ok';
 * }
 *
 * 'field' => [smart_password] (erzeugt automatisch 2 Felder mit Validate
 *
 * 'field' => [dropdown] //old version "select"
 * : min=>0 (erzeugt ein array wie bei Slider)
 * : max=>1000
 * : step=>10
 * : array => array('title_1'=>Überschrift','1'=>'Eins','2' => 'Zwei') //title_xxxx - für OptGroup
 * : array => 'country' //ruft automatisch ein array auf
 * : array => 'color' //Auflistung der Standardfarben von semantic-ui
 * : array => 'timezone' //Ruft alle Timezonen auf
 * : array => range(0, 12) //von bis oder mit Step range (0,12,3)
 * : array_mysql => 'SELECT id,name FROM user'; //bsp.: id = key, name = value
 * : settings => fullTextSearch (Bsp.:) => http://semantic-ui.com/modules/dropdown.html#/settings
 * : settings => 'onChange: function(value, text, $selectedItem) { $(\'#form_select_comp.ui.form\').submit(); }';
 * :'onchange'=>"alert(value)";
 * : 'placeholder' => '--bitte wählen--' || placeholder = '' -> erster Wert im Select wird automatisch genommen
 * : 'class' => 'search' //Es kann im Dropdown gesucht werden
 * : search => false | true
 * : 'clear' => false //Inhalt löschen //Default = true (Dropdown Clear X)
 * : url: => 'test.php?search={query}' //get array
 * : column => 'two';
 * : long => true; //more views
 *
 * -------------------------------------------------------------------------------------------------------------------
 * Request array (json) für url!
 * Für selectierte Werte einfach mit array übergeben (Bsp.: ssi_newsletter->content_campagne.php)
 * -------------------------------------------------------------------------------------------------------------------
 * header("Content-Type: application/json; charset=UTF-8");
 * require_once ('../mysql.inc');
 * $search = $_GET['search']; // suchfeld
 * $result = $GLOBALS['mysqli']->query("SELECT contact_id value, if (firstname>'',CONCAT(firstname,' (',email,')'),email) name FROM contact WHERE CONCAT(email, firstname, secondname) LIKE '%$search%' AND user_id = '$user_id' LIMIT 10");
 * $outp["results"] = $result->fetch_all(MYSQLI_ASSOC);
 * $outp["success"] = true;
 * echo json_encode($outp);
 * -------------------------------------------------------------------------------------------------------------------
 *
 * 'field' => [date]
 * : 'setting' => array ('type' => 'time');
 * : 'setting' => {'type':'time'} (json)
 * : 'placeholder' => 'Datum wählen
 *
 * 'field' => [multiselect]
 * : array => array('1'=>'Eins','2' => 'Zwei')
 * : handler => POST wird string mit "," gentrennt $_POST['groups'] = explode(',',$_POST['groups']); => array zum verarbeiten
 *
 * 'field' => [radio]
 * : array => array('1'=>'Eins','2' => 'Zwei')
 * : min=>0 (erzeugt ein array wie bei Slider)
 * : max=>1000
 * : step=>10
 * : grouped => true //radio untereinander
 * : overflow => auto true false //Wenn radio zu lange ist
 * : 'onchange' => alert( $(this).val() );
 * : default_select => true; //Wählt das erste Feld standardmässig aus
 * : class_radio => 'huge'
 * : class_radio_text => 'green'
 *
 * 'field' => [text] (alte Version) wurde durch content ersetzt
 * : 'value' => 'das ist ein test'
 * : 'align' => 'center' //left and right
 *
 * 'field' => [content]
 * : 'text' => 'value' => 'test {data}' //mit Data kann ein Wert eingebunden werden, der aus der Datenbank gezogen wird
 * : 'id' => 'test'
 * : class_content => 'cktext'
 * : contentedi'table' => true
 * : 'align' => 'center' //left and right
 *
 * field - ALLGEMEINE PARAMETER
 * : 'type' => [text|input|hidden|.......]
 * : 'tab' => 'first'
 * : 'label' => 'Vorname'
 * : label>check_message //Platzhalte neben label für eigene Parameter (Bsp.: $('#label_{name}>.check_message').html ('text neben Labeltext')
 * : 'label_class' => 'admin' //Erweiterung und mehr
 * : 'style' => 'height:100px'
 * : 'id' => 'firstname' OR $arr['field']['firstname']
 * : 'class' => 'class'
 * : setting =>"contenteditable='true'" //oder auch class='test' usw,...
 *
 * 'field' => [finder]
 * : 'onchange' => 'alert('test'); // Platzhalter für ID {id} alert('{id}')
 * Wenn exploerer genutzt wird muss für das Modal
 * <div id='show_explorer' class='fullscreen ui modal'><div class='header'>Dateiverwaltung</div><div class='content' id=show_explorer_content></div></div>
 * eingebaut werden
 *
 * hidden
 * : element => 'wasser';
 *
 * buttons
 * : 'id' => 'button_list'
 * : 'class' => ''
 * : 'align' => center|left|right
 *
 * button[submit | reset | clear ]
 * : 'value' => 'Schließen'
 * : 'color' => 'red'
 * : 'class' => 'huge'
 * : 'icon' => 'save'
 * : 'tooltip' => 'Kicke um weiter zu kommen';
 * : 'js' => 'alert('close')';
 * : 'onclick' => 'alert('close')';
 *
 *
 * $arr['field'][''] = array ('type' =>'line'); //divider
 * $arr['field'][] = array ('type'=>'header','text'=>'Database:','size'=>'large'); //Header
 *
 *
 *
 * STYLE
 * row_$id = Spalte mit label Bsp. $('#size').hide(); //Zeile verstecken
 *
 * BSP.:
 * $arr['field'][''] = array ( tab=>'', 'label' => '', 'type' =>'');
 *
 * //Divider Trennzeichen
 * $arr['field'][] = array ( 'type' => 'div', 'class' => 'ui horizontal divider', 'text'=>"oder" );
 * $arr['field'][] = array ( 'type' => 'div', 'close' => true );
 *
 * //Accordion
 * $arr['field'][] = array ( 'type' => 'accordion' , 'title' => 'Schrift', 'active' => true, 'class'=>'styled' );
 * $arr['field']['test1'] = array ( 'label' => 'Input' , 'type' => 'input' );
 * $arr['field'][] = array ( 'type' => 'accordion' , 'title' => 'Kopfzeile' , 'split' => true );
 * $arr['field']['test2'] = array ( 'label' => 'Input2' , 'type' => 'input' );
 * $arr['field'][] = array ( 'type' => 'accordion' , 'close' => true );
 *
 *
 *
 * $arr['field']['text'] = array ( 'tab' => 'first' , 'type' => 'ckeditor' , 'toolbar' =>'mini' , 'value' => $text , 'focus' => true );
 *
 * * //Submit kann auch so aufgerufen werden
 * $('#form_name.ui.form').submit();
 *
 * //Dropdown set selected -> $('#dropdown_$key').dropdown('set selected','$value');
 * //Dropdawn get value -> $('#dropdown_$key').dropdown('get value');
 * //Dropdawn get text -> $('#dropdown_$key').dropdown('get text'); //Inhalt
 * //Dropdown onChange -> $('#dropdown_$key').dropdown({ onChange : function(value) { alert(value); } });
 *
 *
 * //Hinzufügen in Dropdown-Wert
 * //add_val_dropdown('dropdownID',value,title);
 * //Löschen aller Dropdown-Werte
 * //emtpy_val_dropdown('dropdownID');
 *
 * //Radio $('.ui.checkbox.$id').checkbox('setting', 'onChange', function () { alert( $(this).val()) });";
 * $('.ui.checkbox.$id').checkbox('setting', 'onChange', function () { alert( $(this).val()) });";
 * //Radio Wert auslesen $('input[name=auswahl]:checked').val();
 *
 * BSP für Modal:
 * $('.ui.modal.new_page')
 * .modal('observeChanges')
 * .modal({
 * onApprove : function() { $('#form_name.ui.form').submit() return false; },
 * onDeny : function() { $('.ui.modal.new_page').modal('hide'); }
 * })
 * .modal('show')
 *
 * //Einbinden von Scripten
 * echo "<script>appendScript('js/form_newsletter.js');</script>"; //verhindert das bei AJAX script immer neu geladen wird
 */
/**
 * ************************************************************************************************************
 * MODAL und AUTOFOCUS
 * zum deaktiveren den
 * );
 * *
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
															
															$field .= "\n<div id='row_$id' class='field row_field $required $class $segment $message'>";
															if ($label) {
																if ($label === true)
																	$label = "&nbsp;";
																	$field .= "<label class='label {$label_class}' id='label_$id'>$label $info_tooltip <span class='check_message'></span> $add_label_content</label>";
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
																				
																				$field .= "<div class='ui right labeled input'>$type_field<div id='$label_right_id' class='ui label $label_right_class' $add_label_click $add_label_right_tooltip>$label_right</div></div>";
															} else if (($type == 'input') and $label_left) { // Label im Input Left
																if ($label_left_click)
																	$add_label_click = "onclick=\"$label_left_click\"";
																	$field .= "<div class='ui left labeled input'><div id='label_left_$id' class='ui label $label_left_class' $add_label_click $add_label_left_tooltip>$label_left</div>$type_field</div>";
															} else if (($type == 'select' or $type == 'multiselect') and $label_right) { // Label im Input Right
																$field .= "<div class='ui right labeled input'>$type_field<div id='label_left_$id' class='ui label $label_right_class' $add_label_right_tooltip>$label_right</div></div>";
															} else if (($type == 'select' or $type == 'multiselect') and $label_left) { // Label im Input Left
																$field .= "<div class='ui labeled input'><div class='ui label'>$label_left</div>$type_field</div>";
															} else
																$field .= $type_field;
																
																$field .= $footer;
																$field .= "</div>";
														}
														
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
														
														// Tab
														if (is_array ( $arr ['tab'] ) and $tab) {
															$tab_field [$tab] .= $field;
															$tab = '';
															// Reguler
														} else {
															$set_field .= $field;
														}
														$field = '';
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
				if ($arr['header']['icon']) {
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
						
						$add_function_submit .= "
						
		function submitForm_$form_id() {
		
		 var data = $('#$form_id').serializeArray();
		 $add_data
		 
		  $.ajax({
		    type: 'POST',
		    global   : false,
		    url: '{$arr['form']['action']}',
		    data: data,
		    dataType: '$dataType',
		    
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