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
    <title>Адміністратор</title>
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
/*Фон*/
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
    <p class='product_text' align="center" > <img  class = "product_img" src='img/png-transparent-computer-icons-magazine-windows-95-icon-logo-sign-signage.png'> Головний кабінет адміністратора</p>
    <p >Ви ввійшли як <b>"<?php echo $username; ?>"</b>  <a href="open.php">Вихід</a></p>
    <!-- Виведення меню сайту  -->
     <div class="menu">
    <ul>
         <li><a href="admin.php">Головна</a></li>
        <li><a href="coris.php">Користувачі</a></li>
        <li><a href="user.php">Перегляд заявок</a></li>
    </ul>
</div>
    <br><div class="vis"><div>
<h2 align="center">Класні керівники</h2>
        <?php
        /*Делаем выборку строк і преобразовывем полученные данные в нормальный массив*/
        $request = mysqli_query($connect, "SELECT * FROM `request` WHERE `request`.`dozvil` = 'Активний'");
        $request = mysqli_fetch_all($request);
        if($request != null){
            ?>
    <!-- Виведення наявниз замовлень -->
    <table>
        <tr>
            <th>Номер групи</th>
           <th>Логін</th>
            <th>ПІП</th>
             <th>E-mail</th>
              <th>Телефон</th>
        </tr>
            <?Php
            foreach ($request as $request) {
                ?>
                    <tr align="center" >
                        <td><?= $request[7] ?></td>
                        <td><?= $request[1] ?></td>
                        <td><?= $request[3] ?></td>
                        <td><?= $request[4] ?></td>
                        <td><a href="tel: +38<?= $request[5] ?>"><?= $request[5] ?></a></td>
                        <td><a style="color: green;" href="detali.php?user=<?= $request[1] ?>">Переглянути роботу</a></td>
                         <td>
                            <?php if ($request[7]<40) { ?>
                            <a style="color: red;" href="vendor/na_god.php?namer_grupu=<?= $request[7] ?>">Перевести на год</a>
                            <?php } else { ?>
                            <b><a style="color: black ;" href="vendor/na_god.php?namer_grupu=<?= $request[7] ?>">Видалити з системи</a></b>
                            <?php } ?>

                        </td>
                     </tr>

                <?php
            }}
        else { ?> <h2 class="product_text" align="center">Користувачі відсутні</h2> <?php }
      ?></div>
</table>
</body>
</html>
