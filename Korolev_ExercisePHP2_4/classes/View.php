<?php

class View
{
    protected $data = [];
    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }
    public function display($path)
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }
        include __DIR__ . '/../views/' . $path;
    }
}