<?php

namespace App\Entity;

use Core\Entity\Entity;

class ProductEntity extends Entity
{
    public function getExcerpt()
    {
        $html = '<p>' . substr($this->description, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

    public function getUrl()
    {
        return 'index.php?p=products.single&id=' . $this->id;
    }
}