<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$Id = $_POST['Id'];
$Tip = $_POST['Tip'];

    $rozdil = mysqli_query($connect, "SELECT * FROM `3rozdil`");
    $rozdil = mysqli_fetch_all($rozdil);

move_uploaded_file($_FILES['file']['tmp_name'], "three_rozdil/" .$_FILES['file']['name']);
$photo = $_FILES['file']['name'];
echo $photo;
if($Tip == 1)
   { mysqli_query($connect,"UPDATE `3rozdil` SET `Vid` = '$photo' WHERE `3rozdil`.`Id` = '$Id';");}
if($Tip == 2)
   { mysqli_query($connect,"UPDATE `3rozdil` SET `Usp` = '$photo' WHERE `3rozdil`.`Id` = '$Id';"); }

header('Location: /3.php');
?>
