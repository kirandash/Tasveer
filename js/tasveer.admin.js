jQuery(document).ready(function($) {
    
	var frame;
	
	$('#upload-button').on('click', function(e){
		e.preventDefault();
		
		// If the media frame already exists, reopen it.
		if ( frame ) {
		  frame.open();
		  return;
		}
		
		// Create a new media frame
		frame = wp.media({
		  title: 'Select a Profile Picture',
		  button: {
			text: 'Choose picutre'
		  },
		  multiple: false  // Set to true to allow multiple files to be selected
		});		
		
		// When an image is selected in the media frame...
		frame.on( 'select', function() {
		  
		  // Get media attachment details from the frame state
		  var attachment = frame.state().get('selection').first().toJSON();
		
		  // Send the attachment URL to our custom image input field. and also to preview
		  $('#profile-picture').val(attachment.url);
		  $('.profile-picture-preview').css('background', attachment.url);
		  
		});
		
		// Finally, open the modal on click
		frame.open();
			
	});
	
});