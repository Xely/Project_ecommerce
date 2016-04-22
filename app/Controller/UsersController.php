<?php

namespace App\Controller;

use App;
use Core\Auth\DbAuth;
use Core\HTML\BootstrapForm;
use Core\Register\DbRegister;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DbAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {

                header('Location: index.php?p=products.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    public function register()
    {
        $errors = array(
            'name' => array(),
            'firstname' => array(),
            'username' => array(),
            'email' => array(),
            'password' => array(),
            'confpassword' => array()
        );
        if (!empty($_POST)) {
            $register = new DbRegister(App::getInstance()->getDb());
            $register->checkMissingFields($_POST, $errors);
            $register->checkExistingUsername($_POST['username'], $errors);
            $register->checkPasswords($_POST, $errors);

            $errors = array_filter($errors);
            if (empty($errors)) {
                $this->User->create([
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => sha1($_POST['password'])
                ]);
                return $this->render('users.register_success', compact('form'));
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'errors'));
    }

    public function cart()
    {
        $this->render('users.cart');
    }

    public function logout()
    {
        $_SESSION['registered'] = 0;
        $ProductsController = new ProductsController();
        $ProductsController->index();
    }

    public function order()
    {
        if ($_SESSION['registered']) {
            $this->render('users.orderAddress');
        } else {
            $this->render('users.orderLogin');
        }
    }

    public function profile()
    {
        $user = $this->User->getOne($_SESSION['id']);
        $addresses = App::getInstance()->getTable('Address')->getByUser($_SESSION['id']);
        $this->render('users.profile', compact('user', 'addresses'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->User->update($_GET['id'], [
                'firstname' => $_POST['firstname'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
            ]);
            if ($result) {
                $UsersController = new UsersController();
                return $UsersController->profile();
            }
        }
        $user = $this->User->getOne($_GET['id']);
        $form = new BootstrapForm($user);
        $this->render('users.edit', compact('form', 'user'));
    }
}