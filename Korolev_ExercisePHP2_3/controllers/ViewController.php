<?php

class ViewController
{

    public function actionInput()
    {
        include '/../views/form_input.php';
    }

    public function actionInsert()
    {
        include '/../views/form_insert.php';
    }

    public function actionAll()
    {
        $items = News::getAll();
        include '/../views/news/all.php';
    }

    public function actionOne()
    {
        $id = $_POST['id'];
        $item = News::getOne($id);
        include '/../views/news/one.php';
    }

}