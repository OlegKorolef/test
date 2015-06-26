<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Лента новостей</title>
</head>
<body>
<?php foreach ($items as $item): ?>
    <div>
        <span>№<?php echo $item->id_0; ?></span>
        <span>*<?php echo $item->day_ . '.' . $item->month_ . '.' . $item->year_; ?>*</span>
        <span><a href="<?php echo '.' . $item->path; ?>"><?php echo $item->heading; ?></a></span>
    </div>
    <br><br>
<?php endforeach; ?>
<a href="index.php">На главную</a>
<?php $_POST['ctrl'] = 'ViewClas'; $_POST['act'] = 'Input'; ?>
</body>
</html>