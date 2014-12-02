<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 19:49
 */

interface Request {
    public function getParameterNames();
    public function issetParameter($name);
    public function getParameter($name);
    public function getHeader($name);
}
