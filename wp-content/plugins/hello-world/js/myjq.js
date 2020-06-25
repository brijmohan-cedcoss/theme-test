jQuery(document).ready(function($) {
	
    // We'll pass this variable to the PHP function example_ajax_request
    var fruit = 'Banana';
    // This does the ajax request
    $.ajax({
		url    : example_ajax_obj.ajaxurl,
		method : 'post',
        data   : {
            'action': 'example_ajax_request',
            'fruit' : fruit,
            'nonce' : example_ajax_obj.nonce
        },
        success:function( data ) {
            // This outputs the result of the ajax request
            console.log( data );
        },
        error  : function( errorThrown ){
            console.log( errorThrown );
        }
    });  
    
    //Ajax request for the form on admin settings page.
    $('#formName').on('click', function(){
        var name  = $('#txtName').val();
        var email = $('#txtEmail').val();
        // This does the ajax request
        $.ajax({
            url    : example_ajax_obj.ajaxurl,
            method : 'GET',
            
            data   :{
                'action': 'form_ajax_request',
                'name'  : name,
                'email' : email,
                'nonce' : example_ajax_obj.nonce
            },
            success :function(response) {
                // This outputs the result of the ajax request
                console.log(response);
            }
        });
    }); 
     
    //Ajax request for feedback form on frontend.
    $('#submitform').on('click', function(){
        var name  = $('#formName').val();
        var email = $('#formEmail').val();
        var msg   = $('#formQuery').val();
        // This does the ajax request
        $.ajax({
     	    url    : example_ajax_obj.ajaxurl,
     	    method : 'post',
            
     	    data   :{
     		    'action': 'submit_form_ajax_request',
     		    'name'  : name,
                'email' : email,
                'info'  : msg,
     		    'nonce' : example_ajax_obj.nonce
            },
            
     	    success : function( response ) {
                 // This outputs the result of the ajax request
                console.log( JSON.parse( response ) );
                console.log( 'Added to feedback' );
            },

            error  : function( errorThrown ) {
                console.log( errorThrown );
            }
             
        });
    });  
});