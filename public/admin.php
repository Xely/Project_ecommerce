<?php
use Core\Auth\DbAuth;

ob_start();

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(dirname(__FILE__)) . DS); // pour se simplifier la vie

require_once '..\app\App.php';
App::load();

//require_once '..\app\Table\ProductTable.php';

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}


// auth
$app = App::getInstance();
$auth = new DbAuth($app->getDb());
if (!$auth->registered()) {
    $app->forbidden();
}

if ($page === 'home') {
    require_once '../Views/admin/Products/index.php';
} else if ($page === 'products.edit') {
    require '../Views/admin/Products/edit.php';
} else if ($page === 'products.add') {
    require '../Views/admin/Products/add.php';
} else if ($page === 'products.delete') {
    require '../Views/admin/Products/delete.php';
} else if ($page === 'category.index') {
    require '../Views/admin/Categories/index.php';
} else if ($page === 'category.delete') {
    require '../Views/admin/Categories/delete.php';
} else if ($page === 'category.add') {
    require '../Views/admin/Categories/add.php';
} else if ($page === 'category.edit') {
    require '../Views/admin/Categories/edit.php';
}

$content = ob_get_clean();
require '../Views/templates/default.php';

