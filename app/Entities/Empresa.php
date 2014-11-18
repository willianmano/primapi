<?php

namespace App\Entities;

use Charon\Entity;

class Empresa extends Entity {
    protected $nome;
    
    function getNome() {
        return $this->nome;
    }
    
    function validate() {
        return true;
    }
}