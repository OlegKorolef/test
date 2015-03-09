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

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';
        $db = new DB();
        $db->setClassName(get_called_class());
        $res = $db->query($sql);
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    public static function findOneByPk($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, [':id' => $id])[0];
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    public static function findByColumn($column, $value) //findOneByColumn
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $db = new DB();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, [':value' => $value]);
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    protected  function insert()
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
        $this->id_0 = $db->lastInsertId_0();
    }

    protected function update()
    {
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
        $db = new DB();
        $db->execute($sql, $data);
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
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id_0=:id_0';
        $db = new DB();
        return $db->query($sql, [':id_0' => $id_0]);
    }
}