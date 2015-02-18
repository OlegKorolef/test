<?php

require_once __DIR__ . '/../functions/sql.php';

function Article_getAll()
{

    sql_connect();

    $sql = 'SELECT * FROM news ORDER BY id DESC';
    return sql_query($sql);
}

function Article_insert($info)
{
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
        '" . $info['id'] ."',
        '" . $info['day_'] ."',
        '" . $info['month_'] ."',
        '" . $info['year_'] ."',
        '" . $info['heading'] ."',
        '" . $info['path'] ."'
        )
    ";
    sql_exec($sql);
}