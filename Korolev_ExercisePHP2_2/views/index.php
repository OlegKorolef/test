<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Новостная лента</title>
</head>
<body>

    <h1>Новостная лента</h1>

    <?php foreach ($items as $item): ?>
    <div>
        <span><?php echo $item['day_'] . '.' . $item['month_'] . '.' . $item['year_']; ?></span>
        <span><a href="<?php echo '.' . $item['path']; ?>"><?php echo $item['heading']; ?></a></span>
    </div>
    <br><br>
    <?php endforeach; ?>

    <?php include __DIR__ . '/form.php'; ?>

</body>
</html>