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
    <label>
        Номер новости = день+месяц+год (при вставке и показе всех новостей не заполняется)
        <input type="text" name="id">
    </label>
    <br>
    <input type="submit">
</form>
</body>
</html>