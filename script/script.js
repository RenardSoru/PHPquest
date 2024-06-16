/*
function funcBefore () {
	jQuery("#load").text ("Ожидание данных...");
}
*/

jQuery(document).ready(function() {
	jQuery(".button").bind("click", function() {
		
		var phonecode = jQuery('.phonecodeField').val();
		var error;
		jQuery.ajax ({
			url: "for_db.php",
			type: "POST",
			data: ({phonecode:phonecode, error:error }), //передаем данные для записи
			dataType: "json",
			//beforeSend: funcBefore,
			success: function(result) {
				if (result.phonecode) {
					jQuery('.rows tr').remove();
					jQuery('.rows').append(function() {
						var res = '';
						for(var i = 0; i <result.phonecode.length; i++){
							res += '<tr><td><p> Ваш номер пренадлежит региону </p>' + result.nicename[i] + '</td><td><p> с кодом </p>' + result.phonecode[i] + '<tr><td>';
						}
							return res;				
					});
					console.log(result);
					//console.log(phonecode);
				} else {
					jQuery('.rows tr').remove();
					jQuery('.rows').append('<tr><td>' + result.error + '</td></tr>');		
					console.log(result);
					//console.log(phonecode);
				}
				return false;
			}
		});
	return false;
	});
});