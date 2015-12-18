<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-18
 * Time: 오전 11:34
 */

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $url = $_GET["src"];

    $filename = explode("/UserFile/",$url)[1];
    $lang = explode(".",$filename)[1];

    $code = file_get_contents("UserFile/".$filename);

    //echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
    echo $code."<+>".$lang;

}
