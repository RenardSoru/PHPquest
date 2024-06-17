<?php

$mysqli = new Mysqli('localhost', 'Renard', 'uWs-xjY-VSf-HPP', 'renard');

$phone = trim($_POST['phone']);

if (preg_match("(^[0-9]{6,18}$)", $phone)) {
$code3 = substr($phone, 0, 3); //вырезали 3 первые цифры номера и объеденили ,например 373
$code2 = substr($phone, 0, 2); //вырезали 2 первые цифры номера и объеденили ,например 37
$code1 = substr($phone, 0, 1); //вырезали 1 первую цифру номера и объеденили ,например 7
	
//код на 3 цифры
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$code3'");
while($row = $query->fetch_assoc()) {
	$new_object = new stdClass();
	$new_object->nicename = $row['nicename'];
	$new_object->phonecode = $row['phonecode'];

	$result['country'][] = $new_object;
}
if (!$result) {
//код на 2 цифры
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$code2'");
while($row = $query->fetch_assoc()) {
	$new_object = new stdClass();
	$new_object->nicename = $row['nicename'];
	$new_object->phonecode = $row['phonecode'];

	$result['country'][] = $new_object;
}
}
if (!$result) {
//код на 1 цифру
$query = $mysqli->query("SELECT * FROM `country` WHERE `phonecode`='$code1'");
while($row = $query->fetch_assoc()) {
	$new_object = new stdClass();
	$new_object->nicename = $row['nicename'];
	$new_object->phonecode = $row['phonecode'];

	$result['country'][] = $new_object;
}
}
//Вывод ошибки номера
if (!$result) {
    $result['error'] = "Код региона не существует, пожалуйста, введите правильный код.";
}
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