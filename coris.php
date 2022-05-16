<?php
//Точка входу
session_start();

//Якщо в процесі сесії імя користувача не встановлено, пробуємо його азяти з кук
if(!isset($_SESSION['username']) && isset($_COOKIE['username']))
$_SESSION['username'] = $_COOKIE['username'];

//Ще раз шукаємо користувача в сесії
$username = $_SESSION['username'];

//Не авторизованих користувачів відправляємо на сторінку авторизації
if ($username != "Адміністратор") {
    header("Location: open.php"); //Адрес головної сторінки
    }
require_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Користувачі системи</title>
</head>
<style>
/*Налаштування таблички*/
    th, td {padding: 10px;}

    th {background: #606060;
        color: #fff;}

    td { background: #fc0; /* Цвет фона */
    border: 1px solid #333; /* Граница вокруг ячеек */
    padding: 10px; /* Поля в ячейках */}
/*Налаштовуємо меню*/
.menu {
    width: 100%;
    display: table;
}
.menu ul {
    display: table-row;
}
.menu li {
    display: table-cell;
    position: relative;
    background: black;
}
.menu li a {
    display: block;
    padding: 15px 15px;
    color: #fff;
    text-align: center;
}
.menu-caret:after {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: .255em;
    vertical-align: .255em;
    content: "";
    border-top: 3px solid;
    border-right: 3px solid transparent;
    border-bottom: 0;
    border-left: 3px solid transparent;
}
.menu ul li:hover, .menu a:hover {
    background: #666;
}
.menu li:hover ul  {
    display: block;
    position: absolute;
    top: 100%;
    left: 0px;
    background: #666;
    margin: 0;
    padding: 10px 20px;
    width: 150px;
    z-index: 9999;
}
.menu ul ul  {
    display: none;
}
.menu ul ul li  {
    display: block;
    background: #666;
    padding: 5px 0;
}
.menu ul ul li a  {
    display: block;
    padding: 0;
    background: #666;
    text-align: left;
}
body { background: url(img/depositphotos_91192242-stock-illustration-seamless-pattern-with-blue-petals.jpg); }

/*клас для логотипу сайту - зображення*/
.product_img{
    height: avto;
    width: 100px;}

/*клас для логотипу сайту - текст*/
.product_text{
     font-size: 33px;
    font-family: 'cursive;';
     color: black;}
/*Кнопка №1*/
.btn-buy{
    background: black;
    color: white;
    font-size: 15px;
    padding: 0 30px;
    height: 25px;
    outline: none;
    border-radius: 10px;
    cursor: pointer;}

/*Кнопка №2*/
.btn-buyr{
    background: black;
    color: white;
    font-size: 15px;
    height: 20px;
    width: 170px;
    border-radius: 10px;}

/*Оформлення поля*/
.pole3{
    width: 150px;
    background: white;
    height: 50px;
    border-radius: 5px;
    overflow: auto; /*Смуги прокручування додаються лише за потреби*/
    width:auto;}

/*Розміщення*/
.center{
    font-family: 'Arial';
    width: 50%;
    font-size: 16px;
    margin-left: 10%;} /*Встановлює величину відступу лівого краю елемента*/
.vis{
 background: linear-gradient(to top, #00ffff 0%, #3366ff 104%);
    border-radius: 10px;
    border: 2px solid black;
    padding: 0 30px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto
}
</style>


<body>
    <!-- Виведення шапки сайту -->
    <p class='product_text' align="center" > <img class = "product_img" src='img/png-transparent-computer-icons-magazine-windows-95-icon-logo-sign-signage.png'> Головний кабінет класного керівника</p>
     <p>Ви ввійшли як <b>"<?php echo $username; ?>"</b>  | <a href="index.php">Виход</a></p>
        <!-- Виведення меню сайту  -->
<div class="menu">
    <ul>
         <li><a href="admin.php">Головна</a></li>
        <li><a href="coris.php">Користувачі</a></li>
        <li><a href="user.php">Перегляд заявок</a></li>
    </ul>
</div>
<!-- Виведення головного вмісту сторінки -->
<br><div class="vis">
<h2 align="center">Активні користувачі системи</h2>
        <?php
        /*Делаем выборку строк і преобразовывем полученные данные в нормальный массив*/
        $request = mysqli_query($connect, "SELECT * FROM `request` WHERE `request`.`dozvil` = 'Активний'");
        $request = mysqli_fetch_all($request);
        if($request != null){
            ?>
    <!-- Виведення наявниз замовлень -->
    <table>
        <tr>
           <th>Логін</th>
            <th>ПІП</th>
             <th>E-mail</th>
              <th>Телефон</th>
               <th>Номер групи</th>
        </tr>
            <?Php
            foreach ($request as $request) {
                ?>
                    <tr align="center" >
                        <td><?= $request[1] ?></td>
                        <td><?= $request[3] ?></td>
                        <td><?= $request[4] ?></td>
                        <td><a href="tel: +38<?= $request[5] ?>"><?= $request[5] ?></a></td>
                        <td><?= $request[7] ?></td>
                        <td><a style="color: green;" href="vendor/net.php?id=<?= $request[0] ?>">Заблокувати</a></td>
                     </tr>

                <?php
            }}
        else { ?> <h2 class="product_text" align="center">Користувачі відсутні</h2> <?php }
      ?>
</table>
</div>
</body>
</html>
