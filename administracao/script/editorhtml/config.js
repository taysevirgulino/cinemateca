/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.uiColor = '#AADC6E';
	config.language = 'pt-br';
	config.skin = 'kama';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.forcePasteAsPlainText = true;
	config.disableNativeSpellChecker = true;
	config.scayt_autoStartup = false;
	
	config.extraPlugins = 'MediaEmbed';
	
	//var pathUrlScript = "/administracao/script/editorhtml/ckfinder/";
	var pathUrlScript = "../administracao/script/editorhtml/ckfinder/";
	config.filebrowserBrowseUrl = pathUrlScript + 'ckfinder.html';
 	config.filebrowserImageBrowseUrl = pathUrlScript + 'ckfinder.html?type=Images';
 	config.filebrowserFlashBrowseUrl = pathUrlScript + 'ckfinder.html?type=Flash';
 	config.filebrowserUploadUrl = pathUrlScript + 'core/connector/php/connector.php?command=QuickUpload&type=Files';
 	config.filebrowserImageUploadUrl = pathUrlScript + 'core/connector/php/connector.php?command=QuickUpload&type=Images';
 	config.filebrowserFlashUploadUrl = pathUrlScript + 'core/connector/php/connector.php?command=QuickUpload&type=Flash';
	
	config.toolbar = 'Default';
	//config.toolbar = 'Flash';

	config.toolbar_Flash =
	[
		['Source'],
		['Paste','PasteText','PasteFromWord','RemoveFormat'],
		['Link','Unlink'],
		['Image'],
		['Bold','Italic','Underline','Format']
	];

    config.toolbar_Full =
	[
		['MediaEmbed','Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink','Anchor'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	];
	
	config.toolbar_Default =
	[
		['Source','-','Preview','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','RemoveFormat','Find','Replace'],
		['Link','Unlink','Anchor'],
		['Image','MediaEmbed','Flash'],
		['Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		['Bold','Italic','Underline','Strike','NumberedList','BulletedList','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Format','FontSize','TextColor','BGColor']
	];

	config.toolbar_Basic =
	[
		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'],['Styles','Format','Font','FontSize']
	];

	config.toolbar_Default2 = [
		['Source','-','Preview','Templates','Cut','Copy','PasteText','PasteWord','RemoveFormat','-','Image','dpEmbed','Flash','Table','-','Link','Unlink'],	
		['Bold','Italic','Underline','TextColor','BGColor'],
		['OrderedList','UnorderedList','-','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull','FontSize']
	] ;	
	
};
