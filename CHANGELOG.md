
### Changelog

## 2.3

> 30.11.2020

-add: form -> content -> scrolling
-add: list -> button top set href, target, popup 
-add: list -> modal -> close button hide with close_hide (view two delet-button if more then 10 rows)
-add: list -> auto reload toggle switsch on/off 
-mod: list -> order-dropdown now inner Filterline
-mod: list -> hide close x from modal
ALTER TABLE `list` ADD `category` VARCHAR(100) NOT NULL AFTER `message`; 


## 2.2

> 08.11.2020

-add: form -> line  'type' => 'line','text'=>'more'
-add: form -> content 'color' => 'red','size'=>'large', 'inverted' => true,
-add: list -> output for data array
-add: list -> set_tr_hover => 'red' or true  
-fix: list -> header colspan

## 2.1

> 28.09.2020

- add: form -> ajax -> xhr -> ''
- fix: form -> input -> coler
- add: list -> modal -> Buttons on the bottom of the modal possible (color,title,icon,onclick) form_id => ID from form to submit the form
- add: list -> change templates for popup title from modal Exmp. Title {title}
- add: list -> multiselect with checkboxes
- mod: new examples


## 2.0

> 12.02.2020 

- add: form -> label -> add class 'form ID'
- add: list -> total for int/double/....
- add: new structure for list 
- add: Redesign complete - new structure
- add: New examples 
- add: New documentation
- add: Clearable -> input/dropdown
- mod: $value = htmlspecialchars($value);
- mod: change usage - info in doc (develop)


## 1.x

> Version 1.9.6 (04.03.2019)

- fix: checkbox value 1 works now
- fix: checkbox onfocus works again

> Version 1.9.5 (19.02.2019)

- add: form -> search inner input
- fix: list -> reload -> use tooltip

> Version 1.9.4 (15.1.2019)

- fix: list -> export

> Version 1.9.3 (27.10.2018)

- add: form -> dropdown -> fulltext search

> Version 1.9.2 (01.06.2018)

- add: form -> dropdown -> get array from url

> Version 1.9.1 (11.05.2018)

- add: form -> radio -> default_select -> choose the first first in the radio
- add: list -> filter -> default_value -> Default value db

> Version 1.9 (26.02.2018)

- add: form -> select -> clear button
- add: list -> header='off' //Hide Header

> Version 1.8.2 (02.02.2017)

- add: form -> add_val_dropdown(key,value,name) //js add value inner Dropdown

> Version 1.8.1 (06.01.2017)

- add: form -> readonly for Textarea 
- fix: search-engine improved (faster load)

> Version 1.8.0 (08.12.2017)

- add: from -> autocomplete 
- add: form -> radio,checkbox -> onchange
- add: button -> tooltip
- add: all size now as well for Text "Checkbox inner Formular" (exmp.: class = 'ui small text' )
- add: list -> serial => true Show serial Nummber
- add: list -> Filter-select now colored (orange)
- add: list -> Modal -> url now with placeholder for ID {id}
- add: form -> input -> format -> %
- add: -> onchange -> you can use this placeholder for the {id}
- add: finder -> onchange -> you can use this placeholder for the {id}  `arr['finder']['onchange']`
- mod: input -> date -> select data-default-date()
- fix: correct date format for datepicker
- fix: jquery - plugin now on the right place

> Version 1.7.4 (04.11.2017)

- mod: input -> icon -> toolbar is hiding after use
- fix: input -> icon -> now icon with 'space usable'

> Version 1.7.2 (13.10.2017)

- fix: list -> global --> $GLOBALS for preg_replace_callback(...)

> Version 1.7.1 (29.09.2017)

- add: form -> type = 'icon'
- add: form -> label_class = 'admin' oder anderes

> Version 1.7 (30.08.2017)

- add: ckeditor v4.7.2
- add: form -> button -> text = value
- add: form -> label -> label = ' ' will be like 'label' => '&nbsp' for free space
- add: form -> button -> class_button = 'fluid red'
- add: form -> button -> tooltip = 'infotext für button'
- fix: form -> radio -> checked for default value works now

> Version 1.6.9 (14.08.2017)

- add: form -> checkbox -> onchange

> Version 1.6.8 16.07.2017

- add: color -> new > Version 
- mod: semantic 2.2.11

> Version 1.6.7 25.06.2017

- add: form -> label_right_id
- add: form -> input -> clear button "clear => true" 
- add: list -> id for buttons "top"

> Version 1.6.6. 28.05.2017

- fix: use form -> class after success 

> Version 1.6.5 15.04.2017

- add: form -> select -> array => array('title_1'=>Überschrift','1'=>'Eins','2' => 'Zwei')  //title_xxxx - für OptGroup

> Version 1.6.4 22.03.2017

- fix: show gallery direct after login (setting 'image_> Versions' => array ( 'thumbnail' => $thumbnail ) ); inner include_file_gallery.inc.php

> Version 1.6.3 20.03.2017

- add: form -> arr['value'] = array('value1'=>'1'); //Übergabe von Values

> Version 1.6.2 27.02.2017

- add: label_right for checkboxes
- mod: semantic-ui 2.2.8
- fix: dropdown call now inner HTMl for refresh

> Version 1.6.1 25.02.2017

- mod: auto-reload filter included

> Version 1.6 20.02.2017

- add: list -> auto_reload
- add: form -> Restore selectfields 

> Version 1.5 01.02.2017

- add: some bug fixes (close dialog and so one
- add: list -> tooltip for <th>
- add: list -> replace now with default option

> Version 1.4.8

- add: list -> head ->  "'replace' => array('1'=>"<i class='icon green eye'></i>",'0'=>"")"
- add: list -> mysql -> match "boolean mode +martin +test (plus will be automaticly included
- add: form -> button -> "color,icon"


> Version 1.4.7. mm 18.01.2017

- fix : list -> workpath -> save

> Version 1.4.6 mm 10.01.2017

- mod : list -> search -> mysql -> like now case sens

> Version 1.4.4 mm 26.12.2016

- fix: list -> reload_table() -> use "replaceWith()" instad of "html()"

> Version 1.4.3 mm 26.12.2016

- add: list -> set_ col for fields
- mod: list -> tooltip changend (buttons)

> Version 1.4.2 mm 24.12.2016

- add: form -> button -> onclick
- fix: form -> time -> default:false

> Version 1.4.1 mm 23.12.2016

- add: list -> cookie -> call inner call_table.php

> Version 1.4 mm 18.12.2016

- add: form -> timedropper
- add: form -> datedropper 
- mod: form -> remove old timepicker
- mod: form -> remove old datepicker

> Version 1.3.4 mm 15.12.2016

- mod: focus for selectfields now possible

> Version 1.3.3 mm 11.12.2016

- add: list -> cookie for workpath
- fix: form -> hiddenfield for image_upoad

> Version 1.3.2 mm 08.12.2016

- add: autofocus to searchfield
- mod: redesign header (filter,button,searchfield)

> Version 1.3.1 mm 06.12.2016

- add: list -> button -> href=>'{pdf}', download=>'{art_title}.pdf', (new function for buttons)
- fix: form -> explorer -> add "name=" for transport value

> Version 1.3 (03.12.2016)

- add: filter -> query -> name LIKE '{value}%' //Bsp.:

> Version 1.2.7.1 (26.11.2016)

- fix: placeholder -> unset('placeholder');

> Version 1.2.7 (22.11.2016)

- add: input -> icon AND icon_position (left=default OR right)
- add: input -> time
- add: new sample how to use this function

> Version 1.2.6 (22.11.2016)

- mod: select -> emptyField -> value from "all" to ""

> Version 1.2.5 (16.11.2016)

- fix: form -> add class 

> Version 1.2.4 (13.11.2016)

- add: list -> modal -> autofocus (true | false)

> Version 1.2.3 (11.11.2016)

- add: field -> content -> align

> Version 1.2.2 (09.11.2016)

- mod: popup - faster

> Version 1.2.1 (26.10.2016)

- fix: Filter & Search -> view correct

> Version 1.2 (21.10.2016)

- fix: 'filter' => 0 AND NOW -> Date from Today

> Version 1.1 (15.10.2016)

- add: List -> Export-Button
- mod: Update to Semantic-ui 2.4.0
- fix: LIst -> isset for value from dropdown filter

> Version 1.0 (01.10.2016)

- add: List -> New Parameter for function call_list ('array.php','mysql.php',$data); $data = array('option'=>'in'); 
- mod: Form -> Update to Semantic-ui 2.2.2
- fix: Form -> Form-Size works as well when TAB is using