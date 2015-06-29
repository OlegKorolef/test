<?php

namespace Applications\Controllers;

use Applications\Models\News as NewsModel;
use Applications\Classes\ViewClas as ViewClas;
use Applications\Classes\LogicError as LogicError;
use Applications\Classes\E400E404E403_Exception as E400E404E403_Exception;

class ViewCont
{

    public function actionInput()
    {
        $ViewClas = new ViewClas();
        $ViewClas->display('form_input.php');
    }

    public function actionInsert()
    {
        $ViewClas = new ViewClas();
        $ViewClas->display('form_insert.html');
    }

    public function actionAll()
    {
        $items = NewsModel::findAll();
        $ViewClas = new ViewClas();
        $ViewClas->items = $items;
        $ViewClas->display('news/all.php');
    }

    public function actionOne()
    {
        $id = ($_POST['day_'] + $_POST['month_'] + $_POST['year_']);
        $item0 = NewsModel::findOneByPk($id);
        if (empty($item0)) {
            $e = new E400E404E403_Exception('Ошибка 404 - ничего нет по указанным данным!');
            throw $e;
        } else {
            $item = $item0;
        }
        $ViewClas = new ViewClas();
        $ViewClas->item = $item;
        $ViewClas->display('news/one.php');
    }

    public function actionByColumn()
    {
        $column = $_POST['column'];
        $value = $_POST['value'];
        $items = NewsModel::findByColumn($column, $value);

        if (empty($items)) {
            $e = new E400E404E403_Exception('Ошибка 404 - ничего нет по указанным данным!');
            throw $e;
        } else {
            $ViewClas = new ViewClas();
            $ViewClas->items = $items;
            $ViewClas->display('news/all.php');
        }        
    }

    public function actionUpdate()
    {
        $ViewClas = new ViewClas();
        $ViewClas->display('form_update.html');
    }

    public function actionDelete()
    {
        $ViewClas = new ViewClas();
        $ViewClas->display('form_delete.html');
    }

    public function actionViewClasLogEr()
    {
        $logicError = new LogicError();
        $filename = './log.txt';
        $logicError->ViewClasErr($filename);
    }

}