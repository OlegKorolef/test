<?php

namespace Applications\Classes;

class LogicError
    extends \ErrorException
{
    public $filename;
    public $date;
    public $file;
    public $line;
    public $code;
    public $mess;

    public function recordErr($filename, $date, $file, $line, $code, $mess)
    {
        $data = $date . '  ' . $file . '  в строке: ' . $line . ' код ошибки:  ' . $code . '  ' . $mess . '<br>';
        file_put_contents($filename, $data . "\r\n", FILE_APPEND);
    }
    public function ViewClasErr($filename)
    {
        echo file_get_contents($filename, FILE_USE_INCLUDE_PATH);
        echo '<a href="index.php">На главную</a>';
    }
}