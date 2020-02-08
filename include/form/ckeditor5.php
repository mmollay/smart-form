<?php
$type_field = "<textarea $setting $rows name ='$id' class='ckeditor5 ui message $form_id $class_input' id='$id' $disabled $set_disabled placeholder='$placeholder' style='min-height:100px; $style' >$value</textarea>";

$js_ckeditor_add = '';

if ($autosave)
	$js_ckeditor_add .= "autosave: { save( editor ) { return $autosave } },";

if ($language)
	$js_ckeditor_add .= "language: 'de',";

if ($items)
	$js_ckeditor_toolbar_items = $items;
else
	$js_ckeditor_toolbar_items = "[
		'heading',
		'|',
		'bold',
		'italic',
		'alignment',
		'fontBackgroundColor',
		'fontColor',
		'fontSize',
		'link',
		'bulletedList',
		'numberedList',
		'|',
		'indent',
		'outdent',
		'|',
		'imageUpload',
		'blockQuote',
		'insertTable',
		'mediaEmbed',
		'undo',
		'redo',
		'CKFinder',
		'alignment',
		'code',	
		'fontFamily',
		'highlight',
		'horizontalLine',
		'underline'
	]";

$jquery .= "
ClassicEditor.create( document.querySelector( '.ckeditor5' ), {
        $js_ckeditor_add  
		toolbar: {
		items: $js_ckeditor_toolbar_items
		},
		image: {
			toolbar: [
				'imageTextAlternative',
				'imageStyle:full',
				'imageStyle:side'
			]
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells'
			]
		},
		licenseKey: '',
		
	} )
	.then( editor => {
		//window.editor = editor;
		myEditor_$id = editor;
	} )
	.catch( error => {
		console.error( error );
	} );
";