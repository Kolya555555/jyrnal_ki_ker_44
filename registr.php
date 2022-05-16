
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регістрація</title>
</head>
<style>

body { background: url(img/fonn.jpg); }


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
</style>
<body>
    <!-- Виведення логотипу сайту -->

<!-- Виведення головного вмісту сторінки -->
    <h2 align="center">Регістрація в системі</h2>

    <form action="/vendor/create.php" method="post">
        <div align = "center">
            <p class="product_text1">Введіть Логін</p>
            <input class = "pole3" type="text" name="username" required/><br>
            <p class="product_text1">Введіть Пароль</p>
            <input class = "pole3" type="int" name="password" required/><br>
            <p class="product_text1">Введіть ФІО</p>
            <input class = "pole3" type="int" name="FIO" required/><br>
            <p class="product_text1">Введіть E-mail</p>
            <input class = "pole3" type="int" name="Email" required/><br>
            <p class="product_text1">Введіть Телефон</p>
            <input class = "pole3" type="int" name="Phone" required/><br>
            <p class="product_text1">Введіть № групи</p>
            <input class = "pole3" type="int" name="nomer" required/><br><br>
            <button class="btn-buy" type="submit">Зареєструватися</button>
        </div>
    </form>
</body>
</html>
