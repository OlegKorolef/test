<?php

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_POST['ctrl']) ? $_POST['ctrl'] : 'View';
$act = isset($_POST['act']) ? $_POST['act'] : 'Input';

$controllerClassName = $ctrl . 'Controller';

try {
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
} catch (E404_E403_Exception $e) {

    $logicError = new LogicError();
    $filename = __DIR__ . '/log.txt';
    $date = date('d-m-Y H:m:s');
    $file = $e->getFile();
    $line = $e->getLine();
    $code = $e->getCode();
    $mess = $e->getMessage();
    $logicError->recordErr($filename, $date, $file, $line, $code, $mess);

    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');

}