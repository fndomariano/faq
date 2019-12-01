$(document).ready(function() {

	$('.vote').on('click', function() {
		
		vote = $(this).hasClass('vote-yes') ? 'yes' : 'no';

		$.ajax({
			url: '/vote',
			type: 'post',
			dataType: 'json',
			data: {
				id: 10,
				vote: vote,
				_token: $('meta[name="csrf-token"]').attr('content')				
			},
			success: function(response) {
				$('.vote-useful').text(response.data.useful);
				$('.vote-useless').text(response.data.useless);
				$('#vote-modal').modal();
			},
			error: function(xhr, status, error) {
				console.log('xhr: ' + xhr);
				console.log('status: ' + status);
				console.log('error: ' + error);
			}
   
		});
		
	});


	$('.delete').on('click', function (e) {
  	
		$('#confirm').modal();	
	
		formClass = $(this).attr('class').split(' ').pop();
		form = $('.'+formClass);	
	
		$('#btn-delete-yes').on('click', function(){
			form.submit();		
		});
			
	});

		
});