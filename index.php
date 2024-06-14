<?php

//$phonecode=$_POST['phonecode']; //номер, откуда вырезается код региона (3 цифры изначально)

$p_region = $_POST['p_region'];

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
    
    <link rel="stylesheet" type="text/css" media="all" href="css/styleindex.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="css/modaldialogadd.css"/>
</head>
<body>

';
//кнопка "Открыть форму"
echo '
<a href="#openModal1"><input type="button" style="position:absolute; bottom:50%; left:45%;" class="btns" value="Открыть форму"></a>
';
//форма 1 "без названия"
echo '
<form action="#" method="post" name="noname" id="noname" align="left" enctype="multipart/form-data"> <!-- //~~ -->
	<div id="openModal1" class="modaldialogadd">
	<div>
	<a href="#close" title="Закрыть" class="close">X</a>

        <h1 align="center">Проверка вашего номера телефона</h1>
		<input type="hidden" value="'.$p_region.'" class="p_regionField" id="p_region" name="p_region">
		<div>
		<p>Введите номер телефона + <input style="position:relative;" type="text" value="" class="phonecodeField" id="phonecode" name="phonecode" required placeholder="Введите номер телефона" style="margin-left:28px; width:140px;" maxlength="18" /></p>
		<br>
		<table class="rows">
		</table>
		<p class="load"></p>
		
		</div>
        <br><br>
	<fieldset align="right">
	<input type="submit" value="Отправить" class="button">
	<input type="reset" value="Очистить">
	</fieldset>
	</div>
	</div>
</form>

<script type="text/javascript" src="script/script.js"></script>

</body>
</html>
';

?>