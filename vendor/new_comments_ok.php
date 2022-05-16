<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';
/* Создаем переменные со значениями, которые были получены с $_POST */
$id = $_POST['id'];


    mysqli_query($connect, "UPDATE `comments` SET `statys` = 'Прочитаний' WHERE `comments`.`id` = '$id' ");

echo($date);
header('Location: /comentar.php');
?>