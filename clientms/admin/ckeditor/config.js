/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';


	
		config.toolbarGroups = [
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'document', groups: [ 'document', 'mode', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];
	
		config.removeButtons = 'About,Blockquote,Cut,Paste,PasteText,PasteFromWord,Form,Checkbox,Radio,Select,Textarea,Button,ImageButton,HiddenField,TextField,Source,Save,NewPage,Copy,Replace,RemoveFormat,Flash,Anchor,Unlink,Link,Iframe,CreateDiv,BidiLtr,BidiRtl,Language,Templates,Scayt,Smiley,PageBreak,ShowBlocks';
		
};
