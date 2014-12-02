<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 21:17
 */

require_once "FrontController.php";
require_once "HttpRequest.php";
require_once "HttpResponse.php";
require_once "FileSystemCommandResolver.php";

class FrontContollerIndex {

        function __construct(){
            $resolver = new FileSystemCommandResolver("commands","HelloWorld");
            $f_controller = new FrontController($resolver);
            $request = new HttpRequest();
            $response = new HttpResponse();
            $f_controller->handleRequest($request, $response);
            }
} 