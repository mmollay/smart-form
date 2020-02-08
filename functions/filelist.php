<?php
/**
 * *******************************************************************************************************************
 * ARRAY für alle gültigen Länder!
 * *******************************************************************************************************************
 */
function call_array($key) {
	$array ['color'] = array ('tranparent' => '<a class="ui tranparent empty circular label"></a>Transparent','basic' => '<a class="ui basic empty circular label"></a>Basic','teal' => '<a class="ui teal empty circular label"></a>Teal',
			'orange' => '<a class="ui orange empty circular label"></a>Orange','yellow' => '<a class="ui yellow empty circular label"></a>Gelb','olive' => '<a class="ui olive empty circular label"></a>Olive','green' => '<a class="ui green empty circular label"></a>Grün',
			'blue' => '<a class="ui blue empty circular label"></a>Blau','violet' => '<a class="ui violet empty circular label"></a>Violet','purple' => '<a class="ui purple empty circular label"></a>Purple','pink' => '<a class="ui pink empty circular label"></a>Pink',
			'brown' => '<a class="ui brown empty circular label"></a>Braun','red' => '<a class="ui red empty circular label"></a>Rot','grey' => '<a class="ui grey empty circular label"></a>Grau','black' => '<a class="ui black empty circular label"></a>Schwarz' );

	$array ['timezone'] = DateTimeZone::listIdentifiers ();

	$array ['country'] = array ('at' => 'Österreich','de' => 'Deutschland','ch' => 'Schweiz','af' => 'Afghanistan','ax' => 'Aland Islands','al' => 'Albania','dz' => 'Algeria','as' => 'American Samoa','ad' => 'Andorra','ao' => 'Angola','ai' => 'Anguilla','ag' => 'Antigua','ar' => 'Argentina',
			'am' => 'Armenia','aw' => 'Aruba','au' => 'Australia','at' => 'Österreich','az' => 'Azerbaijan','bs' => 'Bahamas','bh' => 'Bahrain','bd' => 'Bangladesh','bb' => 'Barbados','by' => 'Belarus','be' => 'Belgium','bz' => 'Belize','bj' => 'Benin','bm' => 'Bermuda','bt' => 'Bhutan',
			'bo' => 'Bolivia','ba' => 'Bosnia','bw' => 'Botswana','bv' => 'Bouvet Island','br' => 'Brazil','vg' => 'British Virgin Islands','bn' => 'Brunei','bg' => 'Bulgaria','bf' => 'Burkina Faso','ar' => 'Burma','bi' => 'Burundi','tc' => 'Caicos Islands','kh' => 'Cambodia','cm' => 'Cameroon',
			'ca' => 'Canada','cv' => 'Cape Verde','ky' => 'Cayman Islands','cf' => 'Central African Republic','td' => 'Chad','cl' => 'Chile','cn' => 'China','cx' => 'Christmas Island','cc' => 'Cocos Islands','co' => 'Colombia','km' => 'Comoros','cg' => 'Congo Brazzaville','cd' => 'Congo',
			'ck' => 'Cook Islands','cr' => 'Costa Rica','cici' => 'Cote Divoire','hr' => 'Croatia','cu' => 'Cuba','cy' => 'Cyprus','cz' => 'Czech Republic','dk' => 'Denmark','dj' => 'Djibouti','dm' => 'Dominica','do' => 'Dominican Republic','ec' => 'Ecuador','eg' => 'Egypt','sv' => 'El Salvador',
			'gb' => 'England','gq' => 'Equatorial Guinea','er' => 'Eritrea','ee' => 'Estonia','et' => 'Ethiopia','eu' => 'European Union','fk' => 'Falkland Islands','fo' => 'Faroe Islands','fj' => 'Fiji','fi' => 'Finland','fr' => 'France','gf' => 'French Guiana','pf' => 'French Polynesia',
			'tf' => 'French Territories','ga' => 'Gabon','gm' => 'Gambia','ge' => 'Georgia','de' => 'Deutschland','gh' => 'Ghana','gi' => 'Gibraltar','gr' => 'Greece','gl' => 'Greenland','gd' => 'Grenada','gp' => 'Guadeloupe','gu' => 'Guam','gt' => 'Guatemala','gw' => 'Guinea-Bissau',
			'gn' => 'Guinea','gy' => 'Guyana','ht' => 'Haiti','hm' => 'Heard Island','hn' => 'Honduras','hk' => 'Hong Kong','hu' => 'Hungary','is' => 'Iceland','in' => 'India','io' => 'Indian Ocean Territory','id' => 'Indonesia','ir' => 'Iran','iq' => 'Iraq','ie' => 'Ireland','il' => 'Israel',
			'it' => 'Italy','jm' => 'Jamaica','jp' => 'Japan','jo' => 'Jordan','kz' => 'Kazakhstan','ke' => 'Kenya','ki' => 'Kiribati','kw' => 'Kuwait','kg' => 'Kyrgyzstan','la' => 'Laos','lv' => 'Latvia','lb' => 'Lebanon','ls' => 'Lesotho','lr' => 'Liberia','ly' => 'Libya','li' => 'Liechtenstein',
			'lt' => 'Lithuania','lu' => 'Luxembourg','mo' => 'Macau','mk' => 'Macedonia','mg' => 'Madagascar','mw' => 'Malawi','my' => 'Malaysia','mv' => 'Maldives','ml' => 'Mali','mt' => 'Malta','mh' => 'Marshall Islands','mq' => 'Martinique','mr' => 'Mauritania','mu' => 'Mauritius',
			'yt' => 'Mayotte','mx' => 'Mexico','fm' => 'Micronesia','md' => 'Moldova','mc' => 'Monaco','mn' => 'Mongolia','me' => 'Montenegro','ms' => 'Montserrat','ma' => 'Morocco','mz' => 'Mozambique','na' => 'Namibia','nr' => 'Nauru','np' => 'Nepal','an' => 'Netherlands Antilles',
			'nl' => 'Netherlands','nc' => 'New Caledonia','pg' => 'New Guinea','nz' => 'New Zealand','ni' => 'Nicaragua','ne' => 'Niger','ng' => 'Nigeria','nu' => 'Niue','nf' => 'Norfolk Island','kp' => 'North Korea','mp' => 'Northern Mariana Islands','no' => 'Norway','om' => 'Oman',
			'pk' => 'Pakistan','pw' => 'Palau','ps' => 'Palestine','pa' => 'Panama','py' => 'Paraguay','pe' => 'Peru','ph' => 'Philippines','pn' => 'Pitcairn Islands','pl' => 'Poland','pt' => 'Portugal','pr' => 'Puerto Rico','qa' => 'Qatar','re' => 'Reunion','ro' => 'Romania','ru' => 'Russia',
			'rw' => 'Rwanda','sh' => 'Saint Helena','kn' => 'Saint Kitts and Nevis','lc' => 'Saint Lucia','pm' => 'Saint Pierre','vc' => 'Saint Vincent','ws' => 'Samoa','sm' => 'San Marino','gs' => 'Sandwich Islands','st' => 'Sao Tome','sa' => 'Saudi Arabia','sn' => 'Senegal','cs' => 'Serbia',
			'rs' => 'Serbia','sc' => 'Seychelles','sl' => 'Sierra Leone','sg' => 'Singapore','sk' => 'Slovakia','si' => 'Slovenia','sb' => 'Solomon Islands','so' => 'Somalia','za' => 'South Africa','kr' => 'South Korea','es' => 'Spain','lk' => 'Sri Lanka','sd' => 'Sudan','sr' => 'Suriname',
			'sj' => 'Svalbard','sz' => 'Swaziland','se' => 'Sweden','ch' => 'Switzerland','sy' => 'Syria','tw' => 'Taiwan','tj' => 'Tajikistan','tz' => 'Tanzania','th' => 'Thailand','tl' => 'Timorleste','tg' => 'Togo','tk' => 'Tokelau','to' => 'Tonga','tt' => 'Trinidad','tn' => 'Tunisia',
			'tr' => 'Turkey','tm' => 'Turkmenistan','tv' => 'Tuvalu','ug' => 'Uganda','ua' => 'Ukraine','ae' => 'United Arab Emirates','us' => 'United States','uy' => 'Uruguay','um' => 'Us Minor Islands','vi' => 'Us Virgin Islands','uz' => 'Uzbekistan','vu' => 'Vanuatu','va' => 'Vatican City',
			've' => 'Venezuela','vn' => 'Vietnam','wf' => 'Wallis and Futuna','eh' => 'Western Sahara','ye' => 'Yemen','zm' => 'Zambia','zw' => 'Zimbabwe' );
	return $array [$key];
}

// Generate Number-Range for Select, Slider and Radio
function get_array_number_range($min, $max, $step = 1) {
	if ($max) {
		if (! $min)
			$min = '0';
		for($ii = $min; $ii <= $max; $ii ++) {
			$count_step ++;
			if ($count_step == $step) {
				$array [$ii] = $ii;
				$count_step = 0;
			}
		}
	}
	return $array;
}

// CHECK JSON
function isJson($string) {
	json_decode ( $string );
	return (json_last_error () == JSON_ERROR_NONE);
}

// Multi-Valitdate with array
function call_validate($id, $validate) {
	if (is_array ( $validate )) {
		foreach ( $validate as $type => $prompt ) {

			if (! $prompt) {
				$prompt = 'Eingabe überprüfen';
			}

			$rules .= "{ type: 'empty', prompt: '$prompt'},";
		}
		$output = "'$id': { identifier: '$id', rules: [$rules] },";
		$rules = '';
	} else {

		if ($validate === true)
			$validate = 'empty';
		if (! $prompt)
			$prompt = 'Eingabe überprüfen';

		// Wenn mehr als 1 type gewählt wird, dann wird "empty" verwendet und
		if (str_word_count ( $validate ) > 1) {
			$prompt = "$validate";
			$validate = 'empty';
		}

		if ($validate == 'empty') {
			$output = "'$id': { identifier: '$id', rules: [{ type: '$val_type', prompt: '$prompt'}] },";
		} elseif ($validate) {
			$output = "'$id': { identifier: '$id', rules: [{ type: '$validate', prompt: '$prompt'},{ type: 'empty', prompt: '$prompt'}] },";
		}
	}
	return $output;
}

// FORMART US -> EU format
function set_format($format, $output) {
	$output = trim ( $output );
	$output = doubleval ( $output );
	if ($format == 'euro') {
		// $output = str_replace('.', ',', $output);
		$output = number_format ( $output, 2, ',', '' );
	} elseif ($format == 'dollar') {
		$output = number_format ( $output, 2, '.', '' );
	} elseif ($format == 'percent' || $format == '%') {
		$output = number_format ( $output, 2, '.', '' );
	}

	if ($output == '0,00')
		$output = '';
	return $output;
}

// UPDALOAD IMAGE
function upload_imagelist($dir, $url, $class = 'five') {
	if (is_dir ( $dir )) {

		$_SESSION ['IgnoreFileList'] = array ('.','..','thumbnail' );
		if ($handle = opendir ( $dir )) {
			$li_output = '';
			while ( false !== ($name = readdir ( $handle )) ) {
				++ $id;
				if (! in_array ( $name, $_SESSION ['IgnoreFileList'] )) {

					// Prüft ob es sich um ein Bild handelt
					if (getimagesize ( "$dir/$name" )) {
						if (is_file ( "$dir/thumbnail/" . $name )) {
							$thumb_url = "$url/thumbnail/$name";
						} else
							$thumb_url = "$url/$name";

						$list .= "
						<div class='card' id='card$id'>
							<a class='image fancybox' rel='fncbx' href='$url/$name' title='{$name}'><img src='$thumb_url'></a>
						</div>";
					}
				}
			}
			closedir ( $handle );
		}
	}
	if ($list) {
		$array_output ['html'] = "<div class='ui link $class cards'>" . $list . "</div>";

		// $array_output['html'] .= "
		// <script type=\"text/javascript\">
		// $(document).ready(function() {

		// $(\"[rel='fncbx']\").fancybox({
		// caption : {
		// type : 'outside'
		// },
		// openEffect : 'elastic',
		// closeEffect : 'elastic',
		// nextEffect : 'elastic',
		// prevEffect : 'elastic'
		// });
		// });
		// </script>";

		// TODO ??? weiß nicht mehr wofür das gut war!! :D
		// $array_output['js'] = " $('#$id').val('http://{$_SERVER['SERVER_NAME']}.$workpath$name});";
	}

	return $array_output;
}

// Erzeugt eine Array zur Weiterverarbeitung
function array_imageslist($dir) {
	$_SESSION ['IgnoreFileList'] = array ('.','..','thumbnail' );
	if ($handle = opendir ( $dir )) {
		while ( false !== ($name = readdir ( $handle )) ) {
			++ $id;
			if (! in_array ( $name, $_SESSION ['IgnoreFileList'] )) {
				$array [] = $name;
			}
		}
		closedir ( $handle );
	}
	return $array;
}

/**
 * ***************************************************************************************
 * Generiert eine Liste von Bilder mit Löschfunktion
 *
 * @param
 *        	Folder wo Bilder abgerufen werden $dir
 * @param
 *        	Direkter Pfad für die Ausgbabe der Bilder $url
 * @return string Verwendung Bsp.: bei der Bazaranzeige Details
 *        
 *         **************************************************************************************
 */
function upload_card_admin($url, $name, $id) {
	$pathinfo = pathinfo ( $_SESSION ['upload_dir'] . "/$name" );
	$extension = strtolower ( $pathinfo ['extension'] );

	$sortable = $_SESSION ['arr_cart'] ['sortable'];
	$removeable = $_SESSION ['arr_cart'] ['removeable'];

	// name der Datei ausgeben
	if (strlen ( $name ) >= 20) {
		$file_name = substr ( $name, 0, 9 ) . "...";
	} else
		$file_name = $name;

	switch ($extension) {

		case 'pdf' :
			$type = 'content';
			$content = "<div align=center><br><i class='icon big red file pdf outline'></i><br>$file_name</div>";
			break;
		case 'gif' :
		case 'jpg' :
		case 'jpeg' :
		case 'png' :

			// ID wird erzeugt und benötigt für das unmittelbare Löschen
			if (! $id)
				$id = mt_rand ();
			$image_path = $_SESSION ['upload_dir'] . "$name";
			$image_path_thumb = $_SESSION ['upload_dir'] . "thumbnail/$name";

			// Parameter sind gesetzt in include_file_upload.php
			$thumbnail_max_width = $_SESSION ['upload_config'] ['image_versions'] ['thumbnail'] ['max_width'];
			$thumbnail_max_height = $_SESSION ['upload_config'] ['image_versions'] ['thumbnail'] ['max_height'];
			$thumbnail_crop = $_SESSION ['upload_config'] ['image_versions'] ['thumbnail'] ['crop'];

			$file_time1 = filemtime ( $image_path );

			// auslesen und vergleichen ob sich die Thumbnailwerte verändert haben
			if (is_file ( $image_path_thumb )) {
				list ( $thumb_width, $thumb_height, $type, $attr ) = getimagesize ( $image_path_thumb );
				if ($thumb_width != $thumbnail_max_width or $thumb_height != $thumbnail_max_height)
					$set_new_tumbnail = true;
				else
					$set_new_tumbnail = false;
			}

			// Ausführen wenn Thumbnail nicht vorhanden ist
			if (! is_file ( $_SESSION ['upload_dir'] . "/thumbnail/$name" ) or $set_new_tumbnail) {
				// ThumbDir erzeugen wenn es noch nicht vorhanden ist
				if (! is_dir ( $_SESSION ['upload_dir'] . "/thumbnail/" ))
					exec ( "mkdir {$_SESSION['upload_dir']}/thumbnail/" );
				include_once (__DIR__.'/../phpthumb/ThumbLib.inc.php');
				// Thumbnail erzeugen mit den Paramenter vom Config (siehe include_file_uplaod.inc.php
				$thumb = PhpThumbFactory::create ( $image_path );
				$thumb->adaptiveResize ( $thumbnail_max_width, $thumbnail_max_height )->save ( $image_path_thumb );

				$file_time1 = filemtime ( $_SESSION ['upload_dir'] . "/thumbnail/$name" );
			}
			$url_thumbnail_path = "{$url}thumbnail/$name" . "?" . $file_time1;

			$content = "<img class='tooltip' title='$name' src='$url_thumbnail_path'>";
			break;

		default :
			$content = "<div class='content tooltip' align=center title='$name'><br><i class='icon huge file text outline'></i>$file_name</div>";
			break;
	}

	if ($sortable)
		$button_sortable = "<a class='ui button icon mini button_move'><i class='icon move'></i></a>";

	if ($removeable)
		$button_removeable = "<a onclick=\"smart_form_del_file('$name','$id'); return false;\" class='ui button icon red mini'><i class='icon delete'></i></a>";

	return "
		<div class='card uploaded-card' id='sort_$id'>
			<div class='blurring  dimmable image $type'><div class='ui dimmer'><div class='content'><div class='center'>
			$button_removeable$button_sortable
			</div></div></div>
			$content 
			</div>
		</div>";
}
