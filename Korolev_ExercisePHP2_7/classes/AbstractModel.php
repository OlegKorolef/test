<?php

namespace Applications\Classes;

use Applications\Classes\DB as DB;

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

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public static function findAll()
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';
        $res = $db->query($sql);
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    public static function findOneByPk($id)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id])[0];
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    public static function findByColumn($column, $value) //findOneByColumn
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value]);
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    protected  function insert()
    {
        $db = new DB();
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
        $db->execute($sql, $data);
        $this->id_0 = $db->lastInsertId_0();
    }

    protected function update()
    {
        $db = new DB();
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            if ('id_0' == $k) {
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }
        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols) . '
            WHERE id_0=:id_0
        ';
        $db->execute($sql, $data);
        $this->id_0 = $db->lastInsertId_0();
    }

    public function save()
    {
        if (!isset($this->id_0)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete($id_0)
    {
        $db = new DB();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id_0=:id_0';
        return $db->query($sql, [':id_0' => $id_0]);
    }
}