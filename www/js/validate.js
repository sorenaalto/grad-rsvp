$(document).ready(function() {
    $('#rsvp-form').submit(validateFormData);
});

function validateFormData(e) {
	// Boolean for is good:
	var isgood = true;
	// Clear previous errors:
	$('.required .text-danger').remove();
	$('.has-error').removeClass('has-error');
	// Check the required fields:
    var flds = $('.required input,.required select,.required textarea');
    for(var i=0;i<flds.length;i++) {    	
    		var v = $(flds[i]).val();
    		var n = $(flds[i]).attr('name');
    		// If there is a value, trim it radically:
    		if(v!=null) v = v.replace(/\s/g,'');
    		// Check to see if there is anything left:
    		if(v==null || v.length==0) {
    			// Append an error message to the parent element:
    			$(flds[i]).parent().append('<div class="text-danger">'+n+' must not be blank.</div>');
    			// Add the bootstrap class to light up input fields:
    			$(flds[i]).parent().addClass('has-error');
    			// Set our return var to false:
    			isgood = false;
    		}
    }
    return isgood;
}