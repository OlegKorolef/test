<?php

class AdminController
{
    public function actionSave()
    {
        $File = new File();
        $path = $File->file_upload('path');

        $article = new NewsModel();
        $article->id_0 = $_POST['id_0'];
        $day_ = $article->day_ = $_POST['day_'];
        $month_ = $article->month_ = $_POST['month_'];
        $year_ = $article->year_ = $_POST['year_'];
        $article->id = ($day_ + $month_ + $year_);
        $article->heading = $_POST['heading'];
        $article->path = $path;
        $article->save();

        $id_0 = $article->id_0;

        $view = new View();
        $view->id_0 = $id_0;
        $view->display('form_input.php');

        $_POST['ctrl'] = 'View';
        $_POST['act'] = 'Input';
    }

    public function actionDelete()
    {
        $article = new NewsModel();
        $id_0 = $article->id_0 = $_POST['id_0'];
        $article->delete($id_0);

        $items = NewsModel::findAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');

        $_POST['ctrl'] = 'View';
        $_POST['act'] = 'Input';
    }

}