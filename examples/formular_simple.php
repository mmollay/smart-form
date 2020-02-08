<?
include_once ("../include_form.php");

$arr ['form'] = array ('id' => 'form_newsletter','action' => 'ajax/handler.php','class' => 'segment attached','width' => '800','align' => 'center' );
$arr ['ajax'] = array ('success' => "$('#show_data').html(data);",'dataType' => 'html' );
$arr ['field'] ['date'] = array ('type' => 'date','label' => 'Date' );
$arr ['field'] ['firstname'] = array ('type' => 'input','label' => 'Firstname','placeholder' => 'Firstname' );
$arr ['field'] ['secondname'] = array ('type' => 'input','label' => 'Secondname','placeholder' => 'Secondname' );
$arr ['field'] ['submit'] = array ('type' => 'button','value' => 'Submit','class' => 'submit','align' => 'center' );

$output_form = call_form ( $arr );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Formular - Small</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
</head>
<body>
	<div class="ui main text container">
		<br> <br> <a href='../index.php'>< Back</a> <br> <br>
	<?=$output_form['html']?>
	<div id='show_data'></div>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<?=$output_form['js']?>
</body>
</html>