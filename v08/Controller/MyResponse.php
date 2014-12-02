<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 20:08
 */

class MyResponce implements Response {

    public function setStatus($status)
    {
        http_response_code(404);
    }

    public function addHeader($name, $value)
    {
        // TODO: Implement addHeader() method.
    }

    public function write($data)
    {
        // TODO: Implement write() method.
    }

    public function flush()
    {
        // TODO: Implement flush() method.
    }
}