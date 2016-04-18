<?php

namespace Core\Auth;

use Core\Database\Database;

/**
 * Class DbAuth
 * @package Core\Auth
 */
class DbAuth
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

    public function getUserId()
    {
        if ($this->logged()) {
            return $_SESSION['registered'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('
          SELECT *
          FROM user
          WHERE username = ?
          ', [$username], null, true);
        if ($user) {
            if ($user->password === sha1($password)) {
                $_SESSION['registered'] = $user->id;
                return true;
            }
        }
        return false;

    }

    public function registered()
    {
        return isset($_SESSION['registered']);
    }
}