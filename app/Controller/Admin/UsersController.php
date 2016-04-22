<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function index()
    {
        $users = $this->User->all();
        $this->render('admin.users.index', compact('users'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->User->update($_GET['id'], [
                'name' => $_POST['name'],
                'firstname' => $_POST['firstname'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'admin' => $_POST['admin'],
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $user = $this->User->getOne($_GET['id']);
//        $this->loadModel('User');
//        $category = $this->Category->getOne($_GET['id']);
//        $categories = $this->Category->extract('id', 'name');
//        $categories = $this->Category->all();
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit', compact('form', 'user'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->User->delete($_POST['id']);
            return $this->index();
        }
    }

}