<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$grup = $_POST['grup'];
$Fio = $_POST['Fio'];
$Data = $_POST['Data'];
$Siti = $_POST['Siti'];
$Phone= $_POST['Phone'];
$Fio_B = $_POST['Fio_B'];
$Fio_M = $_POST['Fio_M'];
$Phone_B = $_POST['Phone_B'];
$Phone_M = $_POST['Phone_M'];
$Siti_P = $_POST['Siti_P'];
$description = $_POST['description'];

move_uploaded_file($_FILES['file']['tmp_name'], "two_rozdil/" .$_FILES['file']['name']);
$photo = $_FILES['file']['name'];
    $student = mysqli_query($connect, "SELECT * FROM `student`");
    $student = mysqli_fetch_all($student);


    mysqli_query($connect,"INSERT INTO `student` (`id`, `photo`, `FIO`, `Data`, `Siti_home`, `I-tel`, `Dad`, `Mother`, `Dad_tel`, `Mother_tel`, `Siti_home_perents`, `Characteristic`, `Grup`) VALUES (NULL, '$photo', '$Fio', '$Data', '$Siti', '$Phone', '$Fio_B', '$Fio_M', '$Phone_B', '$Phone_M', '$Siti_P', '$description', '$grup')");

header('Location: /2.php');
?>
