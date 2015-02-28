<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Выбранная новость</title>
</head>
<body>
<div>
    <span><?php echo $item->day_ . '.' . $item->month_ . '.' . $item->year_; ?></span>
    <span><a href="<?php echo '.' . $item->path; ?>"><?php echo $item->heading; ?></a></span>
</div>
<br><br>
<?php $_POST['ctrl'] = 'View'; $_POST['act'] = 'Input'; ?>
<a href="index.php">На главную</a>
</body>
</html>