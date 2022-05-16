
<?php
require_once 'config/connect.php';

function Login($username, $remember)
{//імя користувача не повинно бути пустим
    if ($username == '')
        return false;
//Запоминаємо імя сесії
    $_SESSION['username'] = $username;
//і в куки, якщо користував обрав галочку
    if ($remember)
        setcookie('username', $username, time() + 3600 * 24 * 7);
//Успішна авторизація
    return true;}

//Сброс авторизації
function Logout()
{//Робимо куки устарівшими
    setcookie('username' , '', time() - 1);
//сброс сесії
    unset($_SESSION['username']);}

//Точка входу в сесію
session_start();
$enter_site = false;
//коли попадаємо на страницу open.php авторизація сброшується
Logout();
//якщо масив POST не пустий, то, обробляємо обробку форми
if(count($_POST) > 0)
    $enter_site = Login($_POST['username'], $_POST['remember'] == 'on');

//Коли авторизація пройдена, перекидаєм пользоваткля на головну сторінку сайта
if($enter_site)
{
        if($_POST['username'] == 'Адміністратор' and $_POST['password'] == '12345')
        {header("Location: admin.php");
         exit();}
        $request = mysqli_query($connect, "SELECT * FROM `request`");
        $request = mysqli_fetch_all($request);
        foreach ($request as $request) {
            if($_POST['username'] == $request[1] && $_POST['password'] == $request[2]){
            if ($request[6] == "Неактивний"){
                header('Location: /open.php');
                exit();}
            else{
                header('Location: /index.php');
                exit();}
    header('Location: /open.php');
}}} ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>
<style>

body { background: url(img/depositphotos_91192242-stock-illustration-seamless-pattern-with-blue-petals.jpg); }


 /*Оформлення текста*/
.product_text1{
     font-size: 20px;
     color: black;}

/*Кнопка*/
.btn-buy{
    background: yellow;
    font-size: 15px;
    padding: 0 30px;
    height: 30px;
    outline: none;
    border-radius: 7px;
    cursor: pointer;}

/*Поле для введення інформації*/
.pole3{
    background: yellow;
    border-radius: 7px;
    font-size: 20px;
    height: 30px;
}
.vis{
  background: linear-gradient(to bottom right, #ffff66 0%, #66ff99 100%);
    border-radius: 10px;
    border: 2px solid black;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    padding: 0 50px;
     box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 15px; /*Додає тінь до елемента*/
}
</style>
<body>
    <!-- Виведення логотипу сайту -->
<div class="vis"><div align="center">
<!-- Виведення головного вмісту сторінки -->
    <h2 align="center">Авторизація у системі</h2>

    <form action="" method="post">
        <div align = "center">
            <p align="center class="product_text1">Введіть Логін</p>
            <input class = "pole3" type="text" name="username" required/><br>
            <p class="product_text1">Введіть Пароль</p>
            <input class = "pole3" type="int" name="password" required/><br>
            <p class="product_text1"> <input type="checkbox" name="remember" />Запам'ятати мене(поставте галочку)</p>
            <button class="btn-buy" type="submit">Ввійти в систему</button>
        </div>
    </form>
    <br><div align = "center">
     <a  style="color: red;" href="registr.php"><button class="btn-buy" type="submit">Зареєструватися</button></a></div><br>
 </div></div>
</body>
</html>

<script language="JavaScript">  alert('Якщо ви вперше потрапили на наш сайт пройдіть регістрацію, або для авторизованих користувачів в системі авторизацію');
</script>