<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 28.10.2014
 * Time: 20:01
 */
/*
class Mensch
__construct() Setzen von Name und Geschlecht, sowie das Alter um 1 Jahr erhöhen
__destruct() Ein Meldung, dass der Mensch gestorben ist

alter() Das Alter um 1 Jahr erhöhen
getName() Der Name des Menschen ausgeben
umbenennen() Setzt den Namen neu des Menschen
geburtstagFeiern() Erhöht das Alter um 1 Jahr und gibt eine Meldung aus
neueEvolutionstheorie() Setzt den Vorfahre neu
getVorfahre() Gibt den Vorfahre zurück
Erstellen Sie eine statische Variable, um den Vorfahren als String zu speichern
*/
require_once("Lebewesen.php");

class Mensch extends Lebewesen
{
private alter;
private name;
private static  vorfahre;

    public function __construct($name, $alter)
    {
        $this->umbenennen($name);
        $this->alter = $alter;

    }

    public function __destruct()
    {
        return "ich bin tot!";
    }

    public function alter()
    {
        $this->alter++;
    }

    public function  getName()
    {
        return $this->name;
    }

    public function umbenennen($name)
    {
        $this->name = $name;
    }

    public function geburtstagFeiern()
    {
        $this->alter++;
        return "Yuhu $this->alter. Geburi ka!";
    }

    public function neueEvolutionstherie($vorfahre)
    {
        $this->vorfahre = $vorfahre;

    }

    public function getVorfahre(){
        return self::vorfahre;
    }
} 