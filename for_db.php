<?php

$mysqli = new Mysqli('localhost', 'Renard', 'uWs-xjY-VSf-HPP', 'renard');


$phonecode = trim($_POST['phonecode']);

/*
$p_narezal = intval($_POST['p_narezal']);
$p_new = intval($_POST['p_new']);
$p_narezal1 = intval($_POST['p_narezal1']);
*/

$error = trim($_POST['error']);

$p_narezal3 = substr($phonecode, 2, 1); //цифра3
$p_narezal2 = substr($phonecode, 1, 1); //цифра2
$p_narezal1 = substr($phonecode, 0, 1); //цифра1
$p_new = $p_narezal1 . $p_narezal2; //вырезали 2 первые цифры номера и объеденили ,например 37
$p_narezal = $p_narezal1 . $p_narezal2 . $p_narezal3; //вырезали 3 первые цифры номера и объеденили ,например 373


if (preg_match("(^[0-9]+$)", $phonecode)) {
//код на 3 цифры
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$p_narezal'");	
while($row = $query->fetch_assoc()) {
	$result['nicename'][] = $row['nicename'];
	$result['phonecode'][] = $row['phonecode'];
};
//код на 2 цифры
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$p_new'");	
while($row = $query->fetch_assoc()) {
	$result['nicename'][] = $row['nicename'];
	$result['phonecode'][] = $row['phonecode'];
};
//код на 1 цифру
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$p_narezal1'");	
while($row = $query->fetch_assoc()) {
	$result['nicename'][] = $row['nicename'];
	$result['phonecode'][] = $row['phonecode'];
};
//Вывод ошибки номера
if (!$result) {
    $result['error'] = "Код региона не существует, пожалуйста, введите правильный код."
;}
//Вывод ошибки кода региона
} else {
	$result['error'] = "Номер не существует, пожалуйста, введите правильный номер.";
}

//возвращаем ответ скрипту
//
header('Content-Type: text/json; charset=utf-8');
//
echo json_encode($result);



?>