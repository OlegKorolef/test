<?php

require_once __DIR__ . '/autoload.php';

use Applications\Classes1\View as View;
use Applications\Classes1\LogicError as LogicError;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathPart = explode('/', $path);

$ctrl = !empty($pathPart[1]) ? ucfirst($pathPart[1]) : 'View';
$act = !empty($pathPart[2]) ? ucfirst($pathPart[2]) : 'Input';

//$ctrl = isset($_POST['ctrl']) ? $_POST['ctrl'] : 'View0';
//$act = isset($_POST['act']) ? $_POST['act'] : 'Input';

$controllerClassName = 'Applications\\Controllers\\' . $ctrl;

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