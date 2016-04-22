<?php

namespace App\Controller;


use Core\HTML\BootstrapForm;

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
        if (!empty($_POST)) {
            $this->addProductToCart($product, $_POST['quantity']);
            $this->index();
        }
        $form = new BootstrapForm();
        $this->render('products.single', compact('product', 'form'));
    }

    public function addProductToCart($product, $quantity = 1) {
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id] += $quantity;
        } else {
            $_SESSION['cart'][$product->id] = $quantity;
        }
    }

    public function deleteFromCart() {
        if (isset($_SESSION['cart'][$_GET['id']])) {
            unset($_SESSION['cart'][$_GET['id']]);
        }
        header('Location: index.php?p=users.cart');
    }
}