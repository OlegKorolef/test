<?php

namespace Applications\Classes1;

use Applications\Classes1\LogicError as LogicError;
use Applications\Classes1\View as View;

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:dbname=test;host=localhost', 'root', '');
        }
        catch (\PDOException $edb) {

            $logicError = new LogicError();
            $filename = './log.txt';
            $date = date('d-m-Y H:m:s');
            $file = $edb->getFile();
            $line = $edb->getLine();
            $code = $edb->getCode();
            $mess = $edb->getMessage();
            $logicError->recordErr($filename, $date, $file, $line, $code, $mess);

            $view = new View();
            $view->error = ' Ошибка 403';
            $view->display('error.php');

        }
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId_0()
    {
        return $this->dbh->lastInsertId();
    }
}