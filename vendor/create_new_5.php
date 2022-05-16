<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$Data = $_POST['Data'];
$Text = $_POST['Text'];
$nomer = $_POST['nomer'];
foreach ($_POST['num'] as $key=>$value){
    $studd = "$value";
    $stud = "$stud <br> $studd";
    //echo "<b>$value</b><br>";
    }

    mysqli_query($connect,"INSERT INTO `5rozdil` (`id`, `date`, `text`, `student`, `namer_grupu`) VALUES (NULL, '$Data', '$Text', '$stud', '$nomer')");
echo  $nomer;
header('Location: /5.php');
?>
