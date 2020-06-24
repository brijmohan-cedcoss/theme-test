jQuery(document).ready(function($) {
	
 $('#formName').on('click', function(){
	alert('hi');
	var name = $('#txtName').val();
	alert(name);
	var email = $('#txtEmail').val();
	alert(email);

	$.ajax({
		url: form_ajax_obj.ajaxurl,
		method: 'GET',
		
		data:{
			'action': 'form_ajax_request',
			'name'  : name,
			'email' : email,
			'nonce' : form_ajax_obj.nonce
		},
		success:function(response) {
			console.log(response);
			//$('#formName').append(response);
		}
	});
 });  
});