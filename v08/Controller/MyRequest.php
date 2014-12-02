<?php
/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 04.11.2014
 * Time: 20:07
 */
error_reporting(0);
require_once("Request.php");

class MyRequest implements Request {

    public function currentPageURL(){
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    public function getParameterNames()
    {
        // TODO: Implement getParameterNames() method.

      $url = $this->currentPageURL();

        return $url;
        //  print_r(parse_url($url));

      // echo "<pre>".parse_url($url, PHP_URL_PATH)."</pre>";
     //   echo parse_url($url, PHP_URL_PATH);

    }

    public function issetParameter($name)
    {
        $url = $this->getParameterNames();
        $argument =  parse_url($url, PHP_URL_QUERY);
        $argument0 = explode("=", $argument);
       if($name ===$argument0[0]){

           echo "<br>ja dieses Ding existiert!";
       }else{
           // echo parse_url($url, PHP_URL_QUERY);

           echo "<br>Dieser Param existiert nicht!";
       }
    }

    public function getParameter($name)
    {
        $url = $this->getParameterNames();
        $argument =  parse_url($url, PHP_URL_QUERY);
        $argument0 = explode("=", $argument);
       return $argument0[1];



        }

    public function getHeader($name)
    {
        $url = $this->getParameterNames();

      //  echo "mein URL ".$url;
        print_r(get_headers($name));
    }
}

$requestObj = new MyRequest();

//$x->getParameterNames();
$requestObj->issetParameter("Page");
echo "<br>".$requestObj->getParameter("Page")."<br><br><br>";

echo "<br>"."<br>".$requestObj->getHeader("http://localhost");