<?php

class ViewController
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
        $item = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

    public function actionByColumn() //findOneByColumn
    {
        $column = $_POST['column'];
        $value = $_POST['value'];
        $items = NewsModel::findByColumn($column, $value);
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

}