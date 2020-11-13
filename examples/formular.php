<?
include_once ("../include_form.php");

// Data for Content
$arr ['value'] = array ('title' => 'Title','text' => 'This is a test' );
$arr ['value'] ['content'] = 'Max Muster';
$arr ['value'] ['age'] = '10';

// Header
$arr ['header'] = array ('title' => "Formular",'text' => 'here you get it','class' => 'small red','segment_class' => 'attached message','icon' => 'newspaper red' );
$arr ['footer'] = array ('text' => "Have a nice time",'segment_class' => 'attached message' );

// Config - Fields
$arr ['form'] = array ('id' => 'form_newsletter','action' => 'ajax/handler.php','class' => 'segment attached','width' => '800','align' => 'center' );
$arr ['ajax'] = array ('success' => "$('#show_data').html(data);",'dataType' => 'html' ); //,'onLoad' => "alert('Hallo');" 

$arr ['field'] ['content'] = array ('type' => 'content','text' => "<b>This is:</b> {data}" );
$arr ['field'] ['drop'] = array ('type' => 'dropdown','label' => 'Drop','search' => true,'clearable' => true,'array' => array ('wood' => 'Wood','water' => 'Water' ) );

// Tabs --------------------------------------------
$arr ['tab'] = array ('tabs' => [ "first" => "First","second" => "Second" ],'active' => 'first' );

$arr ['field'] ['tab_input1'] = array ('tab' => 'first','type' => 'input','label' => 'First','placeholder' => 'First' );
$arr ['field'] ['age'] = array ('tab' => 'first','type' => 'slider','label' => 'Age','step' => '5','smooth' => true,'class' => 'labeled ticked','unit' => 'Years' );

$arr ['field'] ['tab_input2'] = array ('tab' => 'second','type' => 'input','label' => 'Second','placeholder' => 'Second' );
$arr ['field'] ['age2'] = array ('tab' => 'second','type' => 'slider','label' => 'Age','step' => '2','max' => 100,'smooth' => true,'class' => 'green' );

// Accordion 2/1---------------------------------------
$arr ['field'] [] = array ('type' => 'accordion','title' => 'Input 1' );

$arr ['field'] [] = array ('type' => 'div','class' => 'fields equal width' );
$arr ['field'] ['date'] = array ('type' => 'date','label' => 'Date' );
$arr ['field'] ['firstname'] = array ('type' => 'input','label' => 'Firstname','placeholder' => 'Firstname' );
$arr ['field'] ['secondname'] = array ('type' => 'input','label' => 'Secondname','placeholder' => 'Secondname' );
$arr ['field'] [] = array ('type' => 'div_close' );

// Accordion 2/2---------------------------------------
$arr ['field'] [] = array ('type' => 'accordion','title' => 'Input 2','split' => true );
$arr ['field'] ['email'] = array ('type' => 'input','placeholder' => "Email",'label_right_class' => "button submit",'label_right' => 'Sumbit' );

// Accordion Close---------------------------------------
$arr ['field'] [] = array ('type' => 'accordion','close' => 'true' );

$arr ['field'] ['ckeditor'] = array ('type' => 'ckeditor5','value' => 'This is <b>html</b><br><br>...and more','items' => "['bold','italic','alignment','link']" ); //,'autosave'=>'alert(editor.getData())'
$arr ['field'] ['color'] = array ('type' => 'color','label' => 'Color', 'value'=>'red' );
$arr ['field'] ['icon'] = array ('type' => 'icon','label' => 'Icon' );

$arr ['field'] ['submit'] = array ('type' => 'button','value' => 'Submit','class' => 'submit','color' => 'green' );

$output_form = call_form ( $arr );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Form | Semantic UI | PHP</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
<link rel='stylesheet' type='text/css' href='../jquery-upload/css/jquery.fileupload.css'>
<link rel='stylesheet' type='text/css'
	href='../plugins/colorpicker-master/dist/css/default-picker/light.min.css'>
</head>
<body>
	<div class="ui main text container">
		<br> <br> <a href='../index.php'>< Back</a> <br> <br>
		<?=$output_form['html']?>
		<br>
	</div>
	<div class="ui main text container">
		<div id='show_data'></div>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<script src="../js/smart_form.js"></script>
	<script src="../ckeditor5/build/ckeditor.js"></script>
	<script src='../plugins/colorpicker-master/dist/js/default-picker.min.js'></script>
	<?=$output_form['js']?>
</body>
</html>