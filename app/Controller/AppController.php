<?php

namespace App\Controller;

use App;
use Core\Controller\Controller;

class AppController extends Controller
{
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . 'app/Views/';
    }

    public function breadcrumb()
    {
        $breadcrumb = '';
        if (isset($_GET['p'])) {
            $page = explode('.', $_GET['p']);
            if ($page[0] === 'products') {
                $breadcrumb .= 'Acceuil';
                if (isset($page[1])) {
                    if ($page[1] === 'single') {
                        $id = $_GET['id'];
                        $ProductsController = new ProductsController();
                        $product = $ProductsController->Product->getOneWithCategory($id);
                        $breadcrumb .= ' >> ' . ucfirst($product->category);
                    } else if ($page[1] === 'category') {
                        $id = $_GET['id'];
                        $ProductsController = new ProductsController();
                        $category = $ProductsController->Category->getOne($id);
                        $breadcrumb .= ' >> ' . ucfirst($category->name);
                    }

                }
            }
        } else {
            $breadcrumb = 'Acceuil';
        }

        return $breadcrumb;
    }

    protected function loadModel($modelName)
    {
        $this->$modelName = App::getInstance()->getTable($modelName);
    }
}