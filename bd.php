<?php

$db_host = "localhost";
$db_username = "Renard";
$db_password = "uWs-xjY-VSf-HPP";
$db_name = "renard";

@mysql_connect($db_host,$db_username,$db_password) or die ('MySQL не найдена / / не удалось подключиться.');
@mysql_select_db("$db_name") or die ("База данных не найдена.");
	
?>
