<?php

$mysqli = new Mysqli('localhost', 'Renard', 'uWs-xjY-VSf-HPP', 'renard');


$phonecode = intval($_POST['phonecode']);

$p_narezal = intval($_POST['p_narezal']);
$p_new = intval($_POST['p_new']);
$p_narezal1 = intval($_POST['p_narezal1']);

//$p_region=true;//флаг, если равно false выдает ошибку по поиску региона
$p_region = trim($_POST['p_region']);

$p_narezal3 = substr($phonecode, 2, 1); //цифра3
$p_narezal2 = substr($phonecode, 1, 1); //цифра2

$p_narezal1 = substr($phonecode, 0, 1); //цифра1
$p_new = $p_narezal1 . $p_narezal2; //вырезали 2 первые цифры номера и объеденили ,например 37
$p_narezal = $p_narezal1 . $p_narezal2 . $p_narezal3; //вырезали 3 первые цифры номера и объеденили ,например 373



//извлекаем все записи из таблицы
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$p_narezal'");	
while($row = $query->fetch_assoc()) {
	$country['nicename'][] = $row['nicename'];
	$country['phonecode'][] = $row['phonecode'];
};

//извлекаем все записи из таблицы
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$p_new'");	
while($row = $query->fetch_assoc()) {
	$country['nicename'][] = $row['nicename'];
	$country['phonecode'][] = $row['phonecode'];
};

//извлекаем все записи из таблицы
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$p_narezal1'");	
while($row = $query->fetch_assoc()) {
	$country['nicename'][] = $row['nicename'];
	$country['phonecode'][] = $row['phonecode'];
};


if (!$country) {
        $country['p_region'] = "ERROR"
;}

//возвращаем ответ скрипту

//формируем массив данных для отправки
$out = array($country);
	
//
header('Content-Type: text/json; charset=utf-8');

//
echo json_encode($out);



?>