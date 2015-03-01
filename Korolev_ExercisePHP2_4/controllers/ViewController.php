<?php

class ViewController
{

    public function actionInput()
    {
        $view = new View();
        $view->display('form_input.html');
    }

    public function actionInsert()
    {
        $view = new View();
        $view->display('form_insert.html');
    }

    public function actionAll()
    {
        $items = News::getAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = ($_POST['day_'] + $_POST['month_'] + $_POST['year_']);
        $item = News::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

}