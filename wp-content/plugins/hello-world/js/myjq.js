jQuery(document).ready(function($) {
	
    // We'll pass this variable to the PHP function example_ajax_request
    var fruit = 'Banana';
    //alert(fruit);
    // This does the ajax request
    $.ajax({
		url: example_ajax_obj.ajaxurl,
		method : 'post',
        data: {
            'action': 'example_ajax_request',
            'fruit' : fruit,
            'nonce' : example_ajax_obj.nonce
        },
        success:function(data) {
            // This outputs the result of the ajax request
            console.log(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });  
    
    $('#formName').on('click', function(){
        //alert('hi');
        var name = $('#txtName').val();
        //alert(name);
        var email = $('#txtEmail').val();
       // alert(email);
    
        $.ajax({
            url: example_ajax_obj.ajaxurl,
            method: 'GET',
            
            data:{
                'action': 'form_ajax_request',
                'name'  : name,
                'email' : email,
                'nonce' : example_ajax_obj.nonce
            },
            success:function(response) {
                console.log(response);
                //$('#formName').append(response);
            }
        });
    }); 
     
    $('#submitform').on('click', function(){
        //alert('hi');
        var name = $('#formName').val();
        //alert(name);
        var email = $('#formEmail').val();
        //alert(email);
        var msg = $('#formQuery').val();
        alert(name);
    
        $.ajax({
     	   url: example_ajax_obj.ajaxurl,
     	   method: 'post',
            
     	   data:{
     		   'action': 'submit_form_ajax_request',
     		   'name'  : name,
                'email' : email,
                'info'   : msg,
     		   'nonce' : example_ajax_obj.nonce
            },
            
     	   success:function(response) {
                console.log(response);
                console.log('Added to feedback');
     		   //$('#formName').append(response);
     	   }
        });
    });  
});