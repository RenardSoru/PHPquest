/*
function funcBefore () {
	jQuery("#information").text ("Ожидание данных...");
}
*/

jQuery(document).ready(function() {
	jQuery(".button").bind("click", function() {
		
		var phonecode = jQuery('.phonecodeField').val();
		var p_region = jQuery('.p_regionField').val();
		
		jQuery.ajax ({
			url: "for_db.php",
			type: "POST",
			data: ({phonecode:phonecode, p_region:p_region}), //передаем данные для записи
			dataType: "json",
			//beforeSend: funcBefore,
			success: function(result) {
				console.log(p_region);
				if (result) {
					jQuery('.rows tr').remove();
					jQuery('.rows').append(function() {
						var res = '';
						for(var i = 0; i < result[0].phonecode.length; i++){
							res += '<tr><td>' + result[0].nicename[i] + '</td><td>' + result[0].phonecode[i] + '</td></tr>';
						}
							return res;				
					});
					console.log(result);
				} else {
					//jQuery('.load').text("Номер не существует");
					alert(result.message);
				}
				return false;
			}
		});
	return false;
	});
});