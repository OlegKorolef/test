<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php foreach ($items as $item): ?>
    <h1><?php echo $item->title; ?></h1>
    <div><?php echo $item->text; ?></div>
<?php endforeach; ?>
</body>
</html>