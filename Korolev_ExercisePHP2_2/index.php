<?php

require __DIR__ . '/models/article.php';

//$items = Article_getAll();
$b = new NewsArticle;
$b->Article_getAll();
$b = (array) $b;
$items = $b['a'];
//$items = new NewsArticle;
//$items->Article_getAll();

    var_dump($items);

include __DIR__ . '/views/index.php';