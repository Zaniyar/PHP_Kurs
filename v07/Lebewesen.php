<?php

/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 28.10.2014
 * Time: 19:56
 */
abstract class Lebewesen
{
private alter;

   abstract protected  function altern()
    {//Soll den Programmieren zwingen, diese Methode zu implementieren


    }

   public  function getAlter()
    { //Ein ausprogrammierter Getter für das Alter Attribut.

        return $this->alter;

    }

}

?>
