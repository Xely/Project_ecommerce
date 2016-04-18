<?php

namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;

class CategoriesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'name' => $_POST['name'],
            ]);
            return $this->index();
        }
        $this->render('admin.categories.edit', compact('form'));
    }

    public function index()
    {
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'name' => $_POST['name'],
            ]);
            return $this->index();
        }
        $category = $this->Category->getOne($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }
}