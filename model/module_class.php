<?php
/**
 * Created by PhpStorm.
 * User: theophile
 * Date: 03/04/2018
 * Time: 17:59
 */

class Module
{
    public $id;
    public $nomModule;
    public $numSemestre;
    public $enseignants;
    public $cours;

    public function __toString(){
      return $this->nomModule;
    }

}
