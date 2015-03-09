<?php

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:dbname=t;host=localhost', 'root', '');
        }
        catch (PDOException $edb) {
            //$view = new LogicError();
            $view = new View();
            $view->error = $edb->getMessage() . ' Ошибка 403';
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
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
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