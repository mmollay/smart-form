<?php


$numbermappings = array ("zero","one","two","three","four","five","six","seven","eight","nine","ten","eleven","twelve","thirteen","fourteen","fifteen","sixteen" );

// if (! $class)
// $class = 'two column grid';

$div_column = "";

if (is_array ( $column )) {
	foreach ( $column as $grid_id => $column_count ) {
		
		if ($column_count) {
			$class_num = $numbermappings [$column_count];
		}
		
		$div_column .= "<div id='$grid_id' class='sortable $class_num wide column'>{$grid_content [$grid_id]}</div>";
	}
}

//$size_field1 = $numbermappings [$column_relation];
//$size_field2 = $numbermappings [16 - $column_relation];

$type_field .= "
<div class='ui $class grid'>
<div class='row'>$div_column</div>
</div>";


