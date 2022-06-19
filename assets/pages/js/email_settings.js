$(document).on('click', '.postmater-test', function(){
	var $this = $(this);
	var $url = $this.data('url');
	$('#basic .modal-body .row').html('<div class="col-md-12"><br /><center><img src="'+base_url+'assets/global/img/loading-spinner-blue.gif"></center></div>');
	$('#basic').modal();
	$.ajax({
		type: 'GET',
		url: $url,
		success:function( data ){
			$('#basic .modal-body .row').html(data.html);
		}
	});
});