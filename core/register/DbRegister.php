<?php

namespace Core\Register;


use App;
use App\Table\UserTable;
use Core\Database\Database;

class DbRegister
{
    /**
     * @var Database
     */
    private $db;

    /**
     * DbAuth constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function checkMissingFields($post, &$errors)
    {
        foreach ($post as $field => $value) {
            if (empty($value)) {
                array_push($errors[$field], 'missing');
            }
        }
    }

    public function checkExistingUsername($username, &$errors)
    {
        $userTable = new UserTable(App::getInstance()->getDb());
        $user = $userTable->getByUsername($username);
        if (!empty($user)) {
            array_push($errors['username'], 'exists');
        }
    }

    public function checkPasswords($post, &$errors)
    {
        if ($post['password'] !== $post['confpassword']) {
            array_push($errors['password'], 'match');
        }
    }
}