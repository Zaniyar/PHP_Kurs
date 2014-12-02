<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 19:53
 */

interface Command {
    public function execute(Request
                            $request, Response
                            $response);
}
