<?php

require_once __DIR__ . '/../functions/sql.php';


abstract class Article {
    public $heading;
    public $path;
//    abstract public function __construct();
//    abstract public function Article_insert($heading, $path);
    abstract public function Article_getAll();
}

class NewsArticle extends Article {
    public $id;
    public $day_;
    public $month_;
    public $year_;
    public $a;
    public function __construct() {
//    public function Connect() {
        sql_connect();
//        mysql_connect('localhost', 'root', '');
//        mysql_select_db('test');
    }
    public function Article_insert($id, $day_, $month_, $year_, $heading, $path) {
        $sql = "
      INSERT INTO news (
        id,
        day_,
        month_,
        year_,
        heading,
        path
        )
      VALUES (
        '" . $this->id ."',
        '" . $this->day_ ."',
        '" . $this->month_ ."',
        '" . $this->year_ ."',
        '" . $this->heading ."',
        '" . $this->path ."'
        )
    ";
        sql_exec($sql);
    }
    public function Article_getAll() {
        $sql = 'SELECT * FROM news ORDER BY id DESC';
        return $this->a = sql_query($sql);
    }
}