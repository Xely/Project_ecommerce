<?php

namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;

class ProductsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
    }

    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Product->create([
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'id_category' => $_POST['id_category']
            ]);
            if ($result) {
                $this->index();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'name');
        $form = new BootstrapForm($_POST);
        $this->render('admin.products.edit', compact('categories', 'form'));
    }

    public function index()
    {
        $products = $this->Product->all();
        $this->render('admin.products.index', compact('products'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Product->update($_GET['id'], [
                'name' => $_POST['name'],
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $product = $this->Product->getOne($_GET['id']);
        $this->loadModel('Category');
        $category = $this->Category->getOne($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.products.edit', compact('categories', 'form'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Product->delete($_POST['id']);
            return $this->index();
        }
    }
}