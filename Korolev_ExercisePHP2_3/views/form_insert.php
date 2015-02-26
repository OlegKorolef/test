<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Вставка новости</title>
</head>
<body>
<form action="./index.php" method="post" enctype="multipart/form-data">
    <label for="day_">День</label>
    <input type="text" id="day_" name="day_">
    <br>
    <label for="month_">Месяц в цифровом формате</label>
    <input type="text" id="month_" name="month_">
    <br>
    <label for="year_">Год</label>
    <input type="text" id="year_" name="year_">
    <br>
    <label for="heading">Заголовок новости</label>
    <input type="text" id="heading" name="heading" size="120">
    <br>
    <label for="path">Файл новости в формате html</label>
    <input type="file" id="path" name="path">
    <br>
    <input type="hidden" name="ctrl" value="Admin">
    <input type="hidden" name="act" value="Add">
    <input type="submit">
</form>
</body>
</html>