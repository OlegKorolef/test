<?php

abstract class AbstractModel
{
    public static $id;
    public static $day_;
    public static $month_;
    public static $year_;
    public static $heading;
    public static $path;
    protected static $table;
    protected static $class;

    public static function insert($id, $day_, $month_, $year_, $heading, $path)
    {
        $db = new DB();
        $sql = "
      INSERT INTO " . static::$table ." (
        id,
        day_,
        month_,
        year_,
        heading,
        path
        )
      VALUES (
        '" . $id ."',
        '" . $day_ ."',
        '" . $month_ ."',
        '" . $year_ ."',
        '" . $heading ."',
        '" . $path ."'
        )
    ";
        $db->sql_exec($sql);
    }

    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';
        return $db->queryAll($sql, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }

}