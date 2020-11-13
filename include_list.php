<?
/*
 * --------------------------------------------------------------------------------------------------------
 * | SMART - LIST (ssi-Product)
 * | List-Generator: Using Semantic-UI Library
 * | 13.10.2020 - mm@ssi.at
 * | Version 2.2
 * --------------------------------------------------------------------------------------------------------
 */
session_start ();
function call_list($config_path, $mysql_connect_path, $data = false) {
	$count_th = '';

	$str_default_text_notfound = "<i class='icon search'></i>Keine Einträge für {data} vorhanden.";
	$str_default_text = "Kein Eintrag vorhanden";

	// setzt cookie für wortpath bei reload

	// TODO Geht leider nicht im Smart-Kit kommt Fehler : Cannot modify header information - headers already sent by
	// if ($_SESSION['workpath'])
	// setcookie ( "test", $_SESSION['workpath'], time () + 60 * 60 * 24 * 365, '/', $_SERVER['HTTP_HOST'] );

	// Wird bei Suchanfrage intern weitergereicht, dass sich sonst der WORKPATH ändern würde
	if (! $_POST ['table_reload']) {

		$path_parts = pathinfo ( $_SERVER ['PHP_SELF'] );
		$_SESSION ['workpath'] = $path_parts ['dirname'];

		// Es wir ein manueller Workpath gesetzt
		// if ($data['workpath'])
		// $_SESSION['workpath'] = $data['workpath'];
	} else if ($_COOKIE ["workpath"] && ! $_SESSION ["workpath"]) {
		// Wenn COOKIE gesetzt worden ist wird diese für den Workpath verwendet
		$_SESSION ['workpath'] = $_COOKIE ["workpath"];
	}

	if ($mysql_connect_path) {
		$mysql_connect_path = realpath ( $mysql_connect_path );
		include ($mysql_connect_path);
	}

	$config_path = realpath ( $config_path );
	include ("$config_path");
	// $GLOBALS['mysqli']->query("SET NAMES 'utf8'");

	// $GLOBALS['mysqli']->query("SET NAMES 'utf8'");
	// include ($config_path );
	// include ($mysql_connect_path );
	// Suchbegriff
	// $input_search = $_SESSION['input_search'][$list_id];
	// $input_search = trim ( $input_search );

	if ($list_width) {
		$list_style .= 'max-width:' . $list_width . ';';
	}

	if ($arr ['list'] ['serial'] === false)
		$arr ['list'] ['serial'] = false;
	else
		$arr ['list'] ['serial'] = true;

	// OPTIONS
	$list_align = $arr ['list'] ['align'];
	$list_width = $arr ['list'] ['width'];
	$list_size = $arr ['list'] ['size'];
	$list_class = $arr ['list'] ['class'];
	$list_style = $arr ['list'] ['style'];
	$list_id = $arr ['list'] ['id'];
	$serial = $arr ['list'] ['serial']; // Zeigt fortlaufende Nummer an

	$input_search_array = $_SESSION ['input_search'];
	$input_search = $input_search_array [$list_id];
	$input_search = str_replace ( '\+', '', $input_search );
	$input_search = trim ( $input_search );
	$input_search = preg_replace ( '/(\\\s){2,}/', '$1', $input_search );
	$input_search = preg_replace ( '/\+/', '', $input_search );
	$GLOBALS ['input_search'] = $input_search;

	// Wird übergeben wenn die Table neu geladen werde soll in call_table.php
	$_SESSION ['smart_list_config'] [$list_id] = array ('config_path' => $config_path,'mysql_connect_path' => $mysql_connect_path,'data' => $data );

	// print_r($_SESSION['smart_list_config']);

	// Daten werden in Cookie gespeichert und in call_table verwendet
	if ($_SESSION ['smart_list_config'])
		setcookie ( "smart_list_config", serialize ( $_SESSION ['smart_list_config'] ), time () + 60 * 60 * 24 * 365, '/', $_SERVER ['HTTP_HOST'] );

	/**
	 * ************************************************************************
	 * CALL - DATA (mysql or array)
	 * ************************************************************************
	 */

	if (! $arr ['search'] ['show_empty'] or $GLOBALS ['input_search']) {

		$timeStart = microtime_float ();

		if (is_array ( $arr ['mysql'] )) {
			//DATA - MYSQL ******************************************************************************************
			include (__DIR__ . '/include/list/data_mysql.php');
		} else {
			//DATA - ARRAY **************************************************************************************
			include (__DIR__ . '/include/list/data_array.php');
		}

		$timeEnd = microtime_float ();

		include (__DIR__ . '/include/list/header.php');

		if (is_array ( $arr ['checkbox'] ))
			$count_th ++;

		if ($serial)
			$count_th ++;
	}

	/**
	 * ************************************************************************
	 * END - CALL - DATA (mysql or array)
	 * ************************************************************************
	 */

	include (__DIR__ . '/include/list/checkbox.php');

	if ($arr ['search'] ['default_text_notfound']) {
		$default_text_notfound = $arr ['search'] ['default_text_notfound'];
	} else {
		$default_text_notfound = $str_default_text_notfound;
	}

	if ($arr ['search'] ['default_text']) {
		$default_text = $arr ['search'] ['default_text'];
	} else {
		$default_text = $str_default_text;
	}

	if (! $count_line or ! $no_body) {

		if ($input_search) {
			$empty_text = str_replace ( '{data}', $GLOBALS ['input_search'], $default_text_notfound );
		} else
			$empty_text = "$default_text";

		$list_td .= "<tr><td colspan='$count_th' ><br><br><div align=center>$empty_text</div><br><br></td></tr>";
	} else {
		include (__DIR__ . '/include/list/total.php');
	}

	/*
	 * BODY
	 */
	$output_body = "<tbody>";
	$output_body .= $total_tr;
	$output_body .= $list_td;
	//$output_body .= $total_tr;
	$output_body .= "</tbody>";
	/*
	 * FOOTER
	 */

	$run_time = round ( $timeEnd - $timeStart, 3 );

	if ($run_time && $arr ['list'] ['loading_time'] === true)
		$loading_time = "<br>(" . $run_time . "sek)";

	/**
	 * *****************************************************************
	 * MODAL- GENERATOR
	 * mm@ssi.at Update 09.09.2020
	 * - With button on den bottom
	 * *****************************************************************
	 */

	if (is_array ( $arr ['modal'] )) {

		foreach ( $arr ['modal'] as $modal_key => $modal_value ) {

			$modal_title = $modal_value ['title'];
			$modal_class = $modal_value ['class'];
			$modal_url = $modal_value ['url'];
			$modal_button = $modal_value ['button'];
			$modal_id = $modal_value ['id'];

			//$close_button = $modal_value ['close_button'];
			//$close_button = "<div style='float:right'><a href=# onclick=\"$('#$modal_key').modal('hide'); $('#$modal_key>.content').empty(); \"><i class='close icon'></i></a></div><div style='clear:both'></div>";

			$modal .= "<div id='$modal_key' class='ui modal $modal_class'>";
			$modal .= "<i class='close icon'></i>";
			$modal .= "<div class='header'>$modal_title </div>";
			$modal .= "<div class='content'></div>";

			if (is_array ( $modal_button )) {
				$modal .= "<div class='actions'>";
				foreach ( $modal_button as $button_key => $button_array ) {
					$button_class = $button_array ['class'];
					$form_id = $button_array ['form_id']; // verknüpfung zum Formular

					if ($form_id) {
						$onclick = "$('#$form_id').submit();";
					}

					if ($onclick or $button_array ['onclick'])
						$set_onclick = "onclick =\"$onclick {$button_array['onclick']}\"";
					else
						$set_onclick = '';

					$button_array_icon = '';
					$class_icon = '';
					if ($button_array ['icon']) {
						$button_array_icon = "<i class='icon {$button_array['icon']}'></i>";
						$class_icon = 'icon';
					}
					$modal .= "<div class='ui $button_key $button_class $class_icon button {$button_array['color']}' $set_onclick >$button_array_icon {$button_array['title']}</div>";
				}
				$modal .= "</div>";
			}

			$modal .= "</div>";
			$modal_header = '';
		}
	}

	/**
	 * *********************************************
	 * Ab hier wird Liste neu geladen bei Reload
	 * ********************************************
	 */
	$output_table .= "<div style='margin-top:12px;' id='$list_id' class='smart_list' >";
	$output_table .= $arr ['content'] ['top'];

	if ($fields_filter) {
		$output_table .= "<div id='$list_id' class='ui form message smart_list_filter'><div class='fields'>$fields_filter</div></div>";
	}

	if ($dropdown_order or $arr ['list'] ['auto_reload']) {

		// $output_array['html'] .= "<div style='padding: 13px 5px 5px 0px'>";

		if ($arr ['list'] ['auto_reload']) {
			$output_table .= "<div style='float:left'>" . list_auto_reload ( $list_id, $arr ['list'] ['auto_reload'] ) . "</div>";
		}

		// $dropdown_order = 1;
		if ($dropdown_order) {
			$output_table .= "<div style='float:right'>" . $dropdown_order . "</div>";
		}

		$output_table .= "<div style='clear:both'></div>";
		// $output_array['html'] .="</div>";
	}

	/**
	 * *******************************************************
	 * Ausgabe der Table oder Liste
	 * *******************************************************
	 */
	if ($arr ['list'] ['template']) {
		// Ausgabe bei Templateausgabe
		$output_table .= "<div align='left'>$output_template</div>";
		$output_table .= $empty_text;
		$output_table .= "<div align='left'>$txt_count_all $txt_count_filter $txt_limitbar $loading_time</div>";
	} else if (! $arr ['list'] ['hide']) {
		// Table - Main
		$output_table .= "<table class='ui table $list_size $list_class' style='$list_style'>";

		//Sortierfunktion
		$output_table .= $output_order;

		//if ($show_th)
		$output_table .= $output_head;
		$output_table .= $output_body;

		if ($arr ['list'] ['footer'] !== false) {
			$arr ['list'] ['footer'] = true;
			// FOOTER 2
			$output_table .= "<tfoot class='full-width'><tr><th colspan=$count_th>$txt_count_all $txt_count_filter $txt_limitbar $loading_time</th></tr></tfoot>";
		}

		$output_table .= "</table>";
	}
	$output_table .= $arr ['content'] ['bottom'] . "</div>";

	$_SESSION ['export'] ['db'] = $arr ['mysql'] ['db'];
	$_SESSION ['export'] ['table'] = $arr ['mysql'] ['table'];
	$_SESSION ['export'] ['filter'] = $sql_export;
	$_SESSION ['export'] ['field'] = $arr ['mysql'] ['export'];

	$doc_root = $_SERVER ['DOCUMENT_ROOT'];
	$static_page_path = preg_replace ( "[$doc_root]", '', (__DIR__) );

	// Outpup - just Table
	if ($_POST ['table_reload']) {
		return $output_table;
	}

	// Like ODER Like&Boolean verwendet wird
	if ($arr ['mysql'] ['like']) {
		// Ladet Liste nach jeder Veränderung im INPUT-Search-Field NEU
		$jquery .= "
		$( '#input_search$list_id' ).on('input', function( event ) {
			call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());
		});";
	} elseif ($arr ['mysql'] ['match']) {
		// Wenn Boolean verwendet wird
		// Ladet Liste nach jeder Veränderung im INPUT-Search-Field NEU
		$jquery .= "
		$( '#input_search$list_id' ).on('change', function( event ) {
		call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());
		});
		$( '#input_search$list_id' ).on('input', function( event ) {
		if ($('#input_search$list_id').val() == '') call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());
		})
		";
	}

	if (is_array ( $arr ['js'] )) {
		foreach ( $arr ['js'] as $array_js ) {
			if ($array_js ['text'])
				$add_js_text .= $array_js ['text'];
			if ($array_js ['src'])
				$add_js_src .= "<script type=\"text/javascript\" src=\"{$array_js['src']}\"></script>";
		}
	}

	if (is_array ( $arr ['checkbox'] )) {
		$add_checkbox_js = "check_change_checkbox('$list_id');";
	}

	$js .= "
	<script type=\"text/javascript\">
			$(document).ready(function() {
				$add_checkbox_js
				$jquery
				//$('.ui.modal>.content').empty();
				$('.ui.modal').modal({ allowMultiple: true, observeChanges : true, autofocus: false });
				$('.tooltip').popup();
			});
			$add_js_text
	</script>";
	$js .= $add_js_src;

	$output_array ['html'] .= "<div align='$list_align'><div style='max-width:$list_width;'>";

	/**
	 * ********************************************************
	 * Suchfeld + Button (TOP)
	 * ********************************************************
	 */
	if ($arr ['mysql'] ['like'] or $arr ['mysql'] ['match']) {
		// if ($arr['mysql']['like'])
		// $onchange = "onkeydown=\"call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());\"";
		$head_search = "<input $onchange id = 'input_search$list_id' value='{$GLOBALS['input_search']}' placeholder='Suchbegriff' type='text'><i class='search icon'></i>";
		// $output_array['html'] .= "<div class='ui icon input'><i class='inverted circular search link icon'></i><input id = 'input_search$list_id' class='' type='text' value='$input_search' placeholder='Suchbegriff'></div>";
		$jquery .= "$('#input_search$list_id').focus(); ";
	}
	if ($arr ['mysql'] ['match'])
		$head_search .= "&nbsp;<button class='ui icon button' onclick=$('#input_search$list_id').click >Suchen</button>";

	if ($arr ['top'])

		$head_button .= buttons ( '', $arr, 'top' );

	if ($arr ['top'] ['buttons'] ['align'])
		$buttons_float = $arr ['top'] ['buttons'] ['align'];
	else
		$buttons_float = 'right';

	if ($head_search and ! $head_button) {
		$output_array ['html'] .= "<div class='ui form'><div class='ui {$arr['search']['class']} $list_size icon input focus'>$head_search</div></div><br><hr>";
	} elseif ($head_search or $head_button) {
		$output_array ['html'] .= "<div style='float:left'><div class='ui form'><div class='ui $list_size icon input focus'>$head_search</div></div></div>";
		$output_array ['html'] .= "<div style='float:$buttons_float'>$head_button</div>";
		$output_array ['html'] .= "<div style='clear:both'></div>";
	}

	/**
	 * *******************************************************
	 */
	$output_array ['html'] .= $output_table;
	if ($_SESSION ['export'] ['field'])
		$button_export = "<a href='$static_page_path/plugin/export.php?list_id=$list_id'>[ Export ]</a><br><br>";
	$output_array ['html'] .= $button_export;
	$output_array ['html'] .= "</div></div>";
	$output_array ['html'] .= "<div class='loader'></div>";
	$output_array ['html'] .= $modal;

	$output_array ['js'] = $js_list;
	$output_array ['js'] = $js;

	return $output_array;
}

/*
 * Generate Buttons
 * TOP
 */
function buttons($id, $arr, $pos) {
	if (! is_array ( $arr [$pos] ['button'] ))
		return;

	$list_size = $arr ['list'] ['size'];
	$list_class = $arr ['list'] ['class'];
	$list_style = $arr ['list'] ['style'];

	// Default
	if ($arr [$pos] ['buttons'] ['groups']) {
		$buttons_class = $arr [$pos] ['buttons'] ['class'];
		$button .= "<div class='buttons $buttons_class icon ui'>";
	}

	foreach ( $arr [$pos] ['button'] as $key => $value ) {

		$icon = $value ['icon'];
		$id = $value ['id'];
		$title = $value ['title'];

		if ($key) {
			if ($arr ['modal'] [$key] ['url']) {
				$url = $_SESSION ['workpath'] . "/" . $arr ['modal'] [$key] ['url'];
				$url = preg_replace ( "/{id}/", $id, $url );
				$onclick = "call_semantic_form('$id','$key','$url','{$arr['list']['id']}','{$arr['modal'][$key]['focus']}');";
			}
		}

		if (! $key) {
			$field_id ++;
			$key = 'button-' . $field_id;
		}

		if ($icon)
			$icon = "<i class='icon $icon'></i> ";

		$title = "<span class='smart_form_button_top'>" . $title . "</span>";
		$class = $value ['class'];

		$onclick2 = $value ['onclick'];

		if ($onclick2) {
			$onclick2 = preg_replace ( "/{id}/", $id, $onclick2 );
		}

		if ($value ['filter']) {
			$query = $GLOBALS ['mysqli']->query ( $value ['filter'] ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
			$count = mysqli_num_rows ( $query );
		} else
			$count = 1;

		$single = $value ['single'];

		$popup = $value ['popup'];
		if ($popup)
			$popup = "data-content = '$popup' ";

		if ($onclick or $onclick2)
			$set_button = "<button id = '$id' class='ui button icon $list_size $class' onclick=\"$onclick $onclick2\" $popup >$icon$title</button>";
		else
			$set_button = "<button id = '$id' class='ui button icon $list_size $class'>$icon$title</button>";

		if (! $single)
			$button .= $set_button;
		else
			$button_separat .= $set_button;

		$id = '';
		$title = '';
		$onclick = '';
		$url = '';
	}

	if ($arr [$pos] ['buttons'] ['groups'])
		$button .= "</div>";

	return $button . $button_separat;
}

// Next generation with "position"
// LIST
function buttons2($id, $arr, $pos, $array) {
	if (! is_array ( $arr [$pos] ['buttons'] ['left'] ) and ! is_array ( $arr [$pos] ['buttons'] ['right'] )) {
		$arr [$pos] ['buttons'] ['left'] = $arr [$pos] ['buttons'];
		$arr [$pos] ['button'] ['left'] = $arr [$pos] ['button'];
		$set_position = 'left';
	}
	foreach ( $arr [$pos] ['buttons'] as $position => $value ) {
		if ($set_position)
			$position = $set_position;
		$buttons_class = $arr [$pos] ['buttons'] [$position] ['class'];
		$td_class = $arr [$pos] ['buttons'] [$position] ['td_class'];

		if (is_array ( $arr [$pos] ['buttons'] [$position] )) {

			// Rechbündig wenn Buttons rechts angeordnet sind
			if ($position == 'right')
				$td_class2 .= "right aligned";
			$array [$position] = "<td class='$td_class $td_class2' nowrap><div class='buttons $buttons_class icon ui'>";

			foreach ( $arr [$pos] ['button'] [$position] as $key => $value ) {
				if ($arr [$pos] ['button'] [$position] [$key] ['filter']) {
					$show_button = fu_filter ( $arr [$pos] ['button'] [$position] [$key] ['filter'], $array );
				} else
					$show_button = 1; // Defaultmässig wird der Button immer gezeigt

				// Wird wenn Filter gesetzt ist nicht angezeigt
				if ($show_button) {

					$icons = $value ['icons'];
					$icon = $value ['icon'];
					$icon_corner = $value ['icon_corner'];

					if ($icon_corner) {
						$icon = "<i class='$icons icons'><i class='$icon icon'></i><i class='corner $icon_corner icon'></i></i>";
					} elseif ($icon)
						$icon = "<i class='icon $icon'></i>";

					$title = $value ['title'];
					$class = $value ['class'];

					$onclick2 = $value ['onclick'];
					$download = $value ['download'];
					$href = $value ['href'];
					$single = $value ['single'];
					$GLOBALS ['array'] = $array;

					if ($onclick2) {
						// bei ID
						$onclick2 = preg_replace ( "/{id}/", $id, $onclick2 );
						// bei restlichen Werten aus der Datenbank
						// $onclick2 = preg_replace ( '!{(.*?)}!e', '$array[ \1 ]', $onclick2 );
						$onclick2 = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
							$array = $GLOBALS ['array'];
							return $array [$matches [1]];
						}, $onclick2 );
					}

					if ($download) {
						// $download = preg_replace ( '!{(.*?)}!e', '$array[ \1 ]', $download );

						$download = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
							$array = $GLOBALS ['array'];
							return $array [$matches [1]];
						}, $download );

						$download = "download = '$download' ";
					}

					if ($href) {
						// $href = preg_replace ( '!{(.*?)}!e', '$array[ \1 ]', $href );
						$href = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
							$array = $GLOBALS ['array'];
							return $array [$matches [1]];
						}, $href );
						$href = "href = '$href' target=_new ";
					}

					if ($key) {
						// getcwd — Ermittelt das aktuelle Arbeitsverzeichnis
						// $doc_root = $_SERVER['DOCUMENT_ROOT'];
						// Minus - Absolute path
						// $workpath = preg_replace ( "[$doc_root]", '', getcwd () );
						if ($arr ['modal'] [$key] ['url']) {
							$url = $_SESSION ['workpath'] . "/" . $arr ['modal'] [$key] ['url'];
						} else
							$url = '';

						// wenn on click, definiert wurd, dann wird keine Modal geladen
						if (is_array ( $arr ['modal'] [$key] )) {
							$url = preg_replace ( "/{id}/", $id, $url );
							$onclick = "call_semantic_form('$id','$key','$url','{$arr['list']['id']}','{$arr['modal'][$key]['focus']}'); ";
						} else {
							$onclick = '';
						}
					}

					$popup = $value ['popup'];

					if ($popup)
						$popup = "data-content = '$popup' ";

					if ($onclick or $onclick2)
						$onclick = "onclick=\"$onclick $onclick2\"";
					$button_set = "<a $href class='ui button icon $class $key tooltip' id ='$id' $download $onclick $popup >$icon$title</a>";

					if (! $single)
						$array [$position] .= $button_set;
					else
						$array_single [$position] .= " $button_set";
				}
			}

			if (is_array ( $arr [$pos] ['buttons'] [$position] )) {
				$array [$position] .= "</div>" . $array_single [$position] . "</div>";
			}
		}
	}
	return $array;
}

/**
 * ******************************************************
 * RowSpan für tabellen spalten
 * ******************************************************
 */
function fu_span($filter, $aRow) {
	$ii = '';
	if (! is_array ( $filter ))
		return;

	foreach ( $filter as $array ) {
		// $filter = $filter[0]
		$ii ++;
		$filter_value = $array ['value'];
		$filter_format = $array ['format'];
		$filter_field = $array ['field'];
		$filter_field2 = $array ['field2'];
		$filter_operator = $array ['operator'];
		$filter_link [$ii] = $array ['link'];

		// Aktueller Tag
		if ($filter_value === 'NOW')
			$filter_value = date ( 'Y-m-d' );

		// Wenn Feld zu Feld verglichen werden soll
		if ($filter_field2)
			$filter_value = $aRow [$filter_field2];

		if ($filter_operator == '==' && $aRow [$filter_field] == $filter_value) {
			$value [$ii] = 1;
		} elseif ($filter_operator == '!=' && $aRow [$filter_field] != $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>' && $aRow [$filter_field] > $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>=' && $aRow [$filter_field] >= $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<' && $aRow [$filter_field] < $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<=' && $aRow [$filter_field] <= $filter_value)
			$value [$ii] = 1;
	}

	// Bei OR Verknüpfnug
	if ($filter_link [2] == 'or') {
		if ($value [1] or $value [2])
			return $filter [col];
		// Bei AND Verknüpfung
	} elseif ($filter_link [2] == 'and') {
		if ($value [1] and $value [2])
			return $filter [col];
	} elseif ($value [1])
		return $filter [col];
}

/**
 * ******************************************************
 * FIlTER für Buttons (Für anzeigen oder ausblenden)
 *
 * @param unknown $filter
 * @param unknown $aRow
 * @return number ******************************************************
 */
function fu_filter($filter, $aRow) {
	$ii = '';
	foreach ( $filter as $array ) {
		// $filter = $filter[0]
		$ii ++;
		$filter_value = $array ['value'];
		$filter_format = $array ['format'];
		$filter_field = $array ['field'];
		$filter_field2 = $array ['field2'];
		$filter_operator = $array ['operator'];
		$filter_link [$ii] = $array ['link'];

		// Aktueller Tag
		if ($filter_value === 'NOW')
			$filter_value = date ( 'Y-m-d' );

		// Wenn Feld zu Feld verglichen werden soll
		if ($filter_field2)
			$filter_value = $aRow [$filter_field2];

		if ($filter_operator == '==' && $aRow [$filter_field] == $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '!=' && $aRow [$filter_field] != $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>' && $aRow [$filter_field] > $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>=' && $aRow [$filter_field] >= $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<' && $aRow [$filter_field] < $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<=' && $aRow [$filter_field] <= $filter_value)
			$value [$ii] = 1;
	}

	// Bei OR Verknüpfnug
	if ($filter_link [2] == 'or') {
		if ($value [1] or $value [2])
			return 1;
		// Bei AND Verknüpfung
	} elseif ($filter_link [2] == 'and') {
		if ($value [1] and $value [2])
			return 1;
	} else
		return $value [$ii];
}

/**
 * ******************************************************
 * FILTER-LEISTE (DROPDOWN, BUTTONS)
 * ******************************************************
 */
function call_filter($type = 'select', $array, $color = false) {
	$list_id = $array ['list_id'];
	$id = $array ['id'];
	$var = $array ['var'];
	$placeholder = $array ['placeholder'];
	$setting = $array ['setting'];
	$filter_key = "filter_$id";
	$value = $array ['value'];
	$default_value = $array ['default_value'];
	$class = $array ['class'];
	$query = $array ['query'];
	$list_para = $array ['list_para'];
	$list_size = $list_para ['size'];

	if ($array ['table'])
		$table = $array ['table'] . ".";

	$filter_value = $_SESSION ["filter"] [$list_id] [$id];

	if ($value && ! isset ( $filter_value )) {
		$filter_value = $value;
	}

	/**
	 * *********************************************************************
	 * BUTTON - LEISTE
	 * *********************************************************************
	 */
	if ($type == 'button') {
		foreach ( $var as $key => $value ) {

			// Wenn eine Defaultwert gesetzt wurde
			if (! $filter_value && $default_value) {
				$filter_value = $default_value;
			}

			if ($key == $filter_value)
				$add_class = 'active';
			else
				$add_class = '';
			$onclick = "onclick = \"call_semantic_table('$list_id','filter','$id','$key'); $('.filter_button_$list_id').removeClass('active'); $('.filter_button_$list_id#$key').addClass('active'); \" ";
			$array_output ['html'] .= "<button id='$key' class='ui button $class $add_class filter_button_$list_id' $onclick>$value</button>";
		}
	} /**
	 * *********************************************************************
	 * SELECT
	 * *********************************************************************
	 */
	else {
		$class = 'button basic search';

		if (! isset ( $filter_value )) {
			$filter_value = 'all';
		} else {
			if ($filter_value != 'all')
				$color_class = $color;
		}

		// Wenn eine Defaultwert gesetzt wurde
		if (! $filter_value && $default_value) {
			$filter_value = $default_value;
		}

		// Wenn es einen Defaultwert gibt, gibt es keinen Platzhalter
		if (! isset ( $value )) {
			if (! $placeholder)
				$placeholder = "--Bitte wählen--";
			$group_a .= "<div class='item' data-value='all' >$placeholder</div>";
		}

		if (is_array ( $var )) {
			foreach ( $var as $key => $value ) {
				$group_a .= "<div class='item' data-value='$key' >$value</div>";
			}
		}

		$array_output ['html'] .= "
		<div class='field'>
		<div class='$color_class ui $list_size dropdown $class $list_id' id='$filter_key'>
		$button_remove<input name='$filter_key' type='hidden' value='$filter_value'>
		<div class='default text'>$placeholder</div>
		<i class='dropdown icon'></i>
		<div class='menu'>$group_a</div>
		</div>
		</div>";
		// wird direkt geladen, damit der Refresh (und auch Autorfresh funktioniert
		$array_output ['html'] .= "
		<script type=\"text/javascript\">
			$(document).ready(function() {
			$('#$filter_key').dropdown({ fullTextSearch : true, onChange(value, text) { call_semantic_table('$list_id','filter','$id',value); }, " . $setting . "});
			});
		</script>
		";
	}

	// klomplexe Abfragen bsp.: DATE_FORMAT(date_create,'%Y')
	if (isset ( $filter_value ) and $filter_value != 'all') {

		if ($query) {
			if (preg_match ( "/{value}/", $query )) {
				// Ausgabe wenn gesamter Parameter übergeben wird "platzhalter {value}
				$query = preg_replace ( "/{value}/", $filter_value, $query );
				if ($query)
					$array_output ['mysql'] = " AND $query";
			} else
				// klassisch
				$array_output ['mysql'] = " AND $query $field_opterator '$filter_value ' ";
		} else
			// alter Varian
			$array_output ['mysql'] = " AND $table$id = '$filter_value ' ";

		// echo $array_output['mysql'];
	}

	$class = '';

	return $array_output;
}

/*
 * Entfernt Zeilenumbrüche, Breaks und Kommentare
 */
function compress_html($alt) {
	$check = true;
	do {

		$pos1 = strpos ( $alt, '<!--' );
		$pos2 = strpos ( $alt, '-->', $pos1 );

		if ($pos1 === false || $pos2 === false) {
			$check = false;
		} else {
			$alt = substr ( $alt, 0, $pos1 ) . substr ( $alt, $pos2 + 3 );
		}
	} while ( $check );

	$neu = $alt;
	$changed = false;

	do {

		$changed = false;
		if (($tmp = str_replace ( '  ', ' ', $neu )) != $neu) {
			$neu = $tmp;
			$changed = true;
		}
	} while ( $changed );

	$neu = str_replace ( "\r\n", '', $neu );
	$neu = str_replace ( "\n", '', $neu );
	return $neu;
}
function microtime_float() {
	list ( $usec, $sec ) = explode ( " ", microtime () );
	return (( float ) $usec + ( float ) $sec);
}

// Ersetzen eines Wertes durch einene anderen Wert Bsp. 1 wird <i class='icon red eye'></i>
function fu_call_value($value, $array) {
	if (! $array)
		return $value;

	foreach ( $array as $key => $value2 ) {

		if ($key == $value) {

			if (preg_match ( "/{value}/", $value2 )) {
				// Ausgabe wenn gesamter Parameter übergeben wird "platzhalter {value}
				$value2 = preg_replace ( "/{value}/", $value, $value2 );
			}

			return $field_value = $value2;
		} else if (preg_match ( "/>/", $key )) {
			//if value bigger then...
			$split_value = explode ( ">", $key );
			$value2 = preg_replace ( "/{value}/", $split_value [1], $value2 );
			if ($value > $split_value [1])
				return $field_value = $value2;
		} else if (preg_match ( "/>/", $key )) {
			//if value smaller then...
			$split_value = explode ( "<", $key );
			$value2 = preg_replace ( "/{value}/", $split_value [1], $value2 );
			if ($value < $split_value [1])
				return $field_value = $value2;
		}
	}

	if ($array ['default']) {
		$value2 = $array ['default'];
		if (preg_match ( "/{value}/", $array ['default'] )) {

			// Ausgabe wenn gesamter Parameter übergeben wird "platzhalter {value}
			$value2 = preg_replace ( "/{value}/", $value, $array ['default'] );
		}
		return $field_value = $value2;
	}

	return $value;
}

/**
 * ********************************************************
 * Auto RELOAD
 * ********************************************************
 */
function list_auto_reload($list_id, $value) {
	if ($value) {
		if (is_array ( $value )) {
			$label = $value ['label'];
			$checked = $value ['checked'];
			$loader = $value ['loader'];
		}

		if ($checked === FALSE)
			$checked = '';
		else
			$checked = 'checked';
		if (! $label)
			$label = 'Auto Reload';

		$auto_reload = "<div class='ui toggle checkbox'>";
		$auto_reload .= "<input class='reload_table' id='$list_id' $checked type='checkbox'>";
		if ($loader === FALSE)
			$auto_reload .= "<input class='reload_loader' id='$list_id' type='hidden' value='1'>";
		$auto_reload .= "<label>$label</label>";
		$auto_reload .= "</div>";
		return $auto_reload;
	}
}

/**
 * ********************************************************
 * strip_tags, hightlight
 * ********************************************************
 */
function text_output($value) {
	if ($GLOBALS ['arr'] ['search'] ['strip_tags']) {
		if ($GLOBALS ['arr'] ['search'] ['strip_tags'] != true)
			$allowable_tags = $GLOBALS ['arr'] ['search'] ['strip_tags'];

		if ($GLOBALS ['arr'] ['search'] ['strip_tags']) {
			$value = nl2br ( $value );
			$value = preg_replace ( '#<br />(\s*<br />)+#', '<br />', $value );
			$value = preg_replace ( "/<br \/>/", " ", $value );
			$value = strip_tags ( $value, "<a>" );
		}
	}

	if ($GLOBALS ['input_search'] && $GLOBALS ['arr'] ['search'] ['hightlight'])
		$value = preg_replace ( "/{$GLOBALS['input_search']}\w*/i", "<b>$0</b>", $value );
	// $value = preg_replace ( "/\w*?{$GLOBALS['input_search']}\w*/i", "<b>$0</b>", $value );

	return $value;
}

/**
 * **********************************************************
 * gallery
 * **********************************************************
 */
function fu_call_gallery($array) {
	if (! $array ['document_root'])
		$array ['document_root'] = $_SERVER ["DOCUMENT_ROOT"];

	// $images = glob ( $_SERVER["DOCUMENT_ROOT"].$array['img_path'] . "/*.{jpg,png,bmp}" ,GLOB_BRACE );
	$images = glob ( $array ['document_root'] . $array ['img_path_thumb'] . "/*.{jpg,png,bmp}", GLOB_BRACE );
	foreach ( $images as $image ) {
		$image_thumb = $image = preg_replace ( "[{$array['document_root']}]", '/', $image );
		$image = preg_replace ( "[thumbnail/]", '', $image );
		$output .= "<a href='$image' data-fancybox='gallery{$array['id']}' >$image<img class='ui image tooltip' src='$image_thumb' title='Bild vergrößern'></a>";
	}
	if (! $output)
		$output = "<img class='ui image' src='../ssi_smart/smart_form/img/image.png'>";
	return "<div class='ui small rounded images'>" . $output . "</div>";
}

/**
 * ****************************************************************
 * CHANGE {value} form Tables
 * ****************************************************************
 */
function temp_replace($value) {
	$value = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
		$array = $GLOBALS ['array'];
		$key = $matches [1];

		$array [$key] = text_output ( $array [$key] );

		return $array [$key];
	}, $value );
	return $value;
}

//Get header
function get_th($arr, $position = false) {
	if ($position)
		$set_position = "_" . $position;

	$tr_style = $arr ["tr$set_position"] ['style'];
	$tr_align = $arr ["tr$set_position"] ['align'];

	$outupt_head .= "<tr>"; // class='$tr_class' //wird nicht unterstützt

	
	if (is_array ( $arr ['checkbox'] ) && ! $position) {
		if ($arr ['checkbox'] ['align'])
			$checkbox_add_tb_class = "class='" . $arr ['checkbox'] ['align'] . " aligned'";
			
			//$output_head .= "<th><div class='item'><div class='ui master checkbox'><input type='checkbox' name='fruits'><label></label></div></th>";
			$output .= "<th $checkbox_add_tb_class><div class='ui master checkbox $checkbox_add_class'><input class='checkbox-main-{$arr['list']['id']}' value='$id' type='checkbox' name='type'><label>" . $arr ['checkbox'] ['title'] . "</label></div></th>";
			/**
			 * **** END - Checkbox *********************************************
			 */
	}
	
	
	if (is_array ( $arr ['tr'] ['button'] ['left'] ) && ! $position)
		$output .= "<th style='$tr_style'></th>";

	if ($arr ['list'] ['serial'] && ! $position) // Ausgabe eines Nummerkreislaufes - Title
		$output .= "<th style='$tr_style' >Nr.</th>";

	foreach ( $arr ['th' . $set_position] as $key => $value ) {

		$title = $value ['title'];
		//if ($title)
		//	$show_th = true;
		$colspan = $value ['colspan'];
		$width = $value ['width'];
		$class = $value ['class'];
		$align = $value ['align'];
		$tooltip = $value ['tooltip'];
		$info = $value ['info'];
		$style = $value ['style'];
		if ($colspan)
			$colspan = "colspan='$colspan' ";

		if ($align or $tr_align) {
			if ($tr_align)
				$align = $tr_align;
			$class .= " $align aligned ";
		}

		if ($width)
			$th_style = "width:$width;";

		if ($tooltip or $info) {
			if ($info)
				$tooltip = $info;
			$str_tooltip = "title='$tooltip'";
		} else
			$str_tooltip = '';

		$output .= "<th style='$th_style $style $tr_style' class='$class tooltip' $str_tooltip $colspan >$title</th>";
	}

	if ($arr ['tr'] ['button'] ['right'] && ! $position)
		$output .= "<th></th>";

	$output .= "</tr>";
	return $output;
}