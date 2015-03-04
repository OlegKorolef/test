<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Вход на ленту новостей</title>
</head>
<body>

<h3>
    <!--После успешного сохранения устанавливаем поле $id_0 и $heading-->
    Последняя добавленная новость №<?php echo $item->id_0; ?>, заголовок: <?php echo $item->heading; ?>
</h3>

<form action="index.php" method="post">

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
    <br>
    <br>


    <label>
        <input type="radio" name="act" value="ByColumn">
        Показать выборку новостей
    </label>
    <p>
        Параметры выборки (при вставке, показе всех новостей и одной новости не заполняется)
    </p>
    <label for="column">За год ввести - year_, за месяц ввести - month_</label>
    <input type="text" id="column" name="column">
    <br>
    <label for="value">Значение в цифровом формате</label>
    <input type="text" id="value" name="value">
    <br>
    <br>
    <br>


    <label>
        <input type="radio" name="act" value="One">
        Показать одну новость
    </label>
    <br>
    <p>
        Дата новости (при вставке, показе всех новостей и выборки не заполняется)
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


    <label>
        <input type="radio" name="act" value="Update">
        Редактировать новость
    </label>
    <br>
    <br>
    <br>


    <label>
        <input type="radio" name="act" value="Delete">
        Удалить новость
    </label>
    <br>
    <br>
    <br>


    <input type="submit">

</form>
</body>
</html>