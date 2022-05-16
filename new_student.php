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
    <title>Додавання нових студентів</title>
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

/*Клас для контейнеру*/
.container {
    max-width: 1400px;
    margin: auto;}

.product-container {
    display: flex; /*Багатоцільова властивість, яка визначає, як елемент повинен бути показаний у документі.*/
    flex-wrap: wrap; /*Властивість Вказує, слід розташовуватися в один рядок або можна зайняти кілька рядків. */
    justify-content: space-around;} /*Властивість  визначає, як браузер розподіляє простір навколо елементів уздовж головної осі контейнера*/

.product {
    max-width: 350px;
    border: 1px solid black; /*дозволяє одночасно встановити товщину, стиль та колір навколо елемента*/
    border-radius: 10px; /*Встановлює радіус заокруглення куточків рамки*/
    margin: 10px; /*отступа от каждого края элемента*/
    padding: 20px; /*Встановлює значення полів довкола вмісту елемента*/
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;} /*Додає тінь до елемента*/

.product img {
    width: 100%;}

.product-bottom p {
    font-size: 18px; /*Розмір шришта*/
    font-family: 'Arial';  /*Вид шришта*/
    font-weight: 600; /*Встановлює насиченість шрифту*/
    font-variant: all-petite-caps;} /*Визначає, як потрібно представляти букви*/

.product-price { color: brown;}

.product-text-title {color: black;}

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
/*Вікно для введення інформації №1*/
.vindo{
    background: wheat;
    width: 80%;
    height: 25px;
    border-radius: 5px;
    font-size: 16px;
background: linear-gradient(to right, #ffcccc 0%, #ccff33 104%);}

/*Вікно для введення інформації №2*/
.vindo_text{
    background: wheat;
    width: 80%;
    height: 100px;
    border-radius: 10px;
    font-size: 16px;
background: linear-gradient(to right, #ffcccc 0%, #ccff33 104%);}
.photo{
    background: wheat;
    width: 80%;
}
.vis{
 background: linear-gradient(to right, #ccff33 0%, #ffcccc 104%);
    border-radius: 10px;
    border: 2px solid black;
    padding: 0 50px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto
}
p{

  font-size: 20px;
}
</style>


<body>
    <!-- Виведення шапки сайту -->
     <p class='product_text' align="center" ><img  class = "product_img" src='img/png-transparent-computer-icons-magazine-windows-95-icon-logo-sign-signage.png' >Дадавання студента в базу даних</p>
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
$request = mysqli_query($connect, "SELECT * FROM `request` ");
 $request = mysqli_fetch_all($request);
 $grup = $_POST['grup'];?>
 <br><div class="vis">
<h2 align="center">Введіть дані студента <b><?php echo $grup; ?> </b> групи</h2>
    <div align="center">
        <form method="post" action="vendor/create_new_student.php" enctype="multipart/form-data">
        <p>Фотографія</p>
        <input type="file" name="file" multiple accept="image/*">
        <input type="hidden" name="grup" value="<?= $grup ?>">
        <p>ПІП</p>
        <input type="text" name="Fio" class="vindo" required>
        <p>Дату народження</p>
        <input type="text" name="Data" class="vindo" required>
        <p>Місце проживання</p>
        <input type="text" name="Siti" class="vindo" required>
        <p>Телефон в формате +380:</p>
        <input value="+380" type="text" name="Phone"
        maxlength="13" class="vindo" required></p>
        <p>ПІП Батька</p>
        <input type="text" name="Fio_B" class="vindo" required>
        <p>ПІП Матері</p>
        <input type="text" name="Fio_M" class="vindo" required>
        <p>Телефон Батька</p>
        <input type="text" name="Phone_B" class="vindo">
        <p>Телефон Матері</p>
        <input type="text" name="Phone_M" class="vindo">
        <p>Місце проживання батьків</p>
        <input type="text" name="Siti_P" class="vindo">
        <p>Характеристики</p>
        <textarea name="description" class="vindo_text"></textarea></p>
        <button type="submit" name="submit" class="btn-buy">Добавити студента
    </form></div><br></div>

</body>
</html>

