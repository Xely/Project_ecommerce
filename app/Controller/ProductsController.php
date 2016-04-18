<?php

namespace App\Controller;


class ProductsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('Category');
    }

    public function index()
    {
        $products = $this->Product->all();
        $categories = $this->Category->all();
        $this->render('products.index', compact('products', 'categories'));
    }

    public function category()
    {
        $category = $this->Category->getOne($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $products = $this->Product->getByCategory($category->id);
        $categories = $this->Category->all();
        $this->render('products.category', compact('products', 'categories', 'category'));
    }

    public function single()
    {
        $product = $this->Product->getOneWithCategory($_GET['id']);
        $this->render('products.single', compact('product'));
    }
}