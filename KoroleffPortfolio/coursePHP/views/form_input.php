<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Вход на ленту новостей</title>
</head>
<body>
<h1>Главная страница</h1>
<h2>ленты новостей</h2>
<<<
<h3>
    <!--После успешного сохранения устанавливаем поле $id_0-->
    Вы сейчас добавили или обновили новость №<?php echo $id_0; ?>
</h3>
<<<
<form action="index.php" method="post">
    <label>
        <input type="radio" name="act" value="Insert">
        Вставить новость
    </label>
    <br>
    <label>
        <input type="radio" name="act" value="Update">
        Редактировать новость
    </label>
    <br>
    <label>
        <input type="radio" name="act" value="Delete">
        Удалить только что вставленную или обновлëнную новость
    </label>    
    <br>
    <<<
    <br>
    <label>
        <input type="radio" name="act" value="All">
        Показать все новости
    </label>
    <br>
    <<<
    <br>
    <label>
        <input type="radio" name="act" value="ByColumn">
        Показать выборку новостей
    </label>
    <br>    
    <label for="column">За год ввести - year_, за месяц ввести - month_</label>
    <input type="text" id="column" name="column">
    <br>
    <label for="value">Значение в цифровом формате</label>
    <input type="text" id="value" name="value">
    <br>
    <<<
    <br>
    <label>
        <input type="radio" name="act" value="One">
        Показать одну новость
    </label>    
    <br>
    <label for="day_">День</label>
    <input type="text" id="day_" name="day_">
    <br>
    <label for="month_">Месяц в цифровом формате</label>
    <input type="text" id="month_" name="month_">
    <br>
    <label for="year_">Год</label>
    <input type="text" id="year_" name="year_">
    <br>
    <<<
    <br>
    <label>
        <input type="radio" name="act" value="ViewClasLogEr">
        Показать лог ошибок
    </label>
    <br>
    <<<
    <br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>