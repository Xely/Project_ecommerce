<?php

namespace App\Table;

use Core\Table\Table;

class ProductTable extends Table
{
    public function getOneWithCategory($product_id)
    {
        return $this->query('
          SELECT product.id, product.name, product.description, product.id_category, category.name AS category
          FROM product
          INNER JOIN category
            ON category.id = product.id_category
          WHERE product.id = ?',
            [$product_id], true
        );
    }

    public function getByCategory($category_id)
    {
        return $this->query('
          SELECT product.id, product.name, product.description, category.name AS category
          FROM product
          INNER JOIN category
            ON category.id = product.id_category
          WHERE category.id = ?',
            [$category_id]
        );
    }

    public function all()
    {
        return $this->query('
          SELECT product.id, product.name, product.description, category.name AS category
          FROM product
          INNER JOIN category
            ON category.id = product.id_category
      ');
    }
}