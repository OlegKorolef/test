<?php

namespace Applications\Controllers;

use Applications\Models\News as NewsModel;
use Applications\Classes\File as File;
use Applications\Classes\ViewClas as ViewClas;
use Applications\Classes\E400E404E403_Exception as E400E404E403_Exception;

class Admin
{
    public function actionSave()
    {
        $email = $_POST['email'];
        $login = $_POST['login'];

        $File = new File();
        $path = $File->file_upload('path');

        $article = new NewsModel();
        $id_0 = $article->id_0 = $_POST['id_0'];
        $day_ = $article->day_ = $_POST['day_'];
        $month_ = $article->month_ = $_POST['month_'];
        $year_ = $article->year_ = $_POST['year_'];
        $article->id = ($day_ + $month_ + $year_);
        $heading = $article->heading = $_POST['heading'];
        $path = $article->path = $path;        
        if (($_POST['update']) ? empty($email ^ $login ^ $id_0 ^ $day_ ^ $month_ ^ $year_ ^ $heading ^ $path)
                               : empty($email ^ $login ^ $day_ ^ $month_ ^ $year_ ^ $heading ^ $path)) {
            $e = new E400E404E403_Exception('Ошибка 400 - не заполнены данные!');
            throw $e;
        } else {
            $article->save();
            (isset($id_0)) ?: $id_0 = $article->id_0;
        }

        $mailer = new \PHPMailer();
        //$mailer->SMTPDebug = 2; //Отладка
        $mailer->Host = 'ssl://smtp.mail.ru';
        $mailer->Port = 465;
        $mailer->SMTPAuth = true;
        $mailer->Username = 'gi1vrosr';
        $mailer->Password = 'kOr765';
        $mailer->Mailer   = "smtp";
        $mailer->From = 'gi1vrosr@mail.ru';
        $mailer->FromName = 'Техническая поддержка';
        $mailer->Subject = 'Лента новостей';
        $mailer->Body = 'Вы успешно добавили или отредактировали новость';
        $mailer->addAddress($email, $login);        
        /*
        if (!$mailer->send()) {
            echo $mailer->ErrorInfo;
        }
        */ //Отладка
        if(!$mailer->Send())
        {
            echo 'Не могу отослать письмо!';
        }
        else
        {
            echo 'Письмо отослано!';
        }

        $ViewClas = new ViewClas();
        $ViewClas->id_0 = $id_0;
        $ViewClas->display('form_input.php');

        $_POST['ctrl'] = 'ViewClas';
        $_POST['act'] = 'Input';
    }

    public function actionDelete()
    {
        $article = new NewsModel();
        $id_0 = $article->id_0 = $_POST['id_0'];
        if (empty($id_0)) {
            $e = new E400E404E403_Exception('Ошибка 400 - не заполнены данные!');
            throw $e;
        } else {
           $article->delete($id_0);
        }        
        
        $items = NewsModel::findAll();
        $ViewClas = new ViewClas();
        $ViewClas->items = $items;
        $ViewClas->display('news/all.php');

        $_POST['ctrl'] = 'ViewClas';
        $_POST['act'] = 'Input';
    }

}