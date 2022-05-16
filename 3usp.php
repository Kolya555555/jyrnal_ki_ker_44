<?php
//Точка входу
session_start();

//Якщо в процесі сесії імя користувача не встановлено, пробуємо його азяти з кук
if(!isset($_SESSION['username']) && isset($_COOKIE['username']))
$_SESSION['username'] = $_COOKIE['username'];

//Ще раз шукаємо користувача в сесії
$username = $_SESSION['username'];

//Не авторизованих користувачів відправляємо на сторінку авторизації
if ($username == Null) {
    header("Location: open.php"); //Адрес головної сторінки
    }

    require_once 'config/connect.php';

    $id = $_GET['id'];
    $tip = $_GET['tip'];

    $rozdil = mysqli_query($connect, "SELECT * FROM `3rozdil` WHERE `3rozdil`.`Id` = '$id'");

    $rozdil = mysqli_fetch_assoc($rozdil);

?>

<!doctype html>
<html lang="en">
<head>
    <title>Студент</title>
</head>
<style>

/*Кнопка*/
.btn-buy{
    background: yellow;
    color: black;
    padding: 0 50px;
    height: 30px;
    outline: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;}

img{
    width: 90%;
}
</style>
<body>
     <!-- Виведення шапки сайту -->
    <?php $k=$rozdil['Id']%8;
    if($k == 0) {?>
<h2 align="center" >Успішність студентів за 8 Семестр </h2>
<?php } else {?>
<h2 align="center" >Успішність студентів за <?= $k ?> Семестр </h2> <?php } ?>
<h2 align="center" > <?= $tip ?></h2>
<!-- Виведення головного вмісту сторінки -->
<div align="center">
        <div>
            <p><img src='vendor/three_rozdil/<?= $rozdil['Usp'] ?>' ></p>
        </div>
</div>
</body>
</html>