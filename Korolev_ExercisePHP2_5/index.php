<?php

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_POST['ctrl']) ? $_POST['ctrl'] : 'View';
$act = isset($_POST['act']) ? $_POST['act'] : 'Input';

$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;

$method = 'action' . $act;
$controller->$method();