<?
include_once ("../include_form.php");

$upload_dir = __DIR__ . "/upload/";
$upload_url = "upload/";

// Header
$arr ['header'] = array ('title' => "Uploader",'text' => 'here you get it','class' => 'small diverding white','segment_class' => 'attached message','icon'=>'upload' );

// Config - Fields
$arr ['form'] = array ('id' => 'form_upload','action' => 'ajax/handler.php','class' => 'segment attached' );
$arr ['ajax'] = array ('success' => "$('#show_data').html(data);",'dataType' => 'html' );

$arr ['field'] ['upload'] = array ('type' => 'uploader','upload_dir' => $upload_dir,'upload_url' => $upload_url,'accept' => array ('png','jpg','jpeg','gif' ),'options' => 'imageMaxWidth:1000,imageMaxHeight:1000','button_upload' => array ('text' => "Choose",'color' => 'green','icon' => 'upload' ),
		'card_class' => 'five' );


$arr ['field'] ['submit'] = array ('type' => 'button','value' => 'Submit','class' => 'submit','align' => 'center' );

$output_form = call_form ( $arr );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Form | Semantic UI | PHP</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
<link rel='stylesheet' type='text/css' href='../jquery-upload/css/jquery.fileupload.css'>
</head>
<body>
	<div class="ui main text container">
		<br> <a href='../index.php'>< Back</a>
		<p>
		
		
		<div id='show_data'></div>
	<?=$output_form['html']?>
	<br>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<script src="../js/smart_form.js"></script>
	<script>var smart_form_wp = '../'</script>
	<script type='text/javascript' src='../jquery-upload/js/load-image.min.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/canvas-to-blob.min.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/jquery.iframe-transport.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/vendor/jquery.ui.widget.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/jquery.fileupload.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/load-image.min.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/jquery.fileupload-process.js'></script>
	<script type='text/javascript' src='../jquery-upload/js/jquery.fileupload-image.js'></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
	<?=$output_form['js']?>
	
</body>
</html>