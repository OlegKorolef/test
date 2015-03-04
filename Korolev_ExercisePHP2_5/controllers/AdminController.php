<?php

class AdminController
{
    public function actionAdd()
    {
        if (!empty($_POST)) { //Проверяем данные для вставки

            if (!empty($_POST['day_'])) {
                $day_ = $_POST['day_'];
            }

            if (!empty($_POST['month_'])) {
                $month_ = $_POST['month_'];
            }

            if (!empty($_POST['year_'])) {
                $year_ = $_POST['year_'];
            }

            $id = ($day_ + $month_ + $year_);

            if (!empty($_POST['heading'])) {
                $heading = $_POST['heading'];
            }

            if (!empty($_FILES)) {
                $File = new File();
                $field = 'path';
                $res = $File->file_upload($field);

                if (false !== $res) {
                    $path = $res;
                }
            }

            if (
                isset($day_)
                && isset($month_)
                && isset($year_)
                && isset($heading)
                && isset($path)
            ) {
                $article = new NewsModel(); //Делаем вставку в базу
                $article->id = $id;
                $article->day_ = $day_;
                $article->month_ = $month_;
                $article->year_ = $year_;
                $article->heading = $heading;
                $article->path = $path;
                $article->insert();


                $item = NewsModel::findOneByPk($id); //Проверяем вставку - запрашиваем из базы вставленную строку
                $view = new View();
                $view->item = $item;
                $view->display('form_input.php');

                $_POST['ctrl'] = 'View'; //Готовимся перейти на страницу входа
                $_POST['act'] = 'Input';

                die;
            }
        }
    }

    public function actionUpdate()
    {
        if (!empty($_POST['column'])) {
            $column = $_POST['column'];
        }
        if (!empty($_POST['value'])) {
            $value = $_POST['value'];
        }
        if (!empty($_POST['number'])) {
            $number = $_POST['number'];
        }

        NewsModel::update($column, $value, $number);
        $item = NewsModel::findOneByPk($number);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');

        $_POST['ctrl'] = 'View';
        $_POST['act'] = 'Input';
    }

    public function actionDelete()
    {
        if (!empty($_POST['number'])) {
            $number = $_POST['number'];
        }

        NewsModel::delete($number);
        $items = NewsModel::findAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');

        $_POST['ctrl'] = 'View';
        $_POST['act'] = 'Input';
    }

}