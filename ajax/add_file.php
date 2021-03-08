<?php
session_start ();
include_once (__DIR__ . '/../functions/filelist.php');

//save image from Webcam
if ($_POST ['imageData']) {

	$name = 'webcam.jpg';

	$num = 0;
	while ( file_exists ( $_SESSION ['upload_dir'] . $name ) == TRUE ) {
		$num ++;
		$name = 'webcam' . $num . '.jpg';
	}

	if (! $name)
		exit ();

	$data = substr ( $_POST ['imageData'], strpos ( $_POST ['imageData'], "," ) + 1 );
	$decodedData = base64_decode ( $data );
	$fp = fopen ( $_SESSION ['upload_dir'] . $name, 'w' );
	fwrite ( $fp, $decodedData );
	fclose ( $fp );
} else {
	$name = $_POST ['name']; // wird mit Ajax übergeben
}

$url = $_SESSION ['upload_url'];
echo upload_card_admin ( $url, $name, '' )?>