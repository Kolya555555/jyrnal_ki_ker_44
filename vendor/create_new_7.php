<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$Data = $_POST['Data'];
$Text = $_POST['Text'];
$nomer = $_POST['nomer'];


    mysqli_query($connect,"INSERT INTO `7rozdil` (`id`, `date`, `text`, `vidmitca`, `namer_grupu`) VALUES (NULL, '$Data', '$Text', '', '$nomer')");
header('Location: /7.php');
?>
