jQuery(document).ready( function($) {
	var post_per_page = 2;
	var category = '';


		function ajax_call() {
			$.ajax({
				url : poca_ajax_obj.ajaxurl,
				method : 'post',
				data : {
					'action' : 'poca_ajax_request',
					'ppp'    : post_per_page,
					'category' : category,
					'nonce' : poca_ajax_obj.nonce
				},
				success:function(data) {
					$("#poca-portfolio").html(data);
				},

				error  : function(errorThrown) {
					console.log(errorThrown);
				}
			});
		}

		$('body').on('click', '#load_more', function(e) {
			e.preventDefault();
			category= $('.portfolio-menu .active').data('filter');
			post_per_page += 2;
			ajax_call();
		});

		$('body').on('click', '.portfolio-menu button', function(e) {
			//e.preventDefault();
			post_per_page = 2;
			category = $(this).data('filter');
			ajax_call();
		});
});