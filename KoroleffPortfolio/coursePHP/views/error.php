<?php
switch ($error) {
    case 'Ошибка 400 - не заполнены данные!':
        header("HTTP/1.0 400 Bad Request");
        break;
    case 'Ошибка 403 - нет соединения с базой данных!':
        header("HTTP/1.0 403 Forbidden");
        break;
    case 'Ошибка 404 - ничего нет по указанным данным!':
        header("HTTP/1.0 404 Not Found");
        break;
}
?>
<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Сообщения об ошибках</title>
</head>
<body>
<h3>Внимание:</h3>
<p><?php echo $error; ?></p>
<a href="index.php">На главную</a>
</body>
</html>