<?php
switch ($error) {
    case 'Ошибка 404':
        header("HTTP/1.0 404 Not Found");
        break;
    case 'Ошибка 403':
        header('HTTP/1.0 403 Forbidden');
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
</body>
</html>