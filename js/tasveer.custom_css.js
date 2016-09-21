// Move data from editor to textarea
jQuery(document).ready(function($) {
    
	var updateCss = function(){
		$('#custom_css').val( editor.getSession().getValue() );	
	}
	
	$('#save-custom-css-form').submit( updateCss );
	
});

// Load ace editor for div
var editor = ace.edit("customCss");
// Set editor theme
editor.setTheme("ace/theme/monokai");
// Set editor Mode
editor.getSession().setMode("ace/mode/css");