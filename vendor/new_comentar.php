<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';
$date = date("y:m:d");
/* Создаем переменные со значениями, которые были получены с $_POST */
$userr = $_POST['userr'];
$comm = $_POST['comm'];


    mysqli_query($connect,"INSERT INTO `comments` (`id`, `date`, `user`, `text`, `statys`) VALUES (NULL, '$date', '$userr', '$comm', 'Новий')");

echo($date);
header('Location: /admin.php');
?>