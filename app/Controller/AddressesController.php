<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;

class AddressesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Address');
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Address->update($_GET['id'], [
                'street_number' => $_POST['street_number'],
                'street_name' => $_POST['street_name'],
                'postal_code' => $_POST['postal_code'],
                'city_name' => $_POST['city_name'],
            ]);
            if ($result) {
                $UsersController = new UsersController();
                return $UsersController->profile();
            }
        }
        $address = $this->Address->getOne($_GET['id']);
        $form = new BootstrapForm($address);
        $this->render('address.edit', compact('form', 'address'));
    }

    public function delete()
    {
        $this->Address->delete($_GET['id']);
        $UsersController = new UsersController();
        return $UsersController->profile();
    }
}