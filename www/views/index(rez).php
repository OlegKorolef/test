<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<table border="1">
    <tr>
        <th>Дата</th>
        <th>Заголовок новости</th>
    </tr>
    <?php foreach ($items as $item): ?>
    <tr>
        <td><?php echo $item['day_'] . '.' . $item['month_'] . '.' . $item['year_']; ?></td>
        <td><a href="<?php echo $item['path']; ?>"><?php echo $item['heading']; ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/form.php'; ?>

</body>
</html>