<?php

namespace Applications\Classes;

class ViewClas
{
    protected $data = [];
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    public function display($path)
    {
        foreach ($this->data as $k => $v) {
            $$k = $v;
        }
        include __DIR__ . '/../views/' . $path;
    }
}