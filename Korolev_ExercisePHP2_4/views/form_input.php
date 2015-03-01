<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Вход на ленту новостей</title>
</head>
<body>

<form action="./index.php" method="post">
    <label>
        <input type="radio" name="act" value="Insert">
        Вставка новости
    </label>
    <br>
    <label>
        <input type="radio" name="act" value="All">
        Показать все новости
    </label>
    <br>
    <label>
        <input type="radio" name="act" value="One">
        Показать одну новость
    </label>
    <br>
    <br>
    <p>
        Дата новости (при вставке и показе всех новостей не заполняется)
    </p>
    <label for="day_">День</label>
    <input type="text" id="day_" name="day_">
    <br>
    <label for="month_">Месяц в цифровом формате</label>
    <input type="text" id="month_" name="month_">
    <br>
    <label for="year_">Год</label>
    <input type="text" id="year_" name="year_">
    <br>
    <br>
    <br>
    <input type="submit">
</form>
</body>
</html>