function change_mark(id){
	var a = id;
	//$('#message_model_auto').slideUp();
	$('#message_model_auto').html('');
		$.ajax({
			url: '/main/get_model/'+a,
			success: function(data){
				$('#message_model_auto').html(data);
				//$('#message_model_auto').slideDown();
			}
		});
		return false;
}
