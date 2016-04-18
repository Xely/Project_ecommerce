<?php

namespace App\Controller;

use Core\Auth\DbAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController
{
    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DbAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=admin.products.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }
}