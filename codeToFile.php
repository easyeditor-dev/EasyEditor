<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-15
 * Time: 오후 9:52
 */

global $dbxClient;
require_once "dropbox-sdk/Dropbox/autoload.php";

use \Dropbox as dbx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];

    session_start();

    if($_SESSION["token"]) {
        $dbxClient = new dbx\Client($_SESSION["token"], "PHP-Example/1.0");
    }

    $code_file = fopen("UserFile/".$filename,"w");

    $code = $_POST["code"];

    fwrite($code_file,$code);

    echo $filename;

    if($dbxClient) {
        $result = $dbxClient->uploadFile("/UserFile/".$filename, dbx\WriteMode::add(), $code_file);

    }
    fclose($code_file);
    //print_r($result);
}

