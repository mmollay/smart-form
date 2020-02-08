<?php
$arr ['list'] = array ('id' => 'demo_list','size' => 'small','class' => 'compact celled striped definitio' );
$arr ['mysql'] ['table'] = "list ";
$arr ['mysql'] ['field'] = "*";
$arr ['mysql'] ['like'] = 'firstname,secondname';
$arr ['mysql'] ['limit'] = '20';
$arr ['th'] ['firstname'] = array ('title' => "Firstname" );
$arr ['th'] ['secondname'] = array ('title' => "Secondname" );
$arr ['th'] ['birthday'] = array ('title' => "Birthday" );
$arr ['tr'] ['buttons'] ['left'] = array ('class' => 'tiny' );
$arr ['tr'] ['button'] ['left'] ['edit'] = array ('title' => '','icon' => 'edit','class' => 'blue mini','modal' => 'edit','popup' => 'Edit' );
$arr ['modal'] ['edit'] = array ('title' => 'Edit contact','url' => 'ajax/list_form_edit.php','class'=>'small' );
$arr ['top'] ['buttons'] = array ('class' => 'tiny' );
$arr ['top'] ['button'] ['edit'] = array ('title' => 'Add new user','icon' => 'plus','class' => 'blue mini' );