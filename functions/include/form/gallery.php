<?php
$_SESSION['upload_dir'] = $file_dir;
// Url zum anzeigen der Bilder und Daten
$_SESSION['upload_url'] = $server_name . $file_url;

$_SESSION['upload_config'] = array (
	'upload_url' => $_SESSION['upload_url'] ,
	'upload_dir' => $_SESSION['upload_dir'] ,
	'accept_file_types' => "/\.({$accept_files['config']})$/i" ,
	'image_versions' => array ( 'thumbnail' => array ( 'crop' => true , 'max_width' => 200 , 'max_height' => 180 ) ) );

$_SESSION['IgnoreFileList'] = array ( '' );

if (is_dir($_SESSION['upload_dir'])) 
{
	if ($handle = opendir ( $_SESSION['upload_dir'] )) {
		$li_output = '';
		while ( false !== ($card_name = readdir ( $handle )) ) {
			++ $card_id;
			// Nur anzeigen wenn Datei kein DIR ist oder in der IgnoreFileList steht
			if (! in_array ( $card_name, $_SESSION['IgnoreFileList'] ) && is_file ( "{$_SESSION['upload_dir']}/$card_name" )) {
				$card_list .= upload_card_admin ( $_SESSION['upload_url'], $card_name, $card_id );
			}
		}
		closedir ( $handle );
	}
	
	$type_field .= "<div class='ui $card_class doubling cards uploaded-cards'>" . $card_list . "</div>";
}