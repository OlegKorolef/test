<?php

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findByColumn($column, $value)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $db = new DB();
        return $db->query($sql, [':value' => $value]);
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = '
            INSERT INTO ' . static::$table . '
             (' . implode(', ', $cols). ')
             VALUES
             (' . implode(', ', array_keys($data)). ')
         ';
        $db = new DB();
        $db->execute($sql, $data);
    }

    public static function update($column, $value, $number)
    {
        $sql = 'UPDATE ' . static::$table . ' SET ' . $column . '='.$value. ' WHERE id=' . $number;
        $db = new DB();
        return $db->query($sql, [':id' => $number]);
    }

    public static function delete($number)
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        return $db->query($sql, [':id' => $number]);
    }
}