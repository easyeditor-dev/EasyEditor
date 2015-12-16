<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-15
 * Time: 오후 9:52
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $filename = $_POST["filename"];

    $code_file = fopen("UserFile/".$filename,"w");

    $code = $_POST["code"];

    echo $filename;

    fwrite($code_file,$code);
    fclose($code_file);
}

