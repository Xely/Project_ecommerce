<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function pogetUrl() {
        return 'index.php?p=products.category&id=' . $this->id;
    }

//    public function getAll() {
//        return $this->query()
//    }
}