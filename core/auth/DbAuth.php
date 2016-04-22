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

    /**
     * @return bool
     */
    public function getUserId()
    {
        if ($this->logged()) {
            return $_SESSION['registered'];
        }
        return false;
    }

    /**
     * Checks if the username and password are correct
     * @param $username
     * @param $password
     * @return boolean True if the user and his password are correct
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
                $_SESSION['registered'] = 1;
                $_SESSION['admin'] = $user->admin;
                $_SESSION['username'] = $user->username;
                $_SESSION['id'] = $user->id;
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool True if the user is logged in
     */
    public function registered()
    {
        return isset($_SESSION['registered']);
    }
}