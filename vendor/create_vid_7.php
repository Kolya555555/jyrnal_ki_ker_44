<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$vidmi = $_POST['a'];
$Id = $_POST['Id'];

$rozdil = mysqli_query($connect, "SELECT * FROM `7rozdil`");
$rozdil = mysqli_fetch_all($rozdil);

     foreach ($rozdil as $rozdil) {
        if ($rozdil[0] == $Id) {
          mysqli_query($connect, "UPDATE `7rozdil` SET `vidmitca` = '$vidmi' WHERE `7rozdil`.`id` = '$Id' ");
        }}

header('Location: /7.php');
?>
