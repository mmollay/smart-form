<?php

// Tab - Generator
if ($tabs) {
	$count_tab ++;
	if (! $active) {
		$active = key ( $tabs );
	}
	$array_tab[$count_tab] = $active;
	$array_content_class[$count_tab] = $content_class;
	$array_class[$count_tab] = $class;
	$content_class = '';
	$class = '';
}
if ($close == true) {
	$count_tab --;
}

if (! $array_content_class[$count_tab]) {
	$tab_content_class = "attached segment";
} else {
	$tab_content_class = $array_content_class[$count_tab];
}

if (! $array_class[$count_tab]) {
	$tab_class = "top attached tabular";
} else {
	$tab_class = $array_class[$count_tab];
	if (($tab_class == 'secondary' or $tab_class == 'secondary pointing') and ! $array_content_class[$count_tab])
		$tab_content_class = '';
}

if ($close == true) {
	$field .= "</div></div></div>";
} elseif ($tabs) {
	// Start
	$field .= "<div class='field'><div id='tabgroup_$id'><div class='ui menu $tab_class {$arr['form']['size']}'>";
	foreach ( $tabs as $tab_key => $tab_value ) {
		if ($array_tab[$count_tab] == $tab_key) {
			$set_active = 'active';
		} else {
			$set_active = '';
		}
		$field .= "<a class='$set_active item' data-tab='$tab_key'>$tab_value</a>";
	}
	$field .= "</div>";
	$jquery .= "$('#tabgroup_$id .menu .item').tab();";
	$active = '';
}

if ($tab) {
	if (! $tabs)
		$field .= "</div>";
	
	if ($array_tab[$count_tab] == $tab)
		$set_active = 'active';
	else {
		$set_active = '';
	}
	$field .= "<div class='ui bottom $set_active tab $tab_content_class {$arr['form']['size']}' data-tab='$tab'>";
}

$close = $tabs = $tab = '';
