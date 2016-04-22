<?php
namespace App\Controller;

use App;
use Core\Auth\DbAuth;
use Core\HTML\BootstrapForm;

class OrdersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Orders');
    }

    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DbAuth(App::getInstance()->getDb());
            if (!$auth->login($_POST['username'], $_POST['password'])) {
                $errors = true;
            } else {
                unset($_POST);
            }
        }

        if ($_SESSION['registered']) {
            header('location: index.php?p=orders.selectAddress');
//            $this->selectAddress();
        } else {
            $form = new BootstrapForm();
            $this->render('orders.login', compact('form', 'errors'));
        }
    }

    public function selectAddress()
    {
        $AddressesController = new AddressesController();
        $addresses = $AddressesController->Address->getByUser($_SESSION['id']);
        if (!empty($_POST)) {
            if ($_POST['address'] === 'new') {
                $result = $AddressesController->Address->create([
                    'street_number' => $_POST['street_number'],
                    'street_name' => $_POST['street_name'],
                    'postal_code' => $_POST['postal_code'],
                    'city_name' => $_POST['city_name'],
                    'id_user' => $_SESSION['id']
                ]);
                $address = array(
                    'street_number' => $_POST['street_number'],
                    'street_name' => $_POST['street_name'],
                    'postal_code' => $_POST['postal_code'],
                    'city_name' => $_POST['city_name'],
                );
            } else {
                $address = $addresses[$_POST['address']];
            }
            header('Location: index.php?p=orders.shipping');
        }

        $form = new BootstrapForm();

        $this->render('orders.selectAddress', compact('addresses', 'form'));
    }

    public function shipping()
    {
        if (!empty($_POST)) {
            $shipping = $_POST['shipping'];
            unset($_POST);
            header('Location: index.php?p=orders.finish');
        }
        $this->render('orders.shipping', compact('adress'));
    }

    public function addDays($date, $daysToAdd)
    {
        $date = strtotime($date);
        if (date('H', $date) >= 17 || date('D', $date) == 'Sun') {
            $date = strtotime("+1 day", $date);
        }
        for ($i = 0; $i < $daysToAdd; $i++) {
            $date = strtotime("+1 day", $date);
            if (date('D', $date) == 'Sun') {
                $date = strtotime("+1 day", $date);
            }
        }
        return date('d/m/Y', $date);
    }

    public function finish() {

    }
}