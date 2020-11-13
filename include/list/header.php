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

if ($arr ['list'] ['header'] && is_array ( $arr ['th'] )) {
	$output_head = "<thead class='full-width'>";

	/**
	 * *****************************************************************
	 * Output - Checkbox for multiselect
	 * *****************************************************************
	 */
	
	
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

	$output_head .= "</thead>";
}
