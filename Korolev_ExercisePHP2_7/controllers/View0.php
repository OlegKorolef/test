<?php

namespace Applications\Controllers;



use Applications\Models\News as NewsModel;
use Applications\Classes\View as View;
use Applications\Classes\LogicError as LogicError;
use Applications\Classes\E404_E403_Exception as E404_E403_Exception;

class View0
{

    public function actionInput()
    {
        $view = new View();
        $view->display('form_input.php');
    }

    public function actionInsert()
    {
        $view = new View();
        $view->display('form_insert.html');
    }

    public function actionAll()
    {
        $items = NewsModel::findAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = ($_POST['day_'] + $_POST['month_'] + $_POST['year_']);
        $item0 = NewsModel::findOneByPk($id);
        if (empty($item0)) {
            $e = new E404_E403_Exception('Ошибка 404');
            throw $e;
        } else {
            $item = $item0;
        }
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

    public function actionByColumn() //findOneByColumn
    {
        $column = $_POST['column'];
        $value = $_POST['value'];
        $items0 = NewsModel::findByColumn($column, $value);
        if (empty($items0)) {
            $e = new E404_E403_Exception('Ошибка 404');
            throw $e;
        } else {
            $items = $items0;
        }
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionUpdate()
    {
        $view = new View();
        $view->display('form_update.html');
    }

    public function actionDelete()
    {
        $view = new View();
        $view->display('form_delete.html');
    }

    public function actionViewLogEr()
    {
        $logicError = new LogicError();
        $filename = './log.txt';
        $logicError->viewErr($filename);
    }

}