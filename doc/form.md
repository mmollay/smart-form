
##	Settings for Smart-Form

Example:

```php
$arr ['form'] = array ('id' => 'form_newsletter','action' => 'ajax/handler.php','class' => 'segment attached','width' => '800','align' => 'center' );
$arr ['ajax'] = array ('success' => "$('#show_data').html(data);",'dataType' => 'html' );
$arr ['field'] ['date'] = array ('type' => 'date','label' => 'Date' );
$arr ['field'] ['firstname'] = array ('type' => 'input','label' => 'Firstname','placeholder' => 'Firstname' );
$arr ['field'] ['secondname'] = array ('type' => 'input','label' => 'Secondname','placeholder' => 'Secondname' );
$arr ['field'] ['submit'] = array ('type' => 'button','value' => 'Submit','class' => 'submit','align' => 'center' );
```

---

### GLOBAL Settings
|type|key|value(s)|default|info
|--|--|--|--|--
|**form**|id|'form_name'|empty
||action|'handler.php'|self_file
||class|segment/message|empty|[more semantic-ui](https://fomantic-ui.com/)
||inline|true/'list'|false|info for validate
||keyboardShortcuts|true|false
||width|'600px'|100%|
||align|left/center/right|empty|
|**ajax**|success|alert(data);||request from 'handler.php'
||dataType|json/html/script|script
||onLoad|alert('hallo')|false|
|**value**| |array('name'=>'Martin') ||
|**header/footer**|title|'Formular-Title'|false
||text|'Sub-Title'|false
||class|red||textdesign, size,...
||segment_class|attached message|false|other: basic,segment,..
||icon|newspaper|empty|[more](https://fomantic-ui.com/elements/icon.html)
|sql|query|"SELECT * FROM test where id = '21'"|empty
||key|'id'|take first field|you have to connect to db


### FIELDS

|type|key|value|default|info
|-|-|-|-|-
|input|label|'title'|empty
||value|'martin'|empty
||validate|true|false
||placeholder|'name'|empty
||tab|'tab1'|empty |Assignment to the tab 
||validate|true|false

Example:

    $arr ['field'] ['name'] = array (
    'type' => 'input',
    'label' => 'Name',
    'placeholder' => 'Martin' 
    );


## Events
||function|info
|--|--|--|
|js| table_reload();|reload table when using with form
||location.reload();|roading the hole page|


