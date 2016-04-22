<?php
define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systemes.
define('ROOT', dirname(dirname(__FILE__)) . DS); // pour se simplifier la vie
require_once '..\app\App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'products.index';
}

$page = explode('.', $page);
if ($page[0] === 'admin') {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();
