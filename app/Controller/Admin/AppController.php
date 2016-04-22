<?php

namespace App\Controller\Admin;

use \App;
use Core\Auth\DbAuth;

class AppController extends \App\Controller\AppController
{
    public function __construct()
    {
        parent::__construct();
        $app = App::getInstance();
        $auth = new DbAuth($app->getDb());
//        if (!$auth->registered()) {
//            $this->forbidden();
//        }
        if ($_SESSION['admin'] != 1) {
            $this->forbidden();
        }
    }
}