<?php
$arr_temp [] = array ('type' => 'on' );
$arr_temp [] = array ('type' => 'on' );
$arr_temp [] = array ('type' => 'off' );
$arr_temp [] = array ('type' => 'off' );

$ebene = 0;

foreach ( $arr_temp as $key => $array ) {

	if ($array ['type'] == 'off') {
		$ebene --;
	} else {
		$ebene ++;
	}

	$array_new [$key] = "key -> $key "  . $array ['type'] . " " . $ebene;
}

echo "<pre>";
var_export ( $array_new );
echo "</pre>";

echo '$arr[0] = array(1);';
//$arr[20] = array(30,40);

$array ['items'] ['207'] = 'test';
$array ['items'] ['210'] = 'test2';

// $array ['parents'] [0] = array ('207','208' );
// $array ['parents'] [207] = array ();
// $array ['parents'] [208] = array ('210' );
//$array ['parents'] [208] = array ('209');

// $array = array (
// 		'items' => array (
// 				207 => array ('menu_text' => 'Startseite'),
// 				208 => array ('menu_text' => 'Kontakt'),
// 				1214 => array ('menu_text' => 'Geschichten'),
// 				1716 => array ('menu_text' => 'News'),
// 				209 => array ('menu_text' => 'Galerie' )
// 		),
// 		'parents' =>
// 		array (
// 				0 => array ('207','208'),
// 				207 => array (),
// 				208 => array (),

// 		)
// );

echo buildMenuAdmin ( '0', $array );

// Erzeugt die Baumstruktur das Menu in einem <ul><li>
function buildMenuAdmin($parentId, $menuData) {
	$html = '';
	if (isset ( $menuData ['parents'] [$parentId] )) {
		if (! $html)
			$html = "<div style='border:1px solid red; margin:5px;'>$parentId";

		foreach ( $menuData ['parents'] [$parentId] as $itemId ) {
			if ($menuData ['items'] [$itemId])
				$html .= "-" . $menuData ['items'] [$itemId];
			$html .= buildMenuAdmin ( $itemId, $menuData );
		}
		$html .= '</div>';
	}
	return $html;
}
		
		