<?
session_start ();
/*
 * Version 2.0
 * // How to USE
 * /*
 * Example => demo/
 * //Tab von anderer Seite aufrufen & Filter wählen, danach List neu laden
 * $('#tab_followup .item').tab('change tab', 'step');
 * call_semantic_table('followup_list','filter','pool_id','{id}' );
 * //indexieren
 * call_list ('array.php','mysql.php',array('option'=>'in')); über das array können parameter übergeben werden, abrufbar über Bsp.:'$data['option']'
 * //jquery - Erweiterung
 * Wenn die Tabelle neu geladen werden soll
 * table_reload() | table_reload('ID') //Bei Verwendung von mehreren Tabellen
 * call_filter (type ='select|button) array ( 'var' => $array2['array'] , 'id' => $key , 'list_id' => $list_id , 'placeholder' => $array2['placeholder'] , 'setting' => $array2['settings'] ) );
 * :
 * :
 * **********************************CONFIG**********************************
 * :
 * #### LIST - Settings
 * $arr['list']['id'] = 'contact_list' (used for refresh the list)
 * $arr['list']['width'] = 600px (%)
 * $arr['list']['align'] = [left|center|right]
 * $arr['list']['size'] = [small|large]
 * $arr['list']['class'] = 'compact celled striped definition' (http://semantic-ui.com/collections/table.html (more config-parameter)
 * $arr['list']['style'] = 'border:1px solid red;'
 * $arr['list']['header'] = false //Default => true
 * $arr['list']['loading_time'] = true //Anzeige Ladezeit
 * $arr['list']['serial'] = false //Fortlaufender Nummerkreislauf wird ausgeblendet
 * $arr['list']['hide'] = true | default => false //Blendet eine Liste aus (Bsp.: Wenn eine bestimmte Gruppe gewählt werden soll
 * $arr['list']['auto_reload'] = true OR array (Bsp.: $arr['list']['auto_reload'] = array ( 'label'=>'Automatisches aktualisieren', 'checked'=>TRUE, 'loader'=>FALSE);)
 * $arr['list']['auto_reload']['checkbox'] = true | false (Default = true)
 * $arr['list']['auto_reload']['ckecked'] = true | false (Default = true)
 * $arr['list']['auto_reload']['label'] = 'Live Aktualisierung' (Default-Text = 'Auto-Reload' )
 * $arr['list']['auto_reload']['loader'] = true | false (Default = true) (Zeigt keinen Loader)
 * :
 * :
 * #### SEARCH
 * $arr['search']['show_empty'] = true; //Zeigt eine leere Liste an und nur wenn nach etwas gesucht wird
 * $arr['search']['hightlight'] = true; //Der Suchtext wird in der Auflistung hervorgehoben
 * $arr['search']['class'] = 'fluid'; //Das Inputfeld wird auf die ganze Seite ausgedehnt
 * $arr['search']['default_text'] = 'Nach gewünschten Begriff suchen'; //Textanzeige wenn noch kein Suchbegriff eingegeben wurd
 * $arr['search']['default_text_notfound'] = 'Es wurden keine Inhalte für den Begriff <b>{data}</b> gefunden.'; //Textanzeige wenn kein Text gefunden wurde
 * $arr['search']['strip_tags'] = true; //Textausgabe wird ohne HTML ausgegeben
 * :
 * :
 * #### MYSQL
 * $arr['mysql']['query'] = 'SELECT id,field1,field2 FROM table WHERE x = 1'; //(alte Version - wird nicht mehr verwendet)
 * $arr['mysql']['table'] = 't1 LEFT JOIN t2 ON t1.id = t2.id
 * $arr['mysql']['table_total'] = 't1'; //or whate ever -> important for total-values //Default: '#table'
 * $arr['mysql']['field'] = 'id,name,date'; // id should be always first !!!
 * $arr['mysql']['export'] = 'id,name;
 * $arr['mysql']['charset'] = 'utf8'; // or true
 * $arr['mysql']['debug'] = true; //zeigt mysql-string an
 * $arr['mysql']['order'] = 'id desc';
 * $arr['mysql']['limit'] = 10;
 * $arr['mysql']['like'] = 'field1,field2';
 * $arr['mysql']['match'] = 'field1,field2';
 * $arr['mysql']['group'] => 'id';
 * :
 * :
 * #### Dropdown - Order BY
 * $arr['order']['array'] = array ('article_id desc'=>'Veröffentlicht','price'=>'Peis aufsteigend','price desc'=>'Peis absteigend');
 * $arr['order']['class'] = ''; //nur die minimal Darstellung wird angezeigt | search,.....
 * $arr['order']['default'] = 'price desc'
 * :
 * :
 * #### Modal - Window (call Modal for Forms)
 * $arr['modal']['MODEL_NAME']['title'] = 'Edit contact';
 * $arr['modal']['MODEL_NAME']['url'] = 'form_path.php?id={id}'; //{id}=Platzhalter für die ID
 * $arr['modal']['MODEL_NAME']['class'] = 'small'; // [small|basic|standard|large|fullscreen];
 * $arr['modal']['MODEL_NAME']['close_button'] = 'hide'; //versteckt den X-Button
 * $arr['modal']['MODEL_NAME']['focus'] = ture; //Autofocus einschalten - erstes Feld wird automatisch gewählt (Default = false)
 * :
 * :
 * #### Buttons on the TOP
 * $arr['top']['buttons']['class'] = 'tiny, red'; //(Use that, if you want to have a cluster for all buttons)
 * $arr['top']['button']['MODEL_NAME']['id'] = 'ID';
 * $arr['top']['button']['MODEL_NAME']['title'] = 'title';
 * $arr['top']['button']['MODEL_NAME']['icon'] = 'edit';
 * $arr['top']['button']['MODEL_NAME']['class'] = 'mini';
 * $arr['top']['button']['MODEL_NAME']['hide'] = true; | default false //Wenn button sporadisch ausgeblendet werden soll
 * $arr['top']['button']['MODEL_NAME']['popup'] = 'Click to edit';
 * $arr['top']['button']['MODEL_NAME']['href']= '{pdf}';
 * $arr['top']['button']['MODEL_NAME']['download']= '{art_title}.pdf'; //download ist der Title des downloads (ohne "download" wird seite in einem neuen Fenster geöffnet)
 * $arr['top']['button']['MODEL_NAME']['single'] = true; //Button wird entkoppelt
 * $arr['top']['button']['MODEL_NAME']['onclick'] = "alert('test');"
 * $arr['top']['button']['MODEL_NAME']['onclick'] = "alert('test'+{ID});";
 * $arr['top']['button']['MODEL_NAME']['filter'] = "SELECT * FROM logfile WHERE error=1"; //(Bsp.)
 * :
 * :
 * #### TH_TOP -> BUTTON LEFT AND RIGHT
 * $arr ['tr_top'] = array ('style' => "background-color:red;", 'align'=>'center');
 * $arr ['th_top'] [] = array ('title' => "Endwert",'colspan' => '1','align'=>'center'); //oberhalb vom Main TH
 * $arr ['tr_bottom'] = array ('style' => "background-color:red;", 'align'=>'center');
 * $arr ['th_bottom'] [] = array ('title' => "Endwert",'colspan' => '1','align'=>'center'); //unterhalb vom Main TH
 * :
 * :
 * #### TH -> MAIN - TH
 * $arr['th'][$name]['title'] = 'FieldName';
 * $arr['th'][$name]['tooltip'] = 'Beschreibung des Feldes';
 * $arr['th'][$name]['info'] = 'Infotext für das Feld';
 * $arr['th'][$name]['align'] = [left|center|right]
 * $arr['th'][$name]['class'] = [right aligned red] selec'table' => Feld ist klickbar (Vor Text <a href=''>text</a>
 * $arr['th'][$name]['class'] = [one|two|.... wide] Column wide
 * $arr['th'][$name]['style'] = 'background-color:red;';
 * $arr['th'][$name]['nowrap'] = true; //Zeilenumbruch verhindern
 * $arr['th'][$name]['href'] = '';
 * $arr['th'][$name]['replace'] = array('default'=>'','1'=>"<i class='icon green check'>{value}</i>",'0'=>"<i class='icon grey check'></i>")"
 * $arr['th'][$name]['replace'] = array('>1'=>"<i class='icon green check'>{value}</i>",'<5'=>"<i class='icon grey check'></i>")" //bigger and smaller
 * $arr['th'][$name]['gallery'] = "path/folder/;
 * $arr['th'][$name]['colspan'] = array ( [ 'field' => 'status' , 'value' => 3, 'operator' => '==' ], col => 2 )
 * $arr['th'][$name]['format'] = 'euro'; (oder andere Formatierungen wied (|,%,Liter,..)
 * $arr['th'][$name]['format'] = 'euro_color'; //euro_color (- Werte werden rot angezeigt)
 * $arr['th'][$name]['total'] = true; //Get total from the field depend from filter
 * :
 * :
 * #### TR -> BUTTON LEFT AND RIGHT
 * $arr ['tr'] = array ('style' => 'background-color:#EEE;',"align" => 'center' ); //Betrifft den gesamten Header
 * :
 * :
 * #### TR -> BUTTON LEFT AND RIGHT
 * $arr ['tr'][buttons]['right|left'] (Use that, if you want to have a cluster for all buttons)
 * $arr ['tr'][buttons]['class'] => 'tiny, red';
 * :
 * :
 * #### TR -> BUTTON LEFT AND RIGHT
 * $arr ['tr']['button']['right|left']['MODEL_NAME'] =
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['title'] = 'Edit';
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['icons'] = 'huge';
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['icon'] = 'edit';
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['icon_corner'] = 'add'; //Zusatz icon zusatz
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['class'] = 'mini';
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['popup'] = 'Click to edit';
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['onclick'] = alert({id}); //id kann als Platzhalter übergeben werden
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['onclick'] = alert({name}); //also alle in der Datenbank befindlichen Werten
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['single'] = true; //Button wird entkoppelt
 * $arr ['tr']['button']['right|left']['MODEL_NAME']['filter'] = array(['field' => 'user_id', 'operator' => '==' , 'value' => 10 (NOW == aktuelles Datum Bsp. 2020-02-20 , 'operator' => '==' ]) (!=, >, <, <=, >=,) //Bsp.: Es werden nur Button angezeigt wenn der user_id = 10 ist
 * : -> 'field' => 'name'
 * : -> 'value' => 'Martin'
 * : -> 'operator' => '==' | (!=, >, <, <=, >=,)
 * : -> 'link' => 'and' | 'or' (bei mehreren Verkettungen Bsp.: array([parameter],[...parameter],[link=>'and',...parameter])
 * : Bsp.: $arr['tr']['button']['left']['pdf'] = array (popup=>'PDF herunterladen frei', href=>'{pdf}', download=>'{art_title}.pdf', 'icon' => 'file pdf outline', 'class' => 'tiny red', 'filter' => array(['field' => 'pdf', 'value' => true ,'operator' => '==' ],[link=>'and','field' => 'free', 'value' => '1' ,'operator' => '==' ]) , single=>true );
 * :
 * :
 * #### FILTER
 * $arr['filter'][$field_id]['array'] = array('1'=>'wert1', '2'=>'wert2');
 * $arr['filter'][$field_id]['id'] = field; // Alte Version kann in kombi mit "table" verwendet werden
 * $arr['filter'][$field_id]['type'] = 'select | button';
 * $arr['filter'][$field_id]['default_value'] = '1'; //Wenn kein Filter gesetzt ist, kann ein Default-Wert geladen werden
 * $arr['filter'][$field_id]['placeholder'] = '--bitte wählen--';
 * $arr['filter'][$field_id]['table'] = 'table'; //Bsp. Bei LEFT JOIN Gleichheit von Feldern
 * $arr['filter'][$field_id]['settings'] = 'maxSelections: 3'; //http://semantic-ui.com/modules/dropdown.html#/examples
 * $arr['filter'][$field_id]['query'] = feld LIKE '{value}%' // komplexe Abfragen bsp.: DATE_FORMAT(date_create,'%Y')
 * $arr['filter'][$field_id]['query'] = "{value}", 'array' => array('pdf>" "'=>'vorhanden','pdf=""' =>'nicht vorhanden'); (ganz spezifisch)!!!
 * $arr['filter'][$field_id]['query'] = "{value}", 'array' => array('(value1 = true or value2 = true)" "'=>'vorhanden','velue3 = true' =>'nicht vorhanden');
 * :
 * :
 * #### JS
 * $arr['js']['js1']['src'] = 'js/list_newsletter.js';
 * $arr['js']['js1']['text'] = "alert('alert')";
 * :
 * :
 * #### CONTENT
 * $arr['content']['bottom'] = 'Content on the top';
 * $arr['content']['top'] = 'Content on the bottom';
 * :
 * :
 * **********************************CONFIG-END*****************************
 */
function call_list($config_path, $mysql_connect_path) {
	$count_th = '';

	$str_default_text_notfound = "<i class='icon search'></i>Keine Einträge für {data} vorhanden.";
	$str_default_text = "Kein Eintrag vorhanden";

	// setzt cookie für wortpath bei reload

	// TODO Geht leider nicht im Smart-Kit kommt Fehler : Cannot modify header information - headers already sent by
	// if ($_SESSION['workpath'])
	// setcookie ( "test", $_SESSION['workpath'], time () + 60 * 60 * 24 * 365, '/', $_SERVER['HTTP_HOST'] );

	// Wird bei Suchanfrage intern weitergereicht, dass sich sonst der WORKPATH ändern würde
	if (! $_POST ['table_reload']) {

		$path_parts = pathinfo ( $_SERVER ['PHP_SELF'] );
		$_SESSION ['workpath'] = $path_parts ['dirname'];

		// Es wir ein manueller Workpath gesetzt
		// if ($data['workpath'])
		// $_SESSION['workpath'] = $data['workpath'];
	} else if ($_COOKIE ["workpath"] && ! $_SESSION ["workpath"]) {
		// Wenn COOKIE gesetzt worden ist wird diese für den Workpath verwendet
		$_SESSION ['workpath'] = $_COOKIE ["workpath"];
	}

	if ($mysql_connect_path) {
		$mysql_connect_path = realpath ( $mysql_connect_path );
		include ($mysql_connect_path);
	}

	$config_path = realpath ( $config_path );
	include ("$config_path");
	// $GLOBALS['mysqli']->query("SET NAMES 'utf8'");

	// $GLOBALS['mysqli']->query("SET NAMES 'utf8'");
	// include ($config_path );
	// include ($mysql_connect_path );
	// Suchbegriff
	// $input_search = $_SESSION['input_search'][$list_id];
	// $input_search = trim ( $input_search );

	if ($list_width) {
		$list_style .= 'max-width:' . $list_width . ';';
	}

	if ($arr ['list'] ['serial'] === false)
		$arr ['list'] ['serial'] = false;
	else
		$arr ['list'] ['serial'] = true;

	// OPTIONS
	$list_align = $arr ['list'] ['align'];
	$list_width = $arr ['list'] ['width'];
	$list_size = $arr ['list'] ['size'];
	$list_class = $arr ['list'] ['class'];
	$list_style = $arr ['list'] ['style'];
	$list_id = $arr ['list'] ['id'];
	$serial = $arr ['list'] ['serial']; // Zeigt fortlaufende Nummer an

	$input_search_array = $_SESSION ['input_search'];
	$input_search = $input_search_array [$list_id];
	$input_search = str_replace ( '\+', '', $input_search );
	$input_search = trim ( $input_search );
	$input_search = preg_replace ( '/(\\\s){2,}/', '$1', $input_search );
	$input_search = preg_replace ( '/\+/', '', $input_search );
	$GLOBALS ['input_search'] = $input_search;

	// Wird übergeben wenn die Table neu geladen werde soll in call_table.php
	$_SESSION ['smart_list_config'] [$list_id] = array ('config_path' => $config_path,'mysql_connect_path' => $mysql_connect_path,'data' => $data );

	// print_r($_SESSION['smart_list_config']);

	// Daten werden in Cookie gespeichert und in call_table verwendet
	if ($_SESSION ['smart_list_config'])
		setcookie ( "smart_list_config", serialize ( $_SESSION ['smart_list_config'] ), time () + 60 * 60 * 24 * 365, '/', $_SERVER ['HTTP_HOST'] );

	if (! $arr ['search'] ['show_empty'] or $GLOBALS ['input_search']) {
		$timeStart = microtime_float ();
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
			$fields_filter .= "<button onclick=\"$('.filter, .$list_id').dropdown('clear'); call_semantic_table('$list_id','reset')\" class='button icon mini ui tooltip' title='Filter zurücksetzen' id='filter_reset'><i class='undo icon'></i></button>";
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
			include (__DIR__ . '/include/list/body.php');
			$no_body = true;
		}

		$timeEnd = microtime_float ();

		include (__DIR__ . '/include/list/header.php');

		if ($serial)
			$count_th ++;
	}

	if ($arr ['search'] ['default_text_notfound']) {
		$default_text_notfound = $arr ['search'] ['default_text_notfound'];
	} else {
		$default_text_notfound = $str_default_text_notfound;
	}

	if ($arr ['search'] ['default_text']) {
		$default_text = $arr ['search'] ['default_text'];
	} else {
		$default_text = $str_default_text;
	}

	if (! $count_line or ! $no_body) {

		if ($input_search) {
			$empty_text = str_replace ( '{data}', $GLOBALS ['input_search'], $default_text_notfound );
		} else
			$empty_text = "$default_text";

		$list_td .= "<tr><td colspan='$count_th' ><br><br><div align=center>$empty_text</div><br><br></td></tr>";
	} else {
		include (__DIR__ . '/include/list/total.php');
	}

	/*
	 * BODY
	 */
	$output_body = "<tbody>";
	$output_body .= $total_tr;
	$output_body .= $list_td;
	//$output_body .= $total_tr;
	$output_body .= "</tbody>";
	/*
	 * FOOT
	 */

	$run_time = round ( $timeEnd - $timeStart, 3 );

	if ($run_time && $arr ['list'] ['loading_time'] === true)
		$loading_time = "<br>(" . $run_time . "sek)";

	if (is_array ( $arr ['modal'] )) {

		foreach ( $arr ['modal'] as $key => $value ) {
			$modal_title = $value ['title'];
			$modal_class = $value ['class'];
			$modal_url = $value ['url'];
			$close_button = $value ['close_button'];

			if ($close_button == 'hide') {
				$close_button2 = '';
				// $close_button = '';
			} else {
				// $close_button = "<i class='close icon'></i>";
				$close_button2 = "<div style='float:right'><a href=# onclick=\"$('#$key').modal('hide'); $('#$key>.content').empty(); \"><i class='close icon'></i></a></div><div style='clear:both'></div>";
			}

			if (isset ( $modal_title ))
				$modal_header = "<div class='header'>$modal_title $close_button2</div>";
			$modal .= "<div id='$key' class='ui modal $modal_class'>$close_button$modal_header<div class='content'></div></div>";
			$modal_header = '';
		}
	}

	/**
	 * *********************************************
	 * Ab hier wird Liste neu geladen bei Reload
	 * ********************************************
	 */
	$output_table .= "<div style='margin-top:12px;' id='$list_id' class='smart_list' >";
	$output_table .= $arr ['content'] ['top'];

	if ($fields_filter) {
		$output_table .= "<div id='$list_id' class='ui form message smart_list_filter'><div class='fields'>$fields_filter</div></div>";
	}

	if ($dropdown_order or $arr ['list'] ['auto_reload']) {

		// $output_array['html'] .= "<div style='padding: 13px 5px 5px 0px'>";

		if ($arr ['list'] ['auto_reload']) {
			$output_table .= "<div style='float:left'>" . list_auto_reload ( $list_id, $arr ['list'] ['auto_reload'] ) . "</div>";
		}

		// $dropdown_order = 1;
		if ($dropdown_order) {
			$output_table .= "<div style='float:right'>" . $dropdown_order . "</div>";
		}

		$output_table .= "<div style='clear:both'></div>";
		// $output_array['html'] .="</div>";
	}

	/**
	 * *******************************************************
	 * Ausgabe der Table oder Liste
	 * *******************************************************
	 */
	if ($arr ['list'] ['template']) {
		// Ausgabe bei Templateausgabe
		$output_table .= "<div align='left'>$output_template</div>";
		$output_table .= $empty_text;
		$output_table .= "<div align='left'>$txt_count_all $txt_count_filter $txt_limitbar $loading_time</div>";
	} else if (! $arr ['list'] ['hide']) {
		// Table - Main
		$output_table .= "<table class='ui table $list_size $list_class' style='$list_style'>";
		$output_table .= $output_order;
		//if ($show_th)
		$output_table .= $output_head;
		$output_table .= $output_body;

		$output_table .= "<tfoot class='full-width'>";
		// FOOTER 2
		$output_table .= "<tr><th colspan=$count_th>$txt_count_all $txt_count_filter $txt_limitbar $loading_time</th></tr></tfoot>";

		$output_table .= "</table>";
	}
	$output_table .= $arr ['content'] ['bottom'] . "</div>";

	$_SESSION ['export'] ['db'] = $arr ['mysql'] ['db'];
	$_SESSION ['export'] ['table'] = $arr ['mysql'] ['table'];
	$_SESSION ['export'] ['filter'] = $sql_export;
	$_SESSION ['export'] ['field'] = $arr ['mysql'] ['export'];

	$doc_root = $_SERVER ['DOCUMENT_ROOT'];
	$static_page_path = preg_replace ( "[$doc_root]", '', (__DIR__) );

	// Outpup - just Table
	if ($_POST ['table_reload']) {
		return $output_table;
	}

	// Like ODER Like&Boolean verwendet wird
	if ($arr ['mysql'] ['like']) {
		// Ladet Liste nach jeder Veränderung im INPUT-Search-Field NEU
		$jquery .= "
		$( '#input_search$list_id' ).on('input', function( event ) { 
			call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());  
		});";
	} elseif ($arr ['mysql'] ['match']) {
		// Wenn Boolean verwendet wird
		// Ladet Liste nach jeder Veränderung im INPUT-Search-Field NEU
		$jquery .= "
		$( '#input_search$list_id' ).on('change', function( event ) {
		call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());
		});
		$( '#input_search$list_id' ).on('input', function( event ) {
		if ($('#input_search$list_id').val() == '') call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());
		})
		";
	}

	if (is_array ( $arr ['js'] )) {
		foreach ( $arr ['js'] as $array_js ) {
			if ($array_js ['text'])
				$add_js_text .= $array_js ['text'];
			if ($array_js ['src'])
				$add_js_src .= "<script type=\"text/javascript\" src=\"{$array_js['src']}\"></script>";
		}
	}

	$js .= "
	<script type=\"text/javascript\">
			$(document).ready(function() {  
				$jquery
				//$('.ui.modal>.content').empty();
				$('.ui.modal').modal({ allowMultiple: true, observeChanges : true, autofocus: false });
				$('.tooltip').popup();
			});
			$add_js_text
	</script>";
	$js .= $add_js_src;

	$output_array ['html'] .= "<div align='$list_align'><div style='max-width:$list_width;'>";

	/**
	 * ********************************************************
	 * Suchfeld + Button (TOP)
	 * ********************************************************
	 */
	if ($arr ['mysql'] ['like'] or $arr ['mysql'] ['match']) {
		// if ($arr['mysql']['like'])
		// $onchange = "onkeydown=\"call_semantic_table('$list_id','input_search','',$('#input_search$list_id').val());\"";
		$head_search = "<input $onchange id = 'input_search$list_id' value='{$GLOBALS['input_search']}' placeholder='Suchbegriff' type='text'><i class='search icon'></i>";
		// $output_array['html'] .= "<div class='ui icon input'><i class='inverted circular search link icon'></i><input id = 'input_search$list_id' class='' type='text' value='$input_search' placeholder='Suchbegriff'></div>";
		$jquery .= "$('#input_search$list_id').focus(); ";
	}
	if ($arr ['mysql'] ['match'])
		$head_search .= "&nbsp;<button class='ui icon button' onclick=$('#input_search$list_id').click >Suchen</button>";

	if ($arr ['top'])

		$head_button .= buttons ( '', $arr, 'top' );

	if ($arr ['top'] ['buttons'] ['align'])
		$buttons_float = $arr ['top'] ['buttons'] ['align'];
	else
		$buttons_float = 'right';

	if ($head_search and ! $head_button) {
		$output_array ['html'] .= "<div class='ui form'><div class='ui {$arr['search']['class']} $list_size icon input focus'>$head_search</div></div><br><hr>";
	} elseif ($head_search or $head_button) {
		$output_array ['html'] .= "<div style='float:left'><div class='ui form'><div class='ui $list_size icon input focus'>$head_search</div></div></div>";
		$output_array ['html'] .= "<div style='float:$buttons_float'>$head_button</div>";
		$output_array ['html'] .= "<div style='clear:both'></div>";
	}

	/**
	 * *******************************************************
	 */

	$output_array ['html'] .= $output_table;
	if ($_SESSION ['export'] ['field'])
		$button_export = "<a href='$static_page_path/plugin/export.php?list_id=$list_id'>[ Export ]</a><br><br>";
	$output_array ['html'] .= $button_export;
	$output_array ['html'] .= "</div></div>";
	$output_array ['html'] .= "<div class='loader'></div>";
	$output_array ['html'] .= $modal;

	$output_array ['js'] = $js_list;
	$output_array ['js'] = $js;

	return $output_array;
}

/*
 * Generate Buttons
 * TOP
 */
function buttons($id, $arr, $pos) {
	if (! is_array ( $arr [$pos] ['button'] ))
		return;

	$list_size = $arr ['list'] ['size'];
	$list_class = $arr ['list'] ['class'];
	$list_style = $arr ['list'] ['style'];

	// Default
	if ($arr [$pos] ['buttons'] ['groups']) {
		$buttons_class = $arr [$pos] ['buttons'] ['class'];
		$button .= "<div class='buttons $buttons_class icon ui'>";
	}

	foreach ( $arr [$pos] ['button'] as $key => $value ) {

		$icon = $value ['icon'];
		$id = $value ['id'];
		$title = $value ['title'];

		if ($key) {
			if ($arr ['modal'] [$key] ['url']) {
				$url = $_SESSION ['workpath'] . "/" . $arr ['modal'] [$key] ['url'];
				$url = preg_replace ( "/{id}/", $id, $url );
				$onclick = "call_semantic_form('$id','$key','$url','{$arr['list']['id']}','{$arr['modal'][$key]['focus']}');";
			}
		}

		if (! $key) {
			$field_id ++;
			$key = 'button-' . $field_id;
		}

		if ($icon)
			$icon = "<i class='icon $icon'></i> ";

		$title = "<span class='smart_form_button_top'>" . $title . "</span>";
		$class = $value ['class'];

		$onclick2 = $value ['onclick'];

		if ($onclick2) {
			$onclick2 = preg_replace ( "/{id}/", $id, $onclick2 );
		}

		if ($value ['filter']) {
			$query = $GLOBALS ['mysqli']->query ( $value ['filter'] ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
			$count = mysqli_num_rows ( $query );
		} else
			$count = 1;

		$single = $value ['single'];

		$popup = $value ['popup'];
		if ($popup)
			$popup = "data-content = '$popup' ";

		if ($onclick or $onclick2)
			$set_button = "<button id = '$id' class='ui button icon $list_size $class' onclick=\"$onclick $onclick2\" $popup >$icon$title</button>";
		else
			$set_button = "<button id = '$id' class='ui button icon $list_size $class'>$icon$title</button>";

		if (! $single)
			$button .= $set_button;
		else
			$button_separat .= $set_button;

		$id = '';
		$title = '';
		$onclick = '';
		$url = '';
	}

	if ($arr [$pos] ['buttons'] ['groups'])
		$button .= "</div>";

	return $button . $button_separat;
}

// Next generation with "position"
// LIST
function buttons2($id, $arr, $pos, $array) {
	if (! is_array ( $arr [$pos] ['buttons'] ['left'] ) and ! is_array ( $arr [$pos] ['buttons'] ['right'] )) {
		$arr [$pos] ['buttons'] ['left'] = $arr [$pos] ['buttons'];
		$arr [$pos] ['button'] ['left'] = $arr [$pos] ['button'];
		$set_position = 'left';
	}
	foreach ( $arr [$pos] ['buttons'] as $position => $value ) {
		if ($set_position)
			$position = $set_position;
		$buttons_class = $arr [$pos] ['buttons'] [$position] ['class'];
		$td_class = $arr [$pos] ['buttons'] [$position] ['td_class'];

		if (is_array ( $arr [$pos] ['buttons'] [$position] )) {

			// Rechbündig wenn Buttons rechts angeordnet sind
			if ($position == 'right')
				$td_class2 .= "right aligned";
			$array [$position] = "<td class='$td_class $td_class2' nowrap><div class='buttons $buttons_class icon ui'>";

			foreach ( $arr [$pos] ['button'] [$position] as $key => $value ) {
				if ($arr [$pos] ['button'] [$position] [$key] ['filter']) {
					$show_button = fu_filter ( $arr [$pos] ['button'] [$position] [$key] ['filter'], $array );
				} else
					$show_button = 1; // Defaultmässig wird der Button immer gezeigt

				// Wird wenn Filter gesetzt ist nicht angezeigt
				if ($show_button) {

					$icons = $value ['icons'];
					$icon = $value ['icon'];
					$icon_corner = $value ['icon_corner'];

					if ($icon_corner) {
						$icon = "<i class='$icons icons'><i class='$icon icon'></i><i class='corner $icon_corner icon'></i></i>";
					} elseif ($icon)
						$icon = "<i class='icon $icon'></i>";

					$title = $value ['title'];
					$class = $value ['class'];

					$onclick2 = $value ['onclick'];
					$download = $value ['download'];
					$href = $value ['href'];
					$single = $value ['single'];
					$GLOBALS ['array'] = $array;

					if ($onclick2) {
						// bei ID
						$onclick2 = preg_replace ( "/{id}/", $id, $onclick2 );
						// bei restlichen Werten aus der Datenbank
						// $onclick2 = preg_replace ( '!{(.*?)}!e', '$array[ \1 ]', $onclick2 );
						$onclick2 = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
							$array = $GLOBALS ['array'];
							return $array [$matches [1]];
						}, $onclick2 );
					}

					if ($download) {
						// $download = preg_replace ( '!{(.*?)}!e', '$array[ \1 ]', $download );

						$download = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
							$array = $GLOBALS ['array'];
							return $array [$matches [1]];
						}, $download );

						$download = "download = '$download' ";
					}

					if ($href) {
						// $href = preg_replace ( '!{(.*?)}!e', '$array[ \1 ]', $href );
						$href = preg_replace_callback ( '!{(.*?)}!', function ($matches) {
							$array = $GLOBALS ['array'];
							return $array [$matches [1]];
						}, $href );
						$href = "href = '$href' target=_new ";
					}

					if ($key) {
						// getcwd — Ermittelt das aktuelle Arbeitsverzeichnis
						// $doc_root = $_SERVER['DOCUMENT_ROOT'];
						// Minus - Absolute path
						// $workpath = preg_replace ( "[$doc_root]", '', getcwd () );
						if ($arr ['modal'] [$key] ['url']) {
							$url = $_SESSION ['workpath'] . "/" . $arr ['modal'] [$key] ['url'];
						} else
							$url = '';

						// wenn on click, definiert wurd, dann wird keine Modal geladen
						if (is_array ( $arr ['modal'] [$key] )) {
							$url = preg_replace ( "/{id}/", $id, $url );
							$onclick = "call_semantic_form('$id','$key','$url','{$arr['list']['id']}','{$arr['modal'][$key]['focus']}'); ";
						} else {
							$onclick = '';
						}
					}

					$popup = $value ['popup'];

					if ($popup)
						$popup = "data-content = '$popup' ";

					if ($onclick or $onclick2)
						$onclick = "onclick=\"$onclick $onclick2\"";
					$button_set = "<a $href class='ui button icon $class $key tooltip' id ='$id' $download $onclick $popup >$icon$title</a>";

					if (! $single)
						$array [$position] .= $button_set;
					else
						$array_single [$position] .= " $button_set";
				}
			}

			if (is_array ( $arr [$pos] ['buttons'] [$position] )) {
				$array [$position] .= "</div>" . $array_single [$position] . "</div>";
			}
		}
	}
	return $array;
}

/**
 * ******************************************************
 * RowSpan für tabellen spalten
 * ******************************************************
 */
function fu_span($filter, $aRow) {
	$ii = '';
	if (! is_array ( $filter ))
		return;

	foreach ( $filter as $array ) {
		// $filter = $filter[0]
		$ii ++;
		$filter_value = $array ['value'];
		$filter_format = $array ['format'];
		$filter_field = $array ['field'];
		$filter_field2 = $array ['field2'];
		$filter_operator = $array ['operator'];
		$filter_link [$ii] = $array ['link'];

		// Aktueller Tag
		if ($filter_value === 'NOW')
			$filter_value = date ( 'Y-m-d' );

		// Wenn Feld zu Feld verglichen werden soll
		if ($filter_field2)
			$filter_value = $aRow [$filter_field2];

		if ($filter_operator == '==' && $aRow [$filter_field] == $filter_value) {
			$value [$ii] = 1;
		} elseif ($filter_operator == '!=' && $aRow [$filter_field] != $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>' && $aRow [$filter_field] > $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>=' && $aRow [$filter_field] >= $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<' && $aRow [$filter_field] < $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<=' && $aRow [$filter_field] <= $filter_value)
			$value [$ii] = 1;
	}

	// Bei OR Verknüpfnug
	if ($filter_link [2] == 'or') {
		if ($value [1] or $value [2])
			return $filter [col];
		// Bei AND Verknüpfung
	} elseif ($filter_link [2] == 'and') {
		if ($value [1] and $value [2])
			return $filter [col];
	} elseif ($value [1])
		return $filter [col];
}

/**
 * ******************************************************
 * FIlTER für Buttons (Für anzeigen oder ausblenden)
 *
 * @param unknown $filter
 * @param unknown $aRow
 * @return number ******************************************************
 */
function fu_filter($filter, $aRow) {
	$ii = '';
	foreach ( $filter as $array ) {
		// $filter = $filter[0]
		$ii ++;
		$filter_value = $array ['value'];
		$filter_format = $array ['format'];
		$filter_field = $array ['field'];
		$filter_field2 = $array ['field2'];
		$filter_operator = $array ['operator'];
		$filter_link [$ii] = $array ['link'];

		// Aktueller Tag
		if ($filter_value === 'NOW')
			$filter_value = date ( 'Y-m-d' );

		// Wenn Feld zu Feld verglichen werden soll
		if ($filter_field2)
			$filter_value = $aRow [$filter_field2];

		if ($filter_operator == '==' && $aRow [$filter_field] == $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '!=' && $aRow [$filter_field] != $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>' && $aRow [$filter_field] > $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '>=' && $aRow [$filter_field] >= $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<' && $aRow [$filter_field] < $filter_value)
			$value [$ii] = 1;
		elseif ($filter_operator == '<=' && $aRow [$filter_field] <= $filter_value)
			$value [$ii] = 1;
	}

	// Bei OR Verknüpfnug
	if ($filter_link [2] == 'or') {
		if ($value [1] or $value [2])
			return 1;
		// Bei AND Verknüpfung
	} elseif ($filter_link [2] == 'and') {
		if ($value [1] and $value [2])
			return 1;
	} else
		return $value [$ii];
}

/**
 * ******************************************************
 * FILTER-LEISTE (DROPDOWN, BUTTONS)
 * ******************************************************
 */
function call_filter($type = 'select', $array, $color = false) {
	$list_id = $array ['list_id'];
	$id = $array ['id'];
	$var = $array ['var'];
	$placeholder = $array ['placeholder'];
	$setting = $array ['setting'];
	$filter_key = "filter_$id";
	$value = $array ['value'];
	$default_value = $array ['default_value'];
	$class = $array ['class'];
	$query = $array ['query'];
	$list_para = $array ['list_para'];
	$list_size = $list_para ['size'];

	if ($array ['table'])
		$table = $array ['table'] . ".";

	$filter_value = $_SESSION ["filter"] [$list_id] [$id];

	if ($value && ! isset ( $filter_value )) {
		$filter_value = $value;
	}

	/**
	 * *********************************************************************
	 * BUTTON - LEISTE
	 * *********************************************************************
	 */
	if ($type == 'button') {
		foreach ( $var as $key => $value ) {

			// Wenn eine Defaultwert gesetzt wurde
			if (! $filter_value && $default_value) {
				$filter_value = $default_value;
			}

			if ($key == $filter_value)
				$add_class = 'active';
			else
				$add_class = '';
			$onclick = "onclick = \"call_semantic_table('$list_id','filter','$id','$key'); $('.filter_button_$list_id').removeClass('active'); $('.filter_button_$list_id#$key').addClass('active'); \" ";
			$array_output ['html'] .= "<button id='$key' class='ui button $class $add_class filter_button_$list_id' $onclick>$value</button>";
		}
	} /**
	 * *********************************************************************
	 * SELECT
	 * *********************************************************************
	 */
	else {
		$class = 'button basic search';

		if (! isset ( $filter_value )) {
			$filter_value = 'all';
		} else {
			if ($filter_value != 'all')
				$color_class = $color;
		}

		// Wenn eine Defaultwert gesetzt wurde
		if (! $filter_value && $default_value) {
			$filter_value = $default_value;
		}

		// Wenn es einen Defaultwert gibt, gibt es keinen Platzhalter
		if (! isset ( $value )) {
			if (! $placeholder)
				$placeholder = "--Bitte wählen--";
			$group_a .= "<div class='item' data-value='all' >$placeholder</div>";
		}

		if (is_array ( $var )) {
			foreach ( $var as $key => $value ) {
				$group_a .= "<div class='item' data-value='$key' >$value</div>";
			}
		}

		$array_output ['html'] .= "
		<div class='field'>
		<div class='$color_class ui $list_size dropdown $class $list_id' id='$filter_key'>
		$button_remove<input name='$filter_key' type='hidden' value='$filter_value'>
		<div class='default text'>$placeholder</div>
		<i class='dropdown icon'></i>
		<div class='menu'>$group_a</div>
		</div>
		</div>";
		// wird direkt geladen, damit der Refresh (und auch Autorfresh funktioniert
		$array_output ['html'] .= "
		<script type=\"text/javascript\">
			$(document).ready(function() { 		
			$('#$filter_key').dropdown({ fullTextSearch : true, onChange(value, text) { call_semantic_table('$list_id','filter','$id',value); }, " . $setting . "});
			});
		</script>	
		";
	}

	// klomplexe Abfragen bsp.: DATE_FORMAT(date_create,'%Y')
	if (isset ( $filter_value ) and $filter_value != 'all') {

		if ($query) {
			if (preg_match ( "/{value}/", $query )) {
				// Ausgabe wenn gesamter Parameter übergeben wird "platzhalter {value}
				$query = preg_replace ( "/{value}/", $filter_value, $query );
				if ($query)
					$array_output ['mysql'] = " AND $query";
			} else
				// klassisch
				$array_output ['mysql'] = " AND $query $field_opterator '$filter_value ' ";
		} else
			// alter Varian
			$array_output ['mysql'] = " AND $table$id = '$filter_value ' ";

		// echo $array_output['mysql'];
	}

	$class = '';

	return $array_output;
}

/*
 * Entfernt Zeilenumbrüche, Breaks und Kommentare
 */
function compress_html($alt) {
	$check = true;
	do {

		$pos1 = strpos ( $alt, '<!--' );
		$pos2 = strpos ( $alt, '-->', $pos1 );

		if ($pos1 === false || $pos2 === false) {
			$check = false;
		} else {
			$alt = substr ( $alt, 0, $pos1 ) . substr ( $alt, $pos2 + 3 );
		}
	} while ( $check );

	$neu = $alt;
	$changed = false;

	do {

		$changed = false;
		if (($tmp = str_replace ( '  ', ' ', $neu )) != $neu) {
			$neu = $tmp;
			$changed = true;
		}
	} while ( $changed );

	$neu = str_replace ( "\r\n", '', $neu );
	$neu = str_replace ( "\n", '', $neu );
	return $neu;
}
function microtime_float() {
	list ( $usec, $sec ) = explode ( " ", microtime () );
	return (( float ) $usec + ( float ) $sec);
}

// Ersetzen eines Wertes durch einene anderen Wert Bsp. 1 wird <i class='icon red eye'></i>
function fu_call_value($value, $array) {
	if (! $array)
		return $value;

	foreach ( $array as $key => $value2 ) {

		if ($key == $value) {

			if (preg_match ( "/{value}/", $value2 )) {
				// Ausgabe wenn gesamter Parameter übergeben wird "platzhalter {value}
				$value2 = preg_replace ( "/{value}/", $value, $value2 );
			}

			return $field_value = $value2;
		} else if (preg_match ( "/>/", $key )) {
			//if value bigger then...
			$split_value = explode ( ">", $key );
			$value2 = preg_replace ( "/{value}/", $split_value [1], $value2 );
			if ($value > $split_value [1])
				return $field_value = $value2;
		} else if (preg_match ( "/>/", $key )) {
			//if value smaller then...
			$split_value = explode ( "<", $key );
			$value2 = preg_replace ( "/{value}/", $split_value [1], $value2 );
			if ($value < $split_value [1])
				return $field_value = $value2;
		}
	}

	if ($array ['default']) {
		$value2 = $array ['default'];
		if (preg_match ( "/{value}/", $array ['default'] )) {

			// Ausgabe wenn gesamter Parameter übergeben wird "platzhalter {value}
			$value2 = preg_replace ( "/{value}/", $value, $array ['default'] );
		}
		return $field_value = $value2;
	}

	return $value;
}

/**
 * ********************************************************
 * Auto RELOAD
 * ********************************************************
 */
function list_auto_reload($list_id, $value) {
	if ($value) {
		if (is_array ( $value )) {
			$label = $value ['label'];
			$checked = $value ['checked'];
			$loader = $value ['loader'];
		}

		if ($checked === FALSE)
			$checked = '';
		else
			$checked = 'checked';
		if (! $label)
			$label = 'Auto Reload';

		$auto_reload = "<div class='ui toggle checkbox'>";
		$auto_reload .= "<input class='reload_table' id='$list_id' $checked type='checkbox'>";
		if ($loader === FALSE)
			$auto_reload .= "<input class='reload_loader' id='$list_id' type='hidden' value='1'>";
		$auto_reload .= "<label>$label</label>";
		$auto_reload .= "</div>";
		return $auto_reload;
	}
}

/**
 * ********************************************************
 * strip_tags, hightlight
 * ********************************************************
 */
function text_output($value) {
	if ($GLOBALS ['arr'] ['search'] ['strip_tags']) {
		if ($GLOBALS ['arr'] ['search'] ['strip_tags'] != true)
			$allowable_tags = $GLOBALS ['arr'] ['search'] ['strip_tags'];

		if ($GLOBALS ['arr'] ['search'] ['strip_tags']) {
			$value = nl2br ( $value );
			$value = preg_replace ( '#<br />(\s*<br />)+#', '<br />', $value );
			$value = preg_replace ( "/<br \/>/", " ", $value );
			$value = strip_tags ( $value, "<a>" );
		}
	}

	if ($GLOBALS ['input_search'] && $GLOBALS ['arr'] ['search'] ['hightlight'])
		$value = preg_replace ( "/{$GLOBALS['input_search']}\w*/i", "<b>$0</b>", $value );
	// $value = preg_replace ( "/\w*?{$GLOBALS['input_search']}\w*/i", "<b>$0</b>", $value );

	return $value;
}

/**
 * **********************************************************
 * gallery
 * **********************************************************
 */
function fu_call_gallery($array) {
	if (! $array ['document_root'])
		$array ['document_root'] = $_SERVER ["DOCUMENT_ROOT"];

	// $images = glob ( $_SERVER["DOCUMENT_ROOT"].$array['img_path'] . "/*.{jpg,png,bmp}" ,GLOB_BRACE );
	$images = glob ( $array ['document_root'] . $array ['img_path_thumb'] . "/*.{jpg,png,bmp}", GLOB_BRACE );
	foreach ( $images as $image ) {
		$image_thumb = $image = preg_replace ( "[{$array['document_root']}]", '/', $image );
		$image = preg_replace ( "[thumbnail/]", '', $image );
		$output .= "<a href='$image' data-fancybox='gallery{$array[id]}' >$image<img class='ui image tooltip' src='$image_thumb' title='Bild vergrößern'></a>";
	}
	if (! $output)
		$output = "<img class='ui image' src='../ssi_smart/smart_form/img/image.png'>";
	return "<div class='ui small rounded images'>" . $output . "</div>";
}

?>