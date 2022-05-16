<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$username = $_POST['username'];
$password = $_POST['password'];
$FIO = $_POST['FIO'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$nomer = $_POST['nomer'];
$status = "Неактивний";


    $request = mysqli_query($connect, "SELECT * FROM `request`");
    $request = mysqli_fetch_all($request);


    mysqli_query($connect,"INSERT INTO `request` (`id`, `user`, `password`, `FIO`, `E-mail`, `phone`, `dozvil`, `namer_grupu`) VALUES (NULL, '$username', '$password', '$FIO', '$Email', '$Phone', '$status', '$nomer');");

header('Location: /open.php');
?>