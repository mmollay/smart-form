###Smart-Form v2.0

Smart-Form is a form and list generator, which ensures a quick setup via simple array design.

## Basic Usage - Form

![Bildschirmfoto 2020-02-06 um 18 39 08](https://user-images.githubusercontent.com/10619091/73963402-7d607800-4910-11ea-932e-59a7496c67b1.png)

```php
<?php
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
	<?=$output_form['html']?>
	<div id='show_data'></div>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<?=$output_form['js']?>
</body>
</html>
```

## Basic Usage - List

![Bildschirmfoto 2020-02-06 um 18 38 58](https://user-images.githubusercontent.com/10619091/73963432-8d785780-4910-11ea-9039-a0e45c51cb4c.png)

```php
<?php
include ("../include_list.php");
$array = call_list ( 'inc/array_list.php', 'inc/mysql.php' );
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Smart - List - Example</title>
<link rel="stylesheet" href="../semantic/dist/semantic.min.css">
</head>
<body>
	<div class="ui main text container">
	<?=$array['html']?>
	</div>
	<script src="../jquery/jquery.min.js"></script>
	<script src="../semantic/dist/semantic.min.js"></script>
	<script>var smart_form_wp = '../'</script>
	<script src="../js/smart_list.js"></script>
	<?=$array['js']?>
</body>
</html>
```

inc/array_list.php

```php
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
?>
```

inc/mysql.php

```php
<?php
$cfg_mysql['user']     = 'demo';
$cfg_mysql['password'] = 'demo12345';
$cfg_mysql['server']   = 'localhost';
$cfg_mysql['db']       = 'demo';

$GLOBALS['mysqli'] = new mysqli ( $cfg_mysql['server'], $cfg_mysql['user'], $cfg_mysql['password'], $cfg_mysql['db'] ) or die ( "Could not open connection to server {$cfg_mysql['server']}" );
?>
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
