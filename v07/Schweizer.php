<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 02.11.2014
 * Time: 20:39
 */
require_once("Menschen.php");

class Schweizer extends Mensch{
    private geduldsFaden =4;

    public function __construct($name, $alter)
    {
        $this->umbenennen($name);
        $this->alter = $alter;

    }

    public function umbenennen($name)
    {
        $this->behoerdengang();
    }

    private function behoerdengang()
    {

        if($this->isGeduldsFadenGerissen()){
            throw new Exception("Value must be 1 or below");
        }
    }

    private function isGeduldsFadenGerissen()
    {
        if($this->geduldsFaden<1){
            return 0;
         }
    }
} 