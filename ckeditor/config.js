/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
CONFIG - INFO
http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
*/

CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.addCss( 'img[style*="left"] {margin:0 10px 10px 0;} img[style*="right"] {margin:0 0 10px 10px;' );

CKEDITOR.editorConfig = function( config )
{
	
	
	//config.uiColor = '#AADC6E';
	
	// Define changes to default configuration here. For example:
	config.language = 'de';
	config.toolbar  = 'Default'; //Default
	//config.extraPlugins = 'sharedspace,tableresize,magicline,oembed,placeholder,sourcedialog,quicktable,slideshow,fakeobjects,lineheight,blockquote'; //cancel, //,inlinesave
	
	config.extraPlugins = 'tableresize';
	config.removePlugins = 'magicline'; //elementspath,
	
	//config.removePlugins = 'magicline';
	CKEDITOR.config.magicline_color = '#0000FF';
	
	config.contentsCss  = 'body { padding: 5; margin:5px;  font-size: 13px; font-family: verdana; }'; //font-family: arial;
	config.removeButtons = 'Blockquote,Underline,';
	config.format_tags = 'p;h1;h2;h3;h4;pre';
	config.scayt_sLang = 'de_DE';
	config.resize_enabled =  false;
	
	//config.removeButtons = 'Blockquote,Underline,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Flash,PageBreak,Smiley,Iframe,Maximize,Language,BidiLtr,BidiRtl,Search,Codesnippet';

	//config.enterMode = CKEDITOR.ENTER_BR;
	//config.shiftEnterMode = CKEDITOR.ENTER_P;
	//config.enterMode = '3';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	
	config.autoDetectPasteFromWord = true;
	//config.pasteFromWordRemoveStyles = true;
	//config.forcePasteAsPlainText = true;
	
	//config.allowedContent = "p h1{text-align}; a[!href]; strong em; p(tip), img";
	
	//config.skin = 'moonocolor';
	config.protectedSource.push(/<i[^>]*><\/i>/g);
	config.protectedSource.push(/<\?[\s\S]*?\?>/g);   // PHP Code
	
	config.baseFloatZIndex = 100000;
	config.line_height = "1;1.5;2;2.5;3";
	config.fontSize_sizes = '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;30/30px;32/32px;36/36px;40/40px;44/44px;48/48px;50/50px;52/52px;60/60px;72/72px;';

	
	//config.allowedContent = true;
	//config.FillEmptyBlocks = true;
	//config.line_height="1em;1.1em;1.2em;1.3em;1.4em;1.5em" ;
	
	//['Inlinesave'], Zeigt Button zum Speichern an - ist aber nicht notwendig, da automatisch gespeichert wird
	
	
	//https://ckeditor.com/docs/ckeditor4/latest/guide/dev_mentions.html#configuration
	//config.mentions = [ { feed: ['Anna', 'Thomas', 'John'], minChars: 0 } ];
	
	config.toolbar_Default = [
		{ name: 'clipboard', items: [ 'Sourcedialog','-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Find', 'Replace', '-',  'Scayt' ] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat', 'SelectAll' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		'/',
		{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'EmojiPanel','SpecialChar' ] },
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize','lineheight' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'about', items: [ 'About' ] }
	];
	
	config.toolbar_Default_save = 
		[
		    ['Sourcedialog'],
		    ['PasteText','PasteFromWord','SpellChecker', 'Scayt','LineHeight'],
		    ['Undo','Redo','-','SelectAll','RemoveFormat','CopyFormatting'],['smiley','Image','Table','HorizontalRule','Icons','SpecialChar','Iframe'],
		    ['Link','Unlink','Anchor'],['ShowBlocks','-','About'],'/',
		    ['NumberedList','BulletedList','-','Outdent','Indent','CreateDiv'],
		    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		    ['TextColor','BGColor'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		    ['Format','Font','FontSize','Styles','lineheight']
		    ];
	
	config.toolbar_basic =
		[
		    ['Sourcedialog'],
		    ['PasteText','PasteFromWord','SpellChecker'],['TextColor','BGColor'],['Undo','Redo','-','SelectAll','RemoveFormat','CopyFormatting'],
		    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		    ['NumberedList','BulletedList'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		    ['Format','Font','FontSize'],['Link','Unlink'],['Image','Table','HorizontalRule','CreateDiv','Iframe']
		];
	
	config.toolbar_simple =
		[
		    ['Sourcedialog'],
		    ['TextColor','BGColor'],['RemoveFormat'],
		    ['Bold','Italic','Underline'],
		    ['JustifyLeft','JustifyCenter','JustifyRight'],
		    ['Font','FontSize'],['Link','Unlink'],['HorizontalRule','CreateDiv']
		];

	config.toolbar_mini =
		[
		    ['Sourcedialog','RemoveFormat','CopyFormatting'],
		    ['SpellChecker', 'Scayt'],
		    ['Bold','Italic','Underline','Strike'],
		    ['TextColor','BGColor','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Format','FontSize'],
		    ['Link','Unlink'],
		    ['Image','HorizontalRule','Maximize']
		];
	
	config.toolbar_bazar =
		[
		    ['Bold','Italic','Underline'],
		    ['JustifyLeft','JustifyCenter'],
		    ['NumberedList','BulletedList'],['SpellChecker', 'Scayt'],['RemoveFormat']
		];
	
	config.toolbar_Default_save = [
		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
		{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize','lineheight' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'about', items: [ 'About' ] }
	];
	
	
};
