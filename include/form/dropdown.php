<?php

//Werte werden aus der Datenbank geladen
if ($array_mysql) {
	$dropdown_query = $GLOBALS ['mysqli']->query ( $array_mysql ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
	while ($dropdown_array = mysqli_fetch_array ( $dropdown_query )) {
		$array[$dropdown_array[0]] = $dropdown_array[1];
		
	}
}
$array_mysql = '';
if (! is_array($array)) {
    $array_name = $array;
    $array = call_array($array);
} // functions/filelist.php

if ($max)
    $array = get_array_number_range($min, $max, $step);

if ($placeholder === '')
    $placeholder = "--Please choose--";

// else
// $option .= "<div class='item' data-value='' >$placeholder</div>";

if (! $filter_value)
    $filter_value = '';
// $filter_value = 'all';

if ($type == 'multiselect') {
    $class_add = 'multiple';
} else
    $class_add = '';

// Wenn Placeholder ausgeblendet wird, wird der defaultmäßig der erste Werte angezeigt
if (! $value && ! $placeholder)
    $value = $first_value;

if (! is_array($value)) {
    // Erzeugt ein Array
    $value = explode(',', $value);
}

// Wandelt in Json um
$value = json_encode($value);
// Übergabe des Wertes

if ($value) {
    $jquery .= "\n\t$('#dropdown_$id').dropdown('set selected',$value); ";
}

$jquery .= "\n\t$('#dropdown_$id').dropdown({forceSelection: false, fullTextSearch : true, " . $settings . "}); ";

if ($url) {
    $jquery .= "\n\t$('#dropdown_$id').dropdown({ apiSettings: { url: '$url', cache : false, saveRemoteData:false } }); ";
    $url = '';
}

if ($onchange) {
    $jquery .= "\n\t $('#dropdown_$id').dropdown('setting', 'onChange', function (value, text, $selectedItem) { $onchange });";
    $onchange = '';
}

if (is_array($array)) {
    foreach ($array as $key2 => $value2) {

        if ($array_name == 'country')
            $flag = "<i class='$key2 flag'></i>";
        else
            $flag = '';

        if (! $first_value)
            $first_value = $key2;

        if (preg_match('/title_/', $key2)) {
            $option .= "<div class='ui horizontal divider'>$value2</div>";
            $class_optgroup = 'optgroup';
        } else {
            $option .= "<div style='$option_style' class='item' id='$key2' data-value='$key2' value='$key2'>$flag$value2</div>";
        }

        // if ($value == $key2)
        // $dropdown_selected = 'selected';
        // else
        // $dropdown_selected = '';
        // $option .= "<option value='$key2' $dropdown_selected >$value2</option>";
    }
    $array_name = '';
}

if ($search == "search") {
    $class_search = " search";
}

// Wenn in class "search" eingegeben wurde
if (preg_match("/search/", $class)) {
    $class_search = " search";
}

if ($clear or $clearable)
    $clearable = 'clearable ';

if ($column) {
    $column = " $column column";
}

if ($long)
    $long = ' long';
    
// echo "<br>dropdown_$id = ".$value;
$type_field = "
	$column<div class='ui $clearable $column $long selection $class_select $class_search $class_add dropdown $class_optgroup $id' id='dropdown_$id' style='$style'>
	<input id='$id' class='$form_id $class_input ui-dropdown' type='hidden' name='$id'>
	<i class='dropdown icon'></i>$dropdown_icon_remove<div class='default text'>$placeholder</div>
	<div class='menu'>$option</div>
	</div>";

$option = '';
$dropdown_icon_remove = '';
$clear = '';
$clearable = '';
$array = array();
$onchange = '';
$option = '';
$settings = '';
$value = '';