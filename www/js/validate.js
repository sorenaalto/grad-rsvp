//
// 

$(document).ready(function() {
    $('#rsvp-form').submit(validateFormData);
});

function validateFormData(e) {
    //alert("validating...");
    // clear all previous error messages
    $('div.text-danger').text("");
    var errcount = 0;
    
    // check title select
    var ndx = $('#frm-title')[0].selectedIndex ;
    if(ndx == 0) {
        $('#err-title').text("Indicate your title");
        errcount++;
    }
    
    // check input fields
    var fields = ['Name','Surname','Post','Department','Telephone','Email','Address'];
    for(var i in fields) {
        var fname = fields[i];
        var val = $('#frm-'+fname)[0].value;
        if(val == null || val == "") {
            $('#err-'+fname).text(fname+" must not be blank");
            errcount++;
        } else {
            //$('#err-'+fname).text(fname+" is OK");
        }
    }
    return (errcount == 0);
}