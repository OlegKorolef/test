<?php

namespace Applications\Controllers;

use Applications\Models\News as NewsModel;
use Applications\Classes1\File as File;
use Applications\Classes1\View as View;
use Applications\Classes1\E404_E403_Exception as E404_E403_Exception;

class Admin
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

        $id_0_0 = $article->id_0;
        if (empty($id_0_0)) {
            $e = new E404_E403_Exception('Ошибка 403');
            throw $e;
        } else {
            $id_0 = $id_0_0;
        }

        $view = new View();
        $view->id_0 = $id_0;
        $view->display('form_input.php');

        $mailer = new \PHPMailer();
        $mailer->send();

        $_POST['ctrl'] = 'View';
        $_POST['act'] = 'Input';
    }

    public function actionDelete()
    {
        $article = new NewsModel();
        $id_0 = $article->id_0 = $_POST['id_0'];
        $article->delete($id_0);

        $items0 = NewsModel::findAll();
        if (empty($items0)) {
            $e = new E404_E403_Exception('Ошибка 403');
            throw $e;
        } else {
            $items = $items0;
        }
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');

        $_POST['ctrl'] = 'View';
        $_POST['act'] = 'Input';
    }

}