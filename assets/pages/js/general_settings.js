$(document).on('click', '.email-test', function(){
	var $this = $(this);
	var $url = $this.data('url');
	$('#basic .modal-body .row').html('<div class="col-md-12"><div class="form-group"><label class="control-label" for="test_email">Email</label><input type="text" name="test_email" placeholder="Email" id="test_email" class="form-control"></div><div class="form-group"><button class="btn red" id="send-test-mail">Test</button></div></div>');
	$('#basic').modal();
});

$(document).on('click', '#send-test-mail', function(){
	if( $('#test_email').val() == '' ) {
		alert('Email is required');
	} else {
		var $email = $('#test_email').val();
		$('#basic .modal-body .row').html('<div class="col-md-12"><br /><center><img src="'+base_url+'assets/global/img/loading-spinner-blue.gif"></center></div>');
		$.ajax({
			type: 'POST',
			url: $('.email-test').data('url'),
			data: { email: $email },
			success:function( data ){
				if( data.html ) {
					$('#basic .modal-body .row').html(data.html);
				} else {
					$('#basic .modal-body .row').html('<div class="alert alert-danger">Email not sent!</div>');
				}

			}
		});
	}
});