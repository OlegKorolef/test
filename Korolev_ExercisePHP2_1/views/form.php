<form action="/add.php" method="post" enctype="multipart/form-data">
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
    <input type="text" id="heading" name="heading">
    <br>
    <label for="path">Файл новости в формате html</label>
    <input type="file" id="path" name="path">
    <br>
    <input type="submit">
</form>