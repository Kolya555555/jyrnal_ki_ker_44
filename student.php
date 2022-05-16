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

    $student = $_GET['id'];

    $student = mysqli_query($connect, "SELECT * FROM `student` WHERE `student`.`id` = '$student'");

    $student = mysqli_fetch_assoc($student);

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
/*Поле лоя введення інформації №1*/
.pole{
    width: 35px;
    background: yellow;
    height: 20px;
    border-radius: 10px;}
meni

/*Поле лоя введення інформації №2*/
.pole2{
    width: 50%;
    background: wheat;
    height: 30px;
    border-radius: 10px;
    font-size: 18px;}

/*Поле лоя введення інформації №3*/
.pole3{
    width: 60%;
    background: wheat;
    height: 50px;
    border-radius: 10px;
    font-size: 18px;}

/*Текст*/
.text{
    height: avto;
    width: 80%;}

    /*Текст*/
.textt{
    height: avto;
    width: 90%;}

/*Коментар*/
    .product {
    max-width: 500px;
    border: 1px solid black; /*дозволяє одночасно встановити товщину, стиль та колір навколо елемента*/
    border-radius: 10px; /*Встановлює радіус заокруглення куточків рамки*/
    margin: 10px; /*отступа от каждого края элемента*/
    padding: 20px; /*Встановлює значення полів довкола вмісту елемента*/
    box-shadow: rgba(0, 0, 0, 0.35) 5px 5px 25px; /*Додає тінь до елемента*/
    background: wheat;}

    h3{
    max-width: 800px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px; /*Додає тінь до елемента*/
    background: skyblue;
}
    h4{
    width: 400px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px; /*Додає тінь до елемента*/
    background: skyblue;
}
img{
    width: 300px;
}

</style>

<body>
    <!-- Виведення шапки сайту -->
<h2 align="center" ><?= $student['FIO'] ?></h2>
<p>Ви ввійшли як <b><?php echo $username; ?></b> | <a href="open.php">Вихід</a></p>

<!-- Виведення головного вмісту сторінки -->
<div align="center">
    <div>
        <div>
            <p><img src='vendor/two_rozdil/<?= $student['photo'] ?>' ></p>
        </div>
        <div>
            <h3>ПІП:</h3><p><?= $student['FIO'] ?></p>
        </div>
        <div>
            <h3>Дата народження:</h3><p> <?= $student['Data']?></p>
        </div>
        <div>
            <h3>Місце проживання:</h3><p> <?= $student['Siti_home']?></p>
        </div>
        <div>
            <h3>Телефон:</h3><p><a href="tel: <?= $student['I-tel']?>"><?= $student['I-tel']?></a></p>
        </div>

        <table>
            <tr align="center">
                <td>
                    <h4>Батько:</h4><p> <?= $student['Dad']?></p>
                    <h4>Телефон Б:</h4><p><a href="tel: <?= $student['Dad_tel']?>"><?= $student['Dad_tel']?></a></p>
                </td>
                <td>
                    <h4>Матір:</h4><p> <?= $student['Mother']?></p>
                    <h4>Телефон М:</h4><p><a href="tel: <?= $student['Mother_tel']?>"><?= $student['Mother_tel']?></a></p>
                </td>
            </tr>
        </table>
        <div class="text">
            <h3>Місце проживання батьків:</h3><p> <?= $student['Siti_home_perents'] ?></p>
        </div>
        <div align="center">
            <h3 class="text"> Характеристика:<br> <?= $student['Characteristic'] ?></h3>
        </div>
    </div>
</div>
<br><div align="center"><form action="2.php">
                <button class="btn-buy" type="submit">Назад</button>
    </form></div>

</body>
</html>
