function get_model_list(id){
	var a = id;
	$('#message_model_auto').html('');
		$.ajax({
			url: '/main/get_model/'+a,
			success: function(data){
				$('#message_model_auto').html(data);
				$('.selectpicker').selectpicker('refresh');
			}
		});
		return false;
}

function get_modification_list(id){
	var a = id;
	$('#message_modification_auto').html('');
		$.ajax({
			url: '/main/get_modification/'+a,
			success: function(data){
				$('#message_modification_auto').html(data);
			}
		});
		return false;
}

function get_detail_type_list(id){
	var a = id;
	$('#message_detail_type').html('');
		$.ajax({
			url: '/main/get_detail_type/'+a,
			success: function(data){
				$('#message_detail_type').html(data);
			}
		});
		return false;
}

function get_city_list(id){
	var a = id;
	$('#message_city').html('');
		$.ajax({
			url: '/main/get_city/'+a,
			success: function(data){
				$('#message_city').html(data);
				$('.selectpicker').selectpicker('refresh');
			}
		});
		return false;
}

function get_request_info(id){
	var a = id;
	$('#info-modal-text').html('');
		$.ajax({
			url: '/main/get_request_info/'+a,
			success: function(data){
				$('#info-modal-text').html(data);
			}
		});
		return false;
}