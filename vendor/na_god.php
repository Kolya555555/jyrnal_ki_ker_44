<?php

//Добавление нового товара

/* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL) */
require_once '../config/connect.php';

/* Создаем переменные со значениями, которые были получены с $_POST */
$nomer = $_GET['namer_grupu'];
$nomerr = $nomer+10;
$request = mysqli_query($connect, "SELECT * FROM `request`");
$request = mysqli_fetch_all($request);
$f=0; $g=$nomerr;
foreach($request as $request){
if($request[7] == $nomerr)
    $f++;}
//////////////////////////////////////////////////////////
//Перевірка на переведення на 5 курс, видалення всих
if($nomerr > 49){
//Видаляємо керівка
mysqli_query($connect,"DELETE FROM `request` WHERE `request`.`namer_grupu` = '$nomer'");
//Видаляємо студентів групи
$student = mysqli_query($connect, "SELECT * FROM `student` WHERE `student`.`Grup` = '$nomer'");
$student = mysqli_fetch_all($student);
foreach($student as $student){
mysqli_query($connect,"DELETE FROM `student` WHERE `student`.`Grup` = '$nomer'");}
//Видаляємо 3 розділ
$trozdil = mysqli_query($connect, "SELECT * FROM `3rozdil` WHERE `3rozdil`.`namer_grupu` = '$nomer'");
$trozdil = mysqli_fetch_all($trozdil);
foreach($trozdil as $trozdil){
    mysqli_query($connect,"DELETE FROM `3rozdil` WHERE `3rozdil`.`namer_grupu` = '$nomer'");}
//Видаляємо 5 розділ
$frozdil = mysqli_query($connect, "SELECT * FROM `5rozdil` WHERE `5rozdil`.`namer_grupu` = '$nomer'");
$frozdil = mysqli_fetch_all($frozdil);
foreach($frozdil as $frozdil){
mysqli_query($connect,"DELETE FROM `5rozdil` WHERE `5rozdil`.`namer_grupu` = '$nomer'");}
//Видаляємо 7 розділ
$srozdil = mysqli_query($connect, "SELECT * FROM `7rozdil` WHERE `7rozdil`.`namer_grupu` = '$nomer'");
$srozdil = mysqli_fetch_all($srozdil);
foreach($srozdil as $srozdil){
    mysqli_query($connect,"DELETE FROM `7rozdil` WHERE `7rozdil`.`namer_grupu` = '$nomer'");}
//Видалення коментарів
$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `comments`.`user` = '$request[1]'");
$comments = mysqli_fetch_all($comments);
foreach($comments as $comments){
mysqli_query($connect,"DELETE FROM `comments` WHERE `comments`.`user` = '$request[1]'");}
header('Location: /admin.php');   exit();
}
//////////////////////////////////////////////////////////
if($f == 0){
//Переводимо номер групи у керівника з перевіркою
mysqli_query($connect, "UPDATE `request` SET `namer_grupu` = $nomerr WHERE `request`.`namer_grupu` = '$nomer'");
//Переводимо номер у студентів
$student = mysqli_query($connect, "SELECT * FROM `student` WHERE `student`.`Grup` = '$nomer'");
$student = mysqli_fetch_all($student);
foreach($student as $student){
mysqli_query($connect, "UPDATE `student` SET `Grup` = '$nomerr' WHERE `student`.`Grup` = '$nomer'");}
//Переводимо 3 розділ
$trozdil = mysqli_query($connect, "SELECT * FROM `3rozdil` WHERE `3rozdil`.`namer_grupu` = '$nomer'");
$trozdil = mysqli_fetch_all($trozdil);
foreach($trozdil as $trozdil){
mysqli_query($connect, "UPDATE `3rozdil` SET `namer_grupu` = '$nomerr' WHERE `3rozdil`.`namer_grupu` = '$nomer'");}
//Переводимо 5 розділ
$frozdil = mysqli_query($connect, "SELECT * FROM `5rozdil` WHERE `5rozdil`.`namer_grupu` = '$nomer'");
$frozdil = mysqli_fetch_all($frozdil);
foreach($frozdil as $frozdil){
mysqli_query($connect, "UPDATE `5rozdil` SET `namer_grupu` = '$nomerr' WHERE `5rozdil`.`namer_grupu` = '$nomer'");}
//Переводимо 7 розділ
$srozdil = mysqli_query($connect, "SELECT * FROM `7rozdil` WHERE `7rozdil`.`namer_grupu` = '$nomer'");
$srozdil = mysqli_fetch_all($srozdil);
foreach($srozdil as $srozdil){
mysqli_query($connect, "UPDATE `7rozdil` SET `namer_grupu` = '$nomerr' WHERE `7rozdil`.`namer_grupu` = '$nomer'");}
}else{echo('Така група вже є в системі, перевидіть спершу її');}
header('Location: /admin.php');
?>