<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$nomer = $_POST['nomer'];

$rozdil = mysqli_query($connect, "SELECT * FROM `3rozdil`");
$rozdil = mysqli_fetch_all($rozdil);
     for($i=1;$i<9;$i++){
          mysqli_query($connect,"INSERT INTO `3rozdil` (`Id`, `Vid`, `Usp`, `namer_grupu`) VALUES (null, '', '', '$nomer')");
     }


header('Location: /3.php');
?>
