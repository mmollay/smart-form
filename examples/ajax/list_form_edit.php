<?php
include (__DIR__ . '/../inc/mysql.php');
include (__DIR__ . '/../../include_form.php');

$arr ['sql'] = array ('query' => "SELECT * FROM list WHERE id = '{$_POST['update_id']}'" );
$arr ['form'] = array ('id' => 'form_edit','action' => "ajax/list_form_save.php" );
$arr ['field'] [] = array ('type'=>'div', 'class'=>'three fields');
$arr ['field'] ['firstname'] = array ('type' => 'input','label' => 'Firstname','placeholder' => 'Firstname','focus' => true,'validate' => true );
$arr ['field'] ['secondname'] = array ('type' => 'input','label' => 'Secondname','placeholder' => 'Secondnames' );
$arr ['field'] ['birthday'] = array ('type' => 'date','label' => 'Birthday');
$arr ['field'] [] = array ('type'=>'div_close');
$arr ['field'] ['category'] = array ('type' => 'dropdown','label' => 'Category', 'array'=>array('first'=>'First','second'=>'Second') );
$arr ['field'] ['info'] = array ('type' => 'textarea','placeholder' => 'Message' );
$arr ['field'] ['info2'] = array ('type' => 'textarea','placeholder' => 'Message' );
$arr ['field'] ['info3'] = array ('type' => 'textarea','placeholder' => 'Message' );
//$arr ['button'] ['submit'] = array ('value' => 'Save Contact','color' => 'green','icon' => 'send' );
// $arr ['button'] ['close'] = array ('value' => 'Quit','color' => 'gray','js' => "$('#edit').modal('hide');" );

$output = call_form ( $arr );
echo $output ['html'];
echo $output ['js'];