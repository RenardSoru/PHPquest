/*
function funcBefore () {
	jQuery("#information").text ("Ожидание данных...");
}
*/

jQuery(document).ready(function() {
	jQuery(".button").bind("click", function() {
		
		var phonecode = jQuery('.phonecodeField').val();
		//var p_region = jQuery('.p_regionField').val();
		var p_region;
		var country;
		
		jQuery.ajax ({
			url: "for_db.php",
			type: "POST",
			data: ({phonecode:phonecode, p_region:p_region, country:country }), //передаем данные для записи
			dataType: "json",
			//beforeSend: funcBefore,
			success: function(result) {
				if (!result) {
					jQuery('.rows tr').remove();
					jQuery('.rows').append(function() {
						var res = '';
						for(var i = 0; i < result[0].phonecode.length; i++){
							res += '<tr><td>' + result[0].nicename[i] + '</td><td>' + result[0].phonecode[i] + '<tr><td>';
						}
							return res;				
					});
					console.log(result);
				} else {
					jQuery('.rows tr').remove();
					jQuery('.rows').append(function() {
						var res = '<tr><td>';
						for(var i = 0; i < result[0].p_region.length; i++){
							res += result[0].p_region[i];
						}
							res == res + '</td></tr>';
							return res;				
					});
					console.log(result);
				}
				return false;
			}
		});
	return false;
	});
});

//for(var i = 0; i < result[0].p_region.length; i++){
//res += '<tr><td>' + result[0].p_region[i] + '</td></tr>';

//console.log(result);	
//alert(result.message);
//jQuery('.load').text("Номер не существует");