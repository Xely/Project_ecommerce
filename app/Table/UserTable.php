<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table
{
    public function getByUsername($username)
    {
        return $this->query('
          SELECT *
          FROM user
          WHERE user.username = ?',
            [$username], true
        );
    }
}