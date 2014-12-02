<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 19:51
 */

require_once "HttpRequest.php";
require_once "HttpResponse.php";
$request = new HttpRequest();
$response = new HttpResponse();
if ($request->issetParameter("Name")) {
    $response->write("Hallo ");
    $response->write($request->getParameter("Name"));
 $response->flush();
}


