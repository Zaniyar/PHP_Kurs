<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 19:50
 */

interface Response {
    public function setStatus($status);
    public function addHeader($name, $value);
    public function write($data);
    public function flush();
}