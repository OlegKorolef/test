<?php

require_once __DIR__ . '/autoload.php';

$items = News::getAll(); // проба
var_dump($items); // проба

$view = new View(); // создали объект
$view->data('news', $items); // передали данные для показа
$view->display('allnews.php'); // дали команду на показ шаблона с указанными ранее данными

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;

$method = 'action' . $act;
$controller->$method();