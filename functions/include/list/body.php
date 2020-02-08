<?php

/*
 * $array => $var von der Datenbank - wird für Filter verwendet
 */
$GLOBALS ['array'] = $array;
// Muss bei der SQL -Query Am Anfang angeführt sein
$id = $array [0];

$count_th ++;

if ($arr ['list'] ['template']) {
	/**
	 * ******************************************************************
	 * Template {title}<br>{text}
	 * ******************************************************************
	 */
	$output_template .= preg_replace_callback ( '!{(.*?)}!', function ($matches) {
		$array = $GLOBALS ['array'];
		$key = $matches [1];

		$array [$key] = text_output ( $array [$key] );

		return $array [$key];
	}, $arr ['list'] ['template'] );
} else {
	/**
	 * ******************************************************************
	 * Ausgabe als Table
	 * ******************************************************************
	 */

	$button = buttons2 ( $id, $arr, 'tr', $array );

	$list_td .= "<tr id='tr_$id'>";

	if ($button ['left'])
		$list_td .= $button ['left'];

	if ($serial) {
		$serial_nr = ++ $nr_count;
		$list_td .= "<td>" . ($serial_nr + $limit_pos) . "</td>";
	}

	/**
	 * *************************************************************
	 * Ab Hier <TD> erzeugt
	 * ************************************************************
	 */
	foreach ( $arr ['th'] as $key => $value ) {
		$class = $value ['class'];
		$align = $value ['align'];
		$format = $value ['format'];
		$dataType = $value ['dataType'];
		$colspan = $value ['colspan'];
		$gallery = $value ['gallery'];
		$nowrap = $value ['nowrap'];

		if ($align)
			$class .= " $align aligned ";

		if ($format == 'euro') {
			$array [$key] = number_format ( $array [$key], 2, ",", "." ) . " €";
		} else if ($format == 'euro_color') {
			$temp_value_euro = $array [$key];
			$array [$key] = number_format ( $array [$key], 2, ",", "." ) . " €";

			if ($temp_value_euro < 0)
				$array [$key] = "<span class='ui red text'>" . $array [$key] . "</span>";
		} else if ($format) {
			$array [$key] = $array [$key] . "$format";
		}

		$array [$key] = preg_replace ( "/\{id\}/", $id, $array [$key] );

		if ($nowrap)
			$array [$key] = "<span style='white-space: nowrap';>" . $array [$key] . "</span>";
		else
			$array [$key] = text_output ( $array [$key] );

		/**
		 * ************************************************************
		 * Abfrage ob Span für table_field gemacht werden soll
		 * ***********************************************************
		 */

		if (is_array ( $colspan ) and ! $col) {
			$col = fu_span ( $colspan, $array );
		}

		if ($count_col)
			$count_col ++;

		if ($col && ! $count_col) {
			$add_span_td = " colspan='$col' ";
			$count_col ++;
		}

		if ($count_col && ! $add_span_td)
			$td_show = false;
		else
			$td_show = true;

		if ($td_show) {
			$td_href = $arr ['th'] [$key] ['href'];

			// Umwandeln in eine Gallery
			if (is_array ( $arr ['th'] [$key] ['gallery'] )) {
				foreach ( $arr ['th'] [$key] ['gallery'] as $key_gallery => $value_gallery ) {
					$array_gallery [$key_gallery] = fu_call_value ( $array [$key], array ('default' => $value_gallery ) );
				}
				$array_gallery [id] = $id;
				$field_value = fu_call_gallery ( $array_gallery );
			} else {
				// Austauschen eines Wertes
				$field_value = fu_call_value ( $array [$key], $arr ['th'] [$key] ['replace'] );
				$field_value = preg_replace ( "/\{id\}/", $id, $field_value );
			}

			if ($td_href)
				$add_class_selectable = 'selectable';

			$list_td .= "<td class='$add_class_selectable $class' $add_span_td >";
			if ($td_href)
				$list_td .= "<a href='$td_href'>";
			$list_td .= $field_value;
			if ($td_href)
				$list_td .= "</a>";
			$list_td .= "</td>";
		}

		$add_class_selectable = '';
		$td_href = '';
		$add_span_td = '';

		if ($col && $col == $count_col) {
			$col = '';
			$count_col = '';
		}
	}
	if ($button ['right']) {
		$list_td .= $button ['right'];
	}
	$list_td .= "</tr>";
}