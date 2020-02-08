<?php
$total_td = '';



foreach ( $arr ['th'] as $key => $value ) {

	$class = $value ['class'];
	$align = $value ['align'];
	$format = $value ['format'];
	$dataType = $value ['dataType'];
	$colspan = $value ['colspan'];
	$gallery = $value ['gallery'];
	$total = $value ['total'];

	if ($value ['total']) {

		$count_total ++;
		if ($arr ['mysql'] ['table_total']) {
			$table_total = $arr ['mysql'] ['table_total'];
		} else
			$table_total = $arr ['mysql'] ['table'];

		// Get Total value
		$query_sql_total = "SELECT SUM($key) sum_$key FROM  $table_total  WHERE 1 $sql_total";
		
		if ($arr ['mysql'] ['debug'])
			echo "<hr><pre>Total:<br>".htmlspecialchars($query_sql_total)."</pre><hr>";
			
		
		$query_total = $GLOBALS ['mysqli']->query ( $query_sql_total ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
		$array_total = mysqli_fetch_array ( $query_total );

		$value_total = $array_total ["sum_$key"];

		if ($align)
			$class .= " $align aligned ";

		if ($format == 'euro') {
			$value_total = number_format ( $value_total, 2, ",", "." ) . " €";
		} else if ($format == 'euro_color') {
			$temp_value_euro = $value_total;
			$value_total = number_format ( $value_total, 2, ",", "." ) . " €";

			if ($temp_value_euro < 0)
				$value_total = "<span class='ui red text'>" . $value_total . "</span>";
		} else if ($format) {
			$value_total = $value_total . "$format";
		}
	} else
		$value_total = '';

	$total_td_list .= "<td class='$add_class_selectable $class' $add_span_td><b>$value_total</b></td>";
}

if ($count_total) {
	if (is_array ( $arr ['tr'] ['buttons'] ['left'] ))
		$total_td .= "<td>Summe</td>";

	if ($serial) {
		$total_td .= "<td></td>";
	}

	$total_td .= $total_td_list;

	if (is_array ( $arr ['tr'] ['buttons'] ['right'] ))
		$total_td .= "<td></td>";

	$total_tr = "<tr class='active'>$total_td</tr>";
}