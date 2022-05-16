<?php

//Зміна статуса замовлення

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Получаем ID продукта из адресной строки */
$id = $_GET['id'];
$statys = "Активний";

mysqli_query($connect, "UPDATE `request` SET `dozvil` = '$statys' WHERE `request`.`id` = '$id' ");


    $request = mysqli_query($connect, "SELECT * FROM `request` WHERE `request`.`id` = '$id'");
    $request = mysqli_fetch_all($request);

foreach ($request as $request) {
mysqli_query($connect,"INSERT INTO `user` (`id`, `login`, `password`) VALUES (NULL, '$request[1]', '$request[2]');");}
//echo $request[1];
//echo $request[2];
/* Переадресация на стрінку "Обробки заммовлення"*/
header('Location: /user.php');