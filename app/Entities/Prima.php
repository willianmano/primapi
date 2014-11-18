<?php

namespace App\Entities;

use Charon\Entity;

class Prima extends Entity {
    protected $nome;
    protected $site;
    protected $cidade;
    protected $estado;

    // function getNome() {
    //     return $this->nome;
    // }

    // function getSite() {
    //     return $this->nome;
    // }
    public function getArrayCopy() 
    {
        return get_object_vars($this);
    }
    function validate() {
        return true;
    }
}