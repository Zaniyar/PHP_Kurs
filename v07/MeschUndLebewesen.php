<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 03.11.2014
 * Time: 20:33
 */

/*
Führen Sie die folgenden Anweisungen aus:
Instanzieren eines Menschen $mensch
Name von $mensch anzeigen
$mensch umbenennen
Alter von $mensch anzeigen
Prüfen, ob $mensch von einem Menschen abstammt
Der Vorfahre von $mensch anzeigen
Eine neue Evolutionstheorie einführen =Alien=
Der neue Vorfahre von $mensch anzeigen
Ein Schweizer instanzieren $bankangestellter
$bankangestellter umbenennen
*/
$mensch = new Mensch();
print $mensch->getName();
$mensch->umbenennen("Sami");
print $mensch->getAlter();
print $mensch->getVorfahre();
$mensch->neueEvolutionstherie("Alien");
print $mensch->getVorfahre();
$bankangestellter = new Schweizer("Tobias","18");
$bankangestellter->umbenennen("Raphael");
