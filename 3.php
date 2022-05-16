<?php
require_once 'config/connect.php';
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

$request = mysqli_query($connect, "SELECT * FROM `request` WHERE `request`.`user` = '$username'");
$request = mysqli_fetch_all($request);

foreach ($request as $request)
    $nomer = $request[7];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Головна</title>
</head>
<style>
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
    width: avto;
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

/*Кнопка*/
.btn-buy{
    background: black;
    color: white;
    font-size: 15px;
    padding: 0 30px;
    height: 40px;
    outline: none; /*Універсальна властивість, що одночасно встановлює колір, стиль та товщину зовнішньої межі на всіх чотирьох сторонах елемента*/
    border-radius: 7px;
    cursor: pointer; /*Встановлює форму курсора*/}

    .btn-buyy{
    background: red;
    font-size: 17px;
    padding: 0 30px;
    height: 40px;
    outline: none; /*Універсальна властивість, що одночасно встановлює колір, стиль та товщину зовнішньої межі на всіх чотирьох сторонах елемента*/
    border-radius: 7px;
    cursor: pointer; /*Встановлює форму курсора*/}

/*клас для тексту*/
.text{
    height: avto;
    width: 1000px;}

/*клас для логотипу сайту - зображення*/
.product_img{
    height: avto;
    width: 100px;}

/*клас для логотипу сайту - текст*/
.product_text{
     font-size: 33px;
    font-family: 'cursive;';
     color: black;}
/*Налаштування таблички*/
table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  border-collapse: collapse;
  color: #686461;
}
caption {
  padding: 10px;
  color: white;
  background: #8FD4C1;
  font-size: 18px;
  text-align: left;
  font-weight: bold;
}
th {
  border-bottom: 3px solid #B9B29F;
  padding: 10px;
  text-align: left;
}
td {
  padding: 10px;
}
tr:nth-child(odd) {
  background: white;
}
tr:nth-child(even) {
  background: #E8E6D1;
}
    img{
    width: 90%;
}
#main {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }
#okno {
        width: 80%;
        height: 90%;
        text-align: center;
        padding: 15px;
        border: 3px solid #0000cc;
        border-radius: 10px;
        color: #0000cc;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        background: wheat;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19); /*Додає тінь до елемента*/
        animation-name: animatetop; /*Анімація*/
        animation-duration: 5s; /*Швидкісь анімації*/
        overflow: auto; /* Включить прокрутку, якщо буде потрібно */
      }
       #main:target {display: block;}
.vis{
 background: linear-gradient(to right, #ccff33 0%, #ffcccc 104%);
    border-radius: 10px;
    border: 2px solid black;
    padding: 0 50px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto
}
.vicno{
    width: avto;
    max-height: 1100px;
}
</style>

<body>
    <!-- Виведення шапки сайту -->
     <p class='product_text' align="center" ><img  class = "product_img" src='img/png-transparent-computer-icons-magazine-windows-95-icon-logo-sign-signage.png' >3. Відвідування та успішність студентів </p>
     <p >Ви ввійшли як <b>"<?php echo $username; ?>"</b>  <a href="open.php">Вихід</a></p>

    <!-- Виведення меню сайту  -->
       <div class="menu">
    <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="open.php">Авторизація</a></li>
        <li>
            <a class="menu-caret" href="#">Розділи</a>
            <ul>
                <li><a href="/2.php">2. Відомості про студентів</a></li>
                <li><a href="/3.php">3. Відвідування та успішність студентів</a></li>
                <li><a href="/5.php">5. Помітки керівника групи про індивідуальну роботу з студентами</a></li>
                <li><a href="/7.php">7. План роботи керівника на семестр навчального року</a></li>
            </ul>
        </li>
        <li><a href="help.php">Допомога</a></li>
        <li><a href="comentar.php">Коментарі</a></li>
    </ul>
</div>
<div class="vis">
<h2 align="center">Відвідування та успішність студентів</h2>
<?php
$rozdil = mysqli_query($connect, "SELECT * FROM `3rozdil` WHERE `3rozdil`.`namer_grupu` = '$nomer'");
$rozdil = mysqli_fetch_all($rozdil);
    if($rozdil != null){
        $i=1;?>
<table align="center">
        <tr>
            <th>Семестр</th>
            <th>Відвідування</th>
            <th>Успішність</th>
        </tr>
                <?php
                foreach ($rozdil as $rozdil) {
                ?>
                    <tr>
                        <td><?= $i ?> <?php $i++; ?></td>
                        <td>
                    <?php  if($rozdil[1] == "") {?>
                        <form>   </form>
                        <form action="vendor/dod_rozdil.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" multiple accept="image/*">
                        <input  type="hidden" name="Id" value="<?= $rozdil[0] ?>">
                        <input  type="hidden" name="Tip" value="1">
                        <button type="submit" name="submit" class="btn-buyy">Завантажити
                        </form>
                    <?php } if($rozdil[1] != "") {?>

                            <div align="right">
                            <form action="#main" method="post">
                            <input type="hidden" name="id"
                            value="<?= $rozdil[0] ?>">
                            <input type="hidden" name="sem"
                            value="<?= $i-1 ?>">
                            <input type="hidden" name="vid"
                            value="1">
                            <button class="btn-buy" type="submit">Переглянути</button></form></div>


                    <?php } ?>
                        </td>
                        <td>
                    <?php  if($rozdil[2] == "") {?>

                        <form action="vendor/dod_rozdil.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" multiple accept="image/*">
                        <input  type="hidden" name="Id" value="<?= $rozdil[0] ?>">
                        <input  type="hidden" name="Tip" value="2">
                        <button type="submit" name="submit" class="btn-buyy">Завантажити
                        </form>
                    <?php } if($rozdil[2] != "") {?>


                            <div align="right">
                            <form action="#main" method="post">
                            <input type="hidden" name="id"
                            value="<?= $rozdil[0] ?>">
                            <input type="hidden" name="sem"
                            value="<?= $i-1 ?>">
                            <input type="hidden" name="vid"
                            value="2">
                            <button class="btn-buy" type="submit">Переглянути</button></form></div>

                    <?php } ?>
                        </td> </tr>
                <?php
            }
        ?>
    </table>

    <?php }
        else { ?>
        <div align="center"><form action="vendor/3new.php" method="post">
                <input type="hidden" name="nomer" value="<?= $nomer ?>">
                <button class="btn-buy" type="submit">Створити новий графік</button>
    </form></div>
         <?php } ?>

         <a href="#" id="main">
    <?php
    $ID = $_POST['id'];
    $vid = $_POST['vid'];
    $sem = $_POST['sem'];
    $rozdil = mysqli_query($connect, "SELECT * FROM `3rozdil` WHERE `3rozdil`.`Id` = '$ID' ");
    $rozdil = mysqli_fetch_all($rozdil);
     foreach ($rozdil as $rozdil) {?>
    <div id="okno">

<?php if($vid == 1) { ?>
<h2 align="center" >Відвідування студентів за <?= $sem ?> Семестр </h2>
<p><img class="vicno" src='vendor/three_rozdil/<?= $rozdil[1] ?>' ></p>
<form action="3.php">
<button class="btn-buy" type="submit">Назад</button>
</form>
   <?php } else { ?>
<h2 align="center" >Успішність студентів за <?= $sem ?> Семестр </h2>
<p><img class="vicno" src='vendor/three_rozdil/<?= $rozdil[2] ?>' ></p>
<form action="3.php">
<button class="btn-buy" type="submit">Назад</button>
</form>
    </div></a>
 <?php }}  ?><br></div>
</body>
</html>
