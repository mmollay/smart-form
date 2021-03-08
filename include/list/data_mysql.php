<?php

/**
 * ********************************************************
 * FILTER - SEARCH
 * ********************************************************
 */
$GLOBALS ['arr'] = $arr;

if (is_array ( $arr ['filter'] )) {

	foreach ( $arr ['filter'] as $key => $array2 ) {

		$filter_array = array ('list_para' => $arr ['list'],'class' => $array2 ['class'],'query' => $array2 ['query'],'value' => $array2 ['value'],'table' => $array2 ['table'],'default_value' => $array2 ['default_value'],'var' => $array2 ['array'],'id' => $key,'list_id' => $list_id,
				'placeholder' => $array2 ['placeholder'],'setting' => $array2 ['settings'] );

		$array_filter = call_filter ( $array2 ['type'], $filter_array, 'orange' );

		$fields_filter .= $array_filter ['html'];
		$jquery .= $array_filter ['js'];
		$mysql_filter .= $array_filter ['mysql'];
	}
}

// CLEAR - Button für Select
if ($fields_filter) {
	// $jquery .= "$('#filter_reset').click(function(){ $('.filter, .$list_id').dropdown('clear'); call_semantic_table('$list_id','reset'); });";
	$fields_filter .= "<button onclick=\"$('.filter, .$list_id').dropdown('clear'); call_semantic_table('$list_id','reset')\" class='button icon $list_size ui tooltip' title='Filter zurücksetzen' id='filter_reset'><i class='undo icon'></i></button>";
}

/**
 * ********************************************************
 * ORDER BY
 * ********************************************************
 */
if (is_array ( $arr ['order'] ['array'] )) {
	if (! $arr ['order'] ['class'])
		$arr ['order'] ['class'] = 'inline';
	$array_order = call_filter ( 'select', array ('list_para' => $arr ['list'],'query' => $arr ['order'] ['query'],'var' => $arr ['order'] ['array'],'id' => "order",'list_id' => $list_id,'class' => $arr ['order'] ['class'],'value' => $arr ['order'] ['default'] ) );
	$dropdown_order = $array_order ['html'];
	$jquery .= $array_order ['js'];
}

if (! $_POST ['table_reload'])
	$limit_pos = 0;
else {
	// Limit Position
	$limit_pos = $_SESSION ['limit_pos'] [$list_id];
}

if (! $arr ['mysql'] ['limit'])
	$arr ['mysql'] ['limit'] = '10';
$mysql_limit = $arr ['mysql'] ['limit'];

// MYSQL - Table und Fields speziell definiert
if ($arr ['mysql'] ['table'] && $arr ['mysql'] ['field']) {
	$sql = "SELECT " . $arr ['mysql'] ['field'] . " FROM " . $arr ['mysql'] ['table'] . " WHERE 1 ";

	$sql_count = "SELECT SQL_CALC_FOUND_ROWS * FROM " . $arr ['mysql'] ['table'] . " WHERE 1 ";
} else {
	$sql = $sql_count = $arr ['mysql'] ['query'] . " WHERE 1 ";
}

if ($arr ['mysql'] ['group']) {
	$sql_group .= ' GROUP by ' . $arr ['mysql'] ['group'];
}

if ($arr ['mysql'] ['where']) {
	$sql .= $arr ['mysql'] ['where'];
	$sql_count .= $arr ['mysql'] ['where'];
	$sql_export .= $arr ['mysql'] ['where'];
	$sql_total .= $arr ['mysql'] ['where'];
}

if ($mysql_filter) {
	$sql .= $mysql_filter;
	$sql_count .= $mysql_filter;
	$sql_export .= $mysql_filter;
	$sql_total .= $mysql_filter;
}

if ($arr ['mysql'] ['debug'])
	echo "<pre>Count:<br>" . htmlspecialchars ( $sql_count . $sql_group ) . "</pre><hr>";

$query_count = $GLOBALS ['mysqli']->query ( $sql_count . $sql_group ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
$count_line = mysqli_num_rows ( $query_count );

// 		$result = $GLOBALS ['PDO_db']->prepare ( "$sql_count . $sql_group" );
// 		$result->execute();
// 		$count_line =$result->fetchColumn();
// 		echo "$sql_count . $sql_group";

$limit = $arr ['mysql'] ['limit'];
if ($limit >= $count_line)
	$limit = $count_line;
$txt_count_all = "Einträge: $limit von <b>$count_line</b>";

if ($input_search != '' and $arr ['mysql'] ['like']) {
	$array_explode = explode ( ',', $arr ['mysql'] ['like'] );

	// New version Like (Ausgabe auch auf bei mehreren Spalten wenn diese leer sind
	foreach ( $array_explode as $value ) {
		if ($sql_value)
			$sql_value .= " OR ";
		$sql_value .= "$value LIKE '%$input_search%' ";
	}
	$sql_like = " AND ($sql_value) ";

	// $sql_like = " AND (CONCAT({$arr['mysql']['like']}) LIKE '%$input_search%') ";
	$sql_export .= $sql_like;
	$sql .= $sql_like;
	$sql_count .= $sql_like;
	$sql_total .= $sql_like;
	$query_count_filter = $GLOBALS ['mysqli']->query ( $sql_count . $sql_group ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );

	$count_line = $count_line_filter = mysqli_num_rows ( $query_count_filter );
	$txt_count_filter = "| Gefiltert: <b>$count_line_filter</b>";
}

// wenn mehr als 3 Zeichen sind beginnt die Suche
if (strlen ( $input_search ) > 2 and $arr ['mysql'] ['match']) {

	// hängt ein +voran wenn mehr als ein Wort in der Suchzeile ist
	if (str_word_count ( $input_search, 0, 'äüöÄÜÖß' ) > 1)
		$input_search = "+" . preg_replace ( '/ (\w+)/', ' +$1', $input_search );

	$sql_like .= "AND MATCH({$arr['mysql']['match']}) AGAINST('$input_search' IN BOOLEAN MODE) "; //

	$sql_export .= $sql_like;
	$sql .= $sql_like;
	$sql_count .= $sql_like;

	if ($arr ['mysql'] ['charset']) {
		if ($arr ['mysql'] ['charset'] === true)
			$arr ['mysql'] ['charset'] = 'utf8';
		$GLOBALS ['mysqli']->set_charset ( $arr ['mysql'] ['charset'] );
	}

	$query_count_filter = $GLOBALS ['mysqli']->query ( $sql_count . $sql_group ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
	$count_line = $count_line_filter = mysqli_num_rows ( $query_count_filter );
	$txt_count_filter = "| Gefiltert: <b>$count_line_filter</b>";
}

if ($count_line > $mysql_limit) {

	// $limit_pos = 1;
	/**
	 * ********************************************************************
	 * LIMIT-Bar [1][2]][3]...
	 * ********************************************************************
	 */
	// $count_line..... Anzahl aller Db-Sätze;
	// $mysql_limit.... Max Anzahl der Db-Sätze pro Aufruf
	// $limit_pos...... Positon des aktuellen Zeigers
	// $limit_pos_prev. Vorhergehende Position
	// $limit_pos_next. Nächste Position
	$count_item = ceil ( $count_line / $mysql_limit );

	if (is_numeric ( $limit_pos )) {
		$limit_pos_prev = $limit_pos - 1;
	}

	if (is_numeric ( $limit_pos )) {
		$limit_pos_next = $limit_pos + 1;
	}
	// Maxiamale Anzahl der Felder

	$max_field_item = 15;

	if ($count_item > $max_field_item)
		$count_item = $max_field_item;

	$txt_limitbar = "<div class='ui right floated pagination menu'>";
	if ($limit_pos > 0)
		$txt_limitbar .= "<a class='icon item' onclick = \"call_semantic_table('$list_id','limit_pos','',$limit_pos_prev);\" ><i class='left chevron icon'></i></a>";

	for($iii = 0; $iii < $count_item; $iii ++) {
		if ($limit_pos == $iii)
			$item_class = 'active';
		else
			$item_class = '';
		$iii_text = $iii + 1;
		$txt_limitbar .= "<a class='item $item_class' onclick = \"call_semantic_table('$list_id','limit_pos','',$iii);\" >$iii_text</a>";
	}

	if ($count_item > $limit_pos_next)
		$txt_limitbar .= "<a class='icon item' onclick = \"call_semantic_table('$list_id','limit_pos','',$limit_pos_next);\" ><i class='right chevron icon'></i></a>";
	$txt_limitbar .= "</div>";
}

// Wenn weniger als 5 Einträge sind wird der Zähler zurückgesetzt
// TODO: Der Zähler soll überhaupt zurück gesetzt werden - Muss aber noch überarbeitet werden 04.07.2016

if ($limit < 5) {
	$limit_pos = 0;
}

if (! $limit_pos)
	$limit_pos = "0";
else
	$limit_pos = $limit_pos * $mysql_limit;

$sql .= $arr ['mysql'] ['in'];

if ($arr ['mysql'] ['group'])
	$sql .= $sql_group;

$sql_export .= $sql_group;

if ($arr ['order'] ['default']) {
	$arr ['mysql'] ['order'] = $arr ['order'] ['default'];
}
if ($arr ['mysql'] ['order']) {
	if ($_SESSION ['filter'] [$list_id] ['order'])
		$arr ['mysql'] ['order'] = $_SESSION ['filter'] [$list_id] ['order'];
	$sql .= ' ORDER BY ' . $arr ['mysql'] ['order'];
	$sql_export .= ' ORDER BY ' . $arr ['mysql'] ['order'];
}

if ($mysql_limit)
	$sql .= ' LIMIT ' . $limit_pos . ',' . $mysql_limit;

// $GLOBALS['mysqli']->query("SET NAMES 'utf8'");

if ($arr ['mysql'] ['debug'])
	echo "<pre>List:<br>" . htmlspecialchars ( $sql ) . "</pre>";

// mysql_set_charset('utf8');

if ($arr ['mysql'] ['charset']) {
	if ($arr ['mysql'] ['charset'] === true)
		$arr ['mysql'] ['charset'] = 'utf8';
	$GLOBALS ['mysqli']->set_charset ( $arr ['mysql'] ['charset'] );
}
$query = $GLOBALS ['mysqli']->query ( $sql ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
while ( $array = mysqli_fetch_array ( $query ) ) {

	include (__DIR__ . '/body.php');
	$no_body = true;
}
