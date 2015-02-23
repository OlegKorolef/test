<?php

require __DIR__ . '/models/article.php';
require __DIR__ . '/functions/file.php';

$NewArticle = new NewsArticle();
if (!empty($_POST)) {

//    $info = [];

    if (!empty($_POST['day_'])) {
//        $info['day_'] = $_POST['day_'];
        $day_ = $_POST['day_'];
    }

    if (!empty($_POST['month_'])) {
//        $info['month_'] = $_POST['month_'];
        $month_ = $_POST['month_'];
    }

    if (!empty($_POST['year_'])) {
//        $info['year_'] = $_POST['year_'];
        $year_ = $_POST['year_'];
    }

//    $info['id'] = ($info['day_'] + $info['month_'] + $info['year_']);
    $id = ($day_ + $month_ + $year_);

    if (!empty($_POST['heading'])) {
//        $info['heading'] = $_POST['heading'];
        $heading = $_POST['heading'];
    }

    if (!empty($_FILES)) {
        $res = File_upload('path');
        if (false !== $res) {
//            $info['path'] = $res;
            $path = $res;
        }
    }

    if (
//        isset($info['day_'])
//        && isset($info['month_'])
//        && isset($info['year_'])
//        && isset($info['heading'])
//        && isset($info['path'])
        isset($day_)
        && isset($month_)
        && isset($year_)
        && isset($heading)
        && isset($path)
    ) {
//        Article_insert($info);
        $NewArticle = new NewsArticle;
        $NewArticle->id = $id;
        $NewArticle->day_ = $day_;
        $NewArticle->month_ = $month_;
        $NewArticle->year_ = $year_;
        $NewArticle->heading = $heading;
        $NewArticle->path = $path;
        $NewArticle->Article_insert($id, $day_, $month_, $year_, $heading, $path);

        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME), '/\\');
        header("Location: http://$host$uri/index.php");
        die;
    }
}

include __DIR__ . '/views/add.php';