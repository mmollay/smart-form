<?php
$arr ['list'] = array ('id' => 'demo_list','size' => 'small','class' => 'compact celled striped definitio' );
$arr ['list'] ['template'] = "<div class='ui message'>{firstname} {secondname}<br>Birthday {birthday}</div>";

$arr ['mysql'] ['table'] = "list ";
$arr ['mysql'] ['field'] = "*";
$arr ['mysql'] ['like'] = 'firstname,secondname';
$arr ['mysql'] ['limit'] = '20';

$arr ['top'] ['buttons'] = array ('class' => 'tiny' );
$arr ['top'] ['button'] ['edit'] = array ('title' => 'Add new user','icon' => 'plus','class' => 'blue mini' );

$arr ['modal'] ['edit'] = array ('title' => 'Edit contact','url' => 'ajax/list_form_edit.php','class' => 'small' );
$arr ['modal'] ['edit'] ['button'] ['cancel'] = array ('title' => 'Close','color' => 'green','icon' => 'close' );