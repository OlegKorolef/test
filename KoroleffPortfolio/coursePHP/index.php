<?php

require_once __DIR__ . '/autoload.php';

use Applications\Classes\ViewClas as ViewClas;
use Applications\Classes\E400E404E403_Exception as E400E404E403_Exception;
use Applications\Classes\LogicError as LogicError;

$ctrl = isset($_POST['ctrl']) ? $_POST['ctrl'] : 'ViewCont';
$act = isset($_POST['act']) ? $_POST['act'] : 'Input';

$controllerClassName = 'Applications\\Controllers\\' . $ctrl;

try {
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
} catch (E400E404E403_Exception $e) {
    $logicError = new LogicError();
    $filename = './log.txt';
    $date = date('d-m-Y H:m:s');
    $file = $e->getFile();
    $line = $e->getLine();
    $code = $e->getCode();
    $mess = $e->getMessage();
    $logicError->recordErr($filename, $date, $file, $line, $code, $mess);
    $ViewClas = new ViewClas();
    $ViewClas->error = $e->getMessage();
    $ViewClas->display('error.php');
}