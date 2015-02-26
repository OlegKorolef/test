<?php

class News
    extends AbstractModel
{

    public static $id;
    public static $day_;
    public static $month_;
    public static $year_;
    public static $heading;
    public static $path;

    protected static $table = 'news'; //таблица
    protected static $class = 'News'; //объект для складирования результатов

}