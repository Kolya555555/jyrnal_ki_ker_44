<?php

//Зміна статуса замовлення

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Получаем ID продукта из адресной строки */
$id = $_GET['id'];
$statys = "Неактивний";

mysqli_query($connect, "UPDATE `request` SET `dozvil` = '$statys' WHERE `request`.`id` = '$id' ");

header('Location: /coris.php');