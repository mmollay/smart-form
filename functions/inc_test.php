<?php

if ($farray ['column']) {
	//Set Grid
	$count_level ++;
	$output_field ['start_main'] = "<div style ='border:1px solid red; width:400px; margin:3px;'>";
	foreach ( $farray ['column'] as $grid_id => $column_count ) {
		$array_grid_container [$grid_id] = "<div style='border:1px dashed green; margin:3px; '>";
		//$output_field['stop_grid'][$grid_id] = "</div>";
	}
	//$output_field['stop_main'] = "</div>";
}

if ($farray ['grid'] && $farray ['container']) {
	//include ('inc_test.php');
} else {
	$field [$farray ['grid']] .= $farray ['label'];
}

//Output Content
if ($farray ['close']) {
	$count_level --;
	$output = $output_field ['start_main'];
	foreach ( $array_grid_container as $grid_id => $output_grid_container ) {
		$output .= $output_grid_container . $field [$grid_id] . "</div>";
	}

	if (! $count_level)
		$output_final .= $output . "</div>";
}

?>