<?php

require __DIR__ . '/models/article.php';
require __DIR__ . '/functions/file.php';

if (!empty($_POST)) {

    $info = [];

    if (!empty($_POST['day_'])) {
        $info['day_'] = $_POST['day_'];
    }

    if (!empty($_POST['month_'])) {
        $info['month_'] = $_POST['month_'];
    }

    if (!empty($_POST['year_'])) {
        $info['year_'] = $_POST['year_'];
    }

    $info['id'] = ($info['day_'] + $info['month_'] + $info['year_']);

    if (!empty($_POST['heading'])) {
        $info['heading'] = $_POST['heading'];
    }

    if (!empty($_FILES)) {
        $res = File_upload('path');
        if (false !== $res) {
            $info['path'] = $res;
        }
    }

    if (
        isset($info['day_'])
        && isset($info['month_'])
        && isset($info['year_'])
        && isset($info['heading'])
        && isset($info['path'])
    ) {
        Article_insert($info);
        header('Location: /');
        die;
    }
}

include __DIR__ . '/views/add.php';