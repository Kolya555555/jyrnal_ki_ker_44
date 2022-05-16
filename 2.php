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
    background: yellow;
    color: green;
    font-size: 15px;
    padding: 0 30px;
    height: 40px;
    outline: none; /*Універсальна властивість, що одночасно встановлює колір, стиль та товщину зовнішньої межі на всіх чотирьох сторонах елемента*/
    border-radius: 7px;
    cursor: pointer; /*Встановлює форму курсора*/}

/*клас для тексту*/
.text{
    height: avto;
    width: 100%;}

/*клас для логотипу сайту - зображення*/
.product_img{
    height: avto;
    width: 100px;}

/*клас для логотипу сайту - текст*/
.product_text{
     font-size: 33px;
    font-family: 'cursive;';
     color: black;}
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
       #main:target {display: block;}
.vis{
 background: linear-gradient(to right, #ccff33 0%, #ff00ff 104%);
    border-radius: 10px;
    border: 2px solid black;
    padding: 0 50px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto
}
/*Налаштування таблички*/
table {

    border-radius: 7px;
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  border-collapse: collapse;
}
caption {
  padding: 10px;
  color: white;
  background: #8FD4C1;
  font-size: 22px;
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
</table>


    img{
    width: 300px;
}
    h3{

  font-size: 22px;
    max-width: 80%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px; /*Додає тінь до елемента*/
    background: skyblue;
    border-radius: 7px;
}
p{

  font-size: 20px;
}
.vicno{
    width: 90%;
}

</style>

<body>
    <!-- Виведення шапки сайту -->
     <p class='product_text' align="center" ><img  class = "product_img" src='img/png-transparent-computer-icons-magazine-windows-95-icon-logo-sign-signage.png' >2. Відомості про студентів </p>
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
<?php
$request = mysqli_query($connect, "SELECT * FROM `request`");
 $request = mysqli_fetch_all($request);
    foreach ($request as $request){
    if($request[1] == $username){
        $grup = $request[7];
    }}?>
    <br><div class="vis">
<h2 align="center">Студенти групи №<b>"<?php echo $grup; ?>"</b></h2>
<div align="center"><form action="new_student.php" method="post">
                <input type="hidden" name="grup" value="<?= $grup ?>">
                <button class="btn-buy" type="submit">Добавити нового студента</button>
    </form></div><br>

<table align="center" >
<?php
    $student = mysqli_query($connect, "SELECT * FROM `student` WHERE `Grup` = '$grup'");
    $student = mysqli_fetch_all($student);
        ?>
        <tr>
            <th>ПІП</th>
            <th>Дата народження</th>
            <th>Телефон</th>
            <th>Видалити</th>
            <th>Переглянути</th>
        </tr>
                <?php
                foreach ($student as $student) {
                ?>
                    <tr>
                        <td><?= $student[2] ?></td>
                        <td><?= $student[3] ?></td>
                        <td><a href="tel: <?= $student[4] ?>"><?= $student[5] ?></a></td>
                        <td><a style="color: red;" href="vendor/delete_student.php?id=<?= $student[0] ?>">Видалити</a></td>

<form>   </form>

                           <td>
                            <form action="#main" method="post">
                            <input type="hidden" name="id"
                            value="<?= $student[0] ?>">
                            <button class="btn-buy" type="submit">Переглянути</button>

                        </td>
                <?php
            }
        ?>
    </table><br>


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

    </div></a>
   <?php } ?></div>
</body>
</html>



