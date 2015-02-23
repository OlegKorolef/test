<?php

require_once __DIR__ . '/../functions/sql.php';


abstract class Article {
    public $heading;
    public $path;
    abstract public function __construct();
    abstract public function Article_getAll();
}

class NewsArticle extends Article {
    public $id;
    public $day_;
    public $month_;
    public $year_;
    public $basis;
    public function __construct() {
        sql_connect();
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
        return $this->basis = sql_query($sql);
    }
}