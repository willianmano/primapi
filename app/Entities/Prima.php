<?php

namespace App\Entities;

use Charon\Entity;

class Prima extends Entity {
    protected $nome;
    protected $site;
    protected $cidade;
    protected $estado;
    
    function validate() {
        return true;
    }
}