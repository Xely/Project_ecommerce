<?php
define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systemes.
define('ROOT', dirname(dirname(__FILE__)) . DS); // pour se simplifier la vie

require_once '..\app\App.php';
App::load();

//require_once '..\app\Table\ProductTable.php';
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






//ob_start();
//if ($page === 'home') {
//    $controller = new \App\Controller\ProductsController();
//    $controller->index();
//} else if ($page === 'products.category') {
//    $controller = new \App\Controller\ProductsController();
//    $controller->category();
//} else if ($page === 'products.single') {
//    $controller = new \App\Controller\ProductsController();
//    $controller->single();
//} else if ($page === 'login') {
//    $controller = new \App\Controller\Admin\UsersController();
//    $controller->login();
//} else if ($page === 'admin.products.index') {
//    $controller = new \App\Controller\Admin\ProductsController();
//    $controller->index();
//}


$content = ob_get_clean();
require '../App/Views/templates/default.php';

