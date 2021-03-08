<?php
include (__DIR__ . '/../inc/mysql.php');
include (__DIR__ . '/../../include_form.php');

if (! $_POST ['delete_id']) {
	$arr ['ajax'] = array ('onload' => "",'success' => "table_reload(); $('#delete').modal('hide');",'dataType' => "html" );
	$arr ['hidden'] ['delete_id'] = $_POST ['update_id'];
	$arr ['hidden'] ['list_id'] = $_POST ['list_id'];
	$arr ['field'] ['password'] = array ('label' => 'Password','type' => 'password','placeholder' => '1234','validate' => true,'focus' => true );
	$arr ['button'] ['submit'] = array ('value' => 'Delete','color' => 'red' );
	$arr ['button'] ['close'] = array ('value' => 'Quit','color' => 'gray','js' => "$('#delete').modal('hide');" );
	$output = call_form ( $arr );
	echo $output ['html'];
	echo $output ['js'];
	exit ();
}

//Execute
if ($_POST ['password'] == '1234') {
	$explode = explode ( ',', $_POST ['delete_id'] );
	foreach ( $explode as $del_value ) {
		$GLOBALS ['mysqli']->query ( "DELETE FROM list WHERE id = '{$del_value}' LIMIT 1 " ) or die ( mysqli_error ( $GLOBALS ['mysqli'] ) );
	}
}