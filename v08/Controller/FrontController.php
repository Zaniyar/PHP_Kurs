<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 21:15
 */

require_once "Command.php";
require_once "Request.php";
require_once "Response.php";
class FrontController {
    private $resolver;
    public function __construct(CommandResolver
                                $resolver) {
        $this->resolver = $resolver;
    }
    public function handleRequest(Request $request,
                                  Response $response) {
        $command = $this->resolver-
>getCommand($request);
 $command->execute($request, $response);
 $response->flush();
} }