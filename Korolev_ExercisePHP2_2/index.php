<?php

require __DIR__ . '/models/article.php';

$base = new NewsArticle;
$base->Article_getAll();
$base = (array) $base;
$items = $base['basis'];

include __DIR__ . '/views/index.php';