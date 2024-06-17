const funcBefore = () => {
	jQuery('.rows tr').remove();
	jQuery('.rows').append('<tr><td>Ожидание данных...</td></tr>');	
}

jQuery(document).ready(() => {
	jQuery(".button").bind("click", () => {
		
		let phone = jQuery('.phoneField').val();
		funcBefore();
		jQuery.ajax ({
			url: "for_db.php",
			type: "POST",
			data: ({phone}), //передаем данные для записи
			dataType: "json",
			success: (result) => {
				jQuery('.rows tr').remove();
				jQuery(".load").text ("");
				if (result.country) {
					jQuery('.rows').append(() => result.country.reduce(
						(acc, curr) => acc + '<tr><td> Страна: ' + curr.nicename + '</td><td> Код страны: ' + curr.phonecode + '<tr><td>', "")
					);
				} else {
					jQuery('.rows').append('<tr><td>' + result.error + '</td></tr>');		
				}
				return false;
			}
		});
	return false;
	});
});