<?php
$arr ['list'] = array ('id' => 'demo_list','size' => 'small','class' => 'compact celled striped definitio','hover' => true );
$arr ['list'] ['loading_time'] = true;
// $arr ['list'] ['serial'] = false;
$arr ['list'] ['auto_reload'] = array ('label' => 'Auto Reload' ); //,'loader' => FALSE

$arr ['mysql'] ['table'] = "list ";
$arr ['mysql'] ['field'] = "*";
$arr ['mysql'] ['like'] = 'firstname,secondname,category';
$arr ['mysql'] ['limit'] = '20';

$array_category = array ('first' => 'First','second' => 'Second' );

$arr ['checkbox'] = array ('title' => 'ID','label' => '{id}','align' => 'center' );
$arr ['checkbox'] ['buttons'] = array ('class' => 'tiny' );
$arr ['checkbox'] ['button'] ['delete'] = array ('title' => 'Delete','icon' => 'delete','class' => 'red mini' );

$arr ['order'] = array ("array" => array ('id' => 'order by ID','order by Birthday','firstname ' => 'order by Firstname'),'default' => 'id' );

$arr ['filter'] ['category'] = array ('type' => 'dropdown','array' => $array_category,'placeholder' => '-- Categories --' );

$arr ['tr_top'] = array ("align" => 'center' );
$arr ['th_top'] [] = array ('title' => "List",'colspan' => '7');

$arr ['th'] ['firstname'] = array ('title' => "Firstname",'modal' => array ('id' => 'edit','popup' => 'Open' ) );
$arr ['th'] ['secondname'] = array ('title' => "Secondname",'validate' => true );
$arr ['th'] ['birthday'] = array ('title' => "Birthday" );
$arr ['th'] ['category'] = array ('title' => "Category" );

$arr ['tr'] ['buttons'] ['left'] = array ('class' => 'tiny' );
$arr ['tr'] ['button'] ['left'] ['edit'] = array ('title' => '','icon' => 'edit','class' => 'blue mini','popup' => 'Edit', 'align'=>'center' );
$arr ['tr'] ['button'] ['left'] ['edit'] ['onclick'] = "$('#edit>.header').html('{firstname} {secondname}');";
$arr ['tr'] ['button'] ['left'] ['page'] = array ('href'=>'page.php?id={id}','title' => '','icon' => 'file','popup' => 'Page', 'align'=>'center' ); //, 'target' =>'new'

$arr ['top'] ['buttons'] ['groups'] = true;
$arr ['top'] ['button'] ['edit'] = array ('title' => 'Add new user','icon' => 'plus' );
$arr ['top'] ['button'] ['share_link'] = array ('title' => 'Share Link','icon' => 'share alternate','href' => '','target' => 'new','popup' => 'Link','class' => 'blue' );

$arr ['modal'] ['delete'] = array ('title' => 'Remove data(s)','url' => 'ajax/list_form_delete.php','class' => 'small' );

$arr ['modal'] ['edit'] = array ('title' => 'Edit contact','url' => 'ajax/list_form_edit.php','class' => 'small scrolling' );
$arr ['modal'] ['share_link'] = array ('title' => 'Share Link','url' => 'ajax/share_link.php','class' => 'small','focus' => true );
$arr ['modal'] ['edit'] ['button'] ['submit'] = array ('title' => 'Save','color' => 'green','form_id' => 'form_edit' ); //form_id = > ID formular
$arr ['modal'] ['edit'] ['button'] ['more'] = array ('title' => 'More','onclick' => "alert('test');" );
$arr ['modal'] ['edit'] ['button'] ['cancel'] = array ('title' => 'Close','color' => 'grey','icon' => 'close' );
//$arr ['modal'] ['edit'] ['button'] ['submit'] = array ('title' => 'Save','onclick'=>"$('.form_edit.submit').submit();" );