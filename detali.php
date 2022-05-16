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

$userr = $_GET['user'];

$request = mysqli_query($connect, "SELECT * FROM `request` WHERE `request`.`user` = '$userr'");
$request = mysqli_fetch_all($request);

foreach ($request as $request)
    $nomer = $request[7];
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

    th {background: #000;
        color: #fff;
}

    td { background: #fc0; /* Цвет фона */
    border: 1px solid #333; /* Граница вокруг ячеек */
    padding: 10px; /* Поля в ячейках */

}

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

/*Кнопка*/
.btn-buy{
    background: black;
    color: #fff;
    font-size: 15px;
    padding: 0 20px;
    height: 40px;
    outline: none; /*Універсальна властивість, що одночасно встановлює колір, стиль та товщину зовнішньої межі на всіх чотирьох сторонах елемента*/
    border-radius: 7px;
    cursor: pointer; /*Встановлює форму курсора*/}

/*Вікно для введення інформації №2*/
.vindo_text{
    background: #fc0;
    width: 40%;
    height: 100px;
    border-radius: 10px;
    font-size: 16px;}
.vis{
 background: linear-gradient(to top, #ff99cc 0%, #66ff66 104%);
    border-radius: 10px;
    border: 2px solid black;
    padding: 0 30px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto}
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
        height: avto;
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
        animation-duration: 2s; /*Швидкісь анімації*/
        overflow: auto; /* Включить прокрутку, якщо буде потрібно */
      }
      .vicno{
    width: 90%;
}
    h3{font-size: 22px;
    max-width: 80%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px; /*Додає тінь до елемента*/
    background: skyblue;
    border-radius: 7px;}

  #main:target {display: block;}

img.animate1 {
width: avto;
max-width: 300px;
height:auto

    filter: alpha (Opacity=25);

    opacity: 0.10;

    -moz-transition: all 1s ease-in-out; /* эффект перехода для Firefox до версии 16.0 */

    -webkit-transition: all 1s ease-in-out; /* эффект перехода для Chrome до версии 26.0, Safari, Android и iOS */

    -o-transition: all 1s ease-in-out; /* эффект перехода для Opera до версии 12.10 */

    transition: all 1s ease-in-out; /* эффект перехода для других браузеров */

}

img.animate1:hover {
  width: avto;
        max-width: 1000px;
        height:auto
    filter: alpha (Opacity=100);

    opacity: 1;

}
p{

  font-size: 20px;
}
</style>


<body>
    <!-- Виведення шапки сайту -->
    <p class='product_text' align="center" > <img  class = "product_img" src='img/png-transparent-computer-icons-magazine-windows-95-icon-logo-sign-signage.png'> Перегляд роботи користувача "<?php echo $userr; ?>"</p>
    <p >Ви ввійшли як <b>"<?php echo $username; ?>"</b>  <a href="open.php">Вихід</a></p>
    <!-- Виведення меню сайту  -->
   <div class="menu">
    <ul>
         <li><a href="admin.php">Головна</a></li>
        <li><a href="coris.php">Користувачі</a></li>
        <li><a href="user.php">Перегляд заявок</a></li>
    </ul>
</div>
<br><div class="vis">
<div align="center">
        <h1>Перегляд даних групи №<b>"<?php echo $nomer; ?>"</h1>
<h2 align="center">Студенти групи</h2>
<table align="center">
<?php
    $student = mysqli_query($connect, "SELECT * FROM `student` WHERE `Grup` = '$nomer'");
    $student = mysqli_fetch_all($student);
        ?>
        <tr>
            <th>ПІП</th>
            <th>Дата народження</th>
            <th>Телефон</th>
        </tr>
                <?php
                foreach ($student as $student) {
                ?>
                    <tr>
                        <td><?= $student[2] ?></td>
                        <td><?= $student[3] ?></td>
                        <td><a href="tel: <?= $student[4] ?>"><?= $student[5] ?></a></td>
                        <td><form>   </form><form action="#main" method="post">
                            <input type="hidden" name="id"
                            value="<?= $student[0] ?>">
                            <button class="btn-buy" type="submit">Переглянути</button></td>
                    </tr>
                <?php
            }
        ?>
    </table></div>
<a href="#" id="main">
    <?php
    $ID = $_POST['id'];
    $student = mysqli_query($connect, "SELECT * FROM `student` WHERE `student`.`id` = '$ID' ");
    $student = mysqli_fetch_all($student);
     foreach ($student as $student) {?>
    <div id="okno">

        <h2><?= $student[2] ?></h2>
        <div>
            <p><img class="vicno" src='vendor/two_rozdil/<?= $student[1] ?>' ></p>
        </div>
         <div align="center">
        <div>
            <h3>ПІП:</h3><p><?= $student[2] ?></p>
        </div>
        <div>
            <h3>Дата народження:</h3><p> <?= $student[3]?></p>
        </div>
        <div>
            <h3>Місце проживання:</h3><p> <?= $student[4]?></p>
        </div>
        <div>
            <h3>Телефон:</h3><p><?= $student[5]?></p>
        </div>
                    <h3>Батько:</h3><p> <?= $student[6]?><br><?= $student[8]?></p>

                    <h3>Матір:</h3><p> <?= $student[7]?><br><?= $student[9]?></p>

        <div>
            <h3>Місце проживання батьків:</h3><p> <?= $student[10] ?></p>
        </div>
        </div>
        <div align="center">
            <h3 class="text"> Характеристика:<br> <?= $student[11] ?></h3>
        </div>

    </div>
   <?php } ?></a>

<h2 align="center">Відвідування та успішність студентів групи</h2>
<?php
$rozdil = mysqli_query($connect, "SELECT * FROM `3rozdil` WHERE `3rozdil`.`namer_grupu` = '$nomer'");
$rozdil = mysqli_fetch_all($rozdil);
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
                <td><?= $i ?> <?php $i++; ?></td>
                <td>
                     <?php if ($rozdil[1] == ""){ ?>
                     <p>Зображення не має </p>
                     <?php } else {?>
                    <div align="center">
                    <p><img class= "animate1"  src='vendor/three_rozdil/<?= $rozdil[1] ?>' title="Відвідування cтудентів за <?=$i-1?> Семестр"></p></div><?php }?>
                </td>
             <td>
                     <?php if ($rozdil[2] == ""){ ?>
                     <p>Зображення не має </p>
                     <?php } else {?>
                    <div align="center">
                    <p><img class = "animate1" src='vendor/three_rozdil/<?= $rozdil[2] ?>'title="Успішність cтудентів за <?=$i-1?> Семестр" ></p></div><?php }?>
                </td>
</tr>
                <?php
            }
        ?>
    </table>
<h2 align="center">Помітки керівника групи про індивідуальну роботу з студентами</h2>
<table align="center">
<?php
    $rozdil = mysqli_query($connect, "SELECT * FROM `5rozdil` WHERE `5rozdil`.`namer_grupu` = '$nomer'");
    $rozdil = mysqli_fetch_all($rozdil);
        ?>

        <?php
    if($rozdil != null ) {  ?>
        <tr>
            <th>Дата</th>
            <th>Опис проведеної роботи</th>
            <th>Суденти</th>
        </tr>
                <?php
                foreach ($rozdil as $rozdil) {
                ?>
                    <tr >
                        <td><?= $rozdil[1] ?></td>
                        <td><?= $rozdil[2] ?></td>
                        <td><?= $rozdil[3] ?></td>
                </tr>
                <?php
            } } else {
        ?>
            <h2 align="center">Індивідуальних робіт в групі не виконувалося</h2>

        <?php
            }
        ?>
    </table>
<h2 align="center">План роботи керівника на семестр навчального року</h2>
<table align="center">
        <?php
    $rozdil = mysqli_query($connect, "SELECT * FROM `7rozdil` WHERE `7rozdil`.`namer_grupu` = '$nomer'");
    $rozdil = mysqli_fetch_all($rozdil);

    if($rozdil != null ) {  ?>
        <tr>
            <th>Дата</th>
            <th>Опис проведеної роботи</th>
            <th>Відмітка</th>
        </tr>
                <?php
                foreach ($rozdil as $rozdil) {
                ?>
                    <tr >
                        <td><?= $rozdil[1] ?></td>
                        <td><?= $rozdil[2] ?></td>
                        <td>

                        <?php  if($rozdil[3] == "") {?>
                    <?php } if($rozdil[1] != "") {?>
                        <?= $rozdil[3] ?>
                    <?php } ?>



                         </td>
                </tr>
                <?php
            } } else {
        ?>
            <h2 align="center">"План керівника покищо відсутнії"</h2>

        <?php
            }
        ?>
    </table>
<br><div align="center"><form></form><form action="vendor/new_comentar.php" method="post">
                <input type="hidden" name="userr" value="<?= $userr ?>">
                <h2>Коментар</h2>
                <textarea name="comm" class="vindo_text" required></textarea>
                <br>
                <button class="btn-buy" type="submit">Вислати коментар</button>
    </form></div><br></div><br><div class="vis">
    <div align="center"><h2>Надіслані коментарі</h2>
                <?php
    $comments = mysqli_query($connect, "SELECT * FROM `comments`WHERE `comments`.`user` = '$userr'");
    $comments = mysqli_fetch_all($comments);
foreach($comments as $comments) { ?>
    <td><h2>Дата <?= $comments[1] ?> Статус "<?= $comments[4] ?>" <a style="color: red;" href="vendor/net_comentar.php?id=<?= $comments[0] ?>">Видалити</a></h2></td>
      <td><h2>--"<?= $comments[3] ?>"--</h2></td><br><br>
<?php }?>
</div></div>
</body>
</html>