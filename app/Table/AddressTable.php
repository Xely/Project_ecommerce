<?php

namespace app\Table;


use Core\Table\Table;

class AddressTable extends Table
{
    public function getByUser($id)
    {
        return $this->query('
          SELECT address.id, address.city_name, address.street_name, address.street_number, address.postal_code
          FROM address
          INNER JOIN user
            ON address.id_user = user.id
          WHERE user.id = ?',
            [$id]
        );
    }
}