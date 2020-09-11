<?php
/**
 * *************************************************************
 * HEADER
 * If header = 'false' Disable // Default = true
 * *************************************************************
 */
if ($arr ['list'] ['header'] === false)
	$arr ['list'] ['header'] = false;
else
	$arr ['list'] ['header'] = true;

	if ($arr ['list'] ['header'] && is_array($arr ['th'])) {
	$output_head = "<thead class='full-width'>";

	//Anzahl der Gesamtfelder - benötigt für die Fusszeile
	$count_th = count ( $arr ['th'] );
	if (is_array ( $arr ['tr'] ['button'] ['left'] )) {
		$count_th ++;
	}
	
	if (is_array ( $arr ['tr'] ['button'] ['right'] )) {
		$count_th ++;
	}

	if (is_array ( $arr ['th_top'] ))
		$output_head .= get_th ( $arr, 'top' );

	if ($count_th)
		$output_head .= get_th ( $arr );

	if (is_array ( $arr ['th_bottom'] ))
		$output_head .= get_th ( $arr, 'bottom' );

	$outupt_head .= "</thead>";
}

//Get header
function get_th($arr, $position = false) {
	if ($position)
		$set_position = "_" . $position;

	$tr_style = $arr ["tr$set_position"] ['style'];
	$tr_align = $arr ["tr$set_position"] ['align'];

	$outupt_head .= "<tr>"; // class='$tr_class' //wird nicht unterstützt

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

		$output .= "<th style='$th_style$style $tr_style' class='$class tooltip' $str_tooltip $colspan >$title</th>";
	}

	if ($arr ['tr'] ['button'] ['right'] && ! $position)
		$output .= "<th></th>";

	$output .= "</tr>";
	return $output;
}

