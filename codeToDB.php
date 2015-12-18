<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-18
 * Time: 오전 6:55
 */

$conn =  new mysqli("webauthoring.ajou.ac.kr","wa15f","1","WEB_APP_2015F");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST["id"];
    $filename = $_POST["filename"];
    $lang = $_POST["lang"];
    $date  = date("Y/m/d H:i:s");

    if($userID!=1) {
        $src = $_SERVER["HTTP_REFERER"]."UserFile/".$filename;

        $result = $conn->query("INSERT INTO easyeditor_codes(user_id,lang,src) VALUES($userID,'$lang','$src')");

        printf("Errormessage: %s\n", $conn->error);
    }
    else {
        echo "NOT_LOGIN";
    }
}