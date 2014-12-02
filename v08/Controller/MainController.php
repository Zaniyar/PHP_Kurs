<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 21:08
 */
require_once("MyRequest.php");



class MainController {


    function __construct(){
        $x = new MyRequest();

        //$x->getParameterNames();
        $x->issetParameter("fisch");
        echo $x->getParameter("fisch");

        $x->getHeader("");

    }
}

$x = new MainController();
