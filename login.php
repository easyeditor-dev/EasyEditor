<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-18
 * Time: 오전 4:43
 */

$conn =  new mysqli("webauthoring.ajou.ac.kr","wa15f","1","WEB_APP_2015F");

session_start();

$_SESSION["login"] = false;
$_SESSION["id"] = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT user FROM easyeditor_users WHERE '$username' = user ";

    $result = $conn->query($sql);

    if ($result->num_rows==0) // user를 찾지 못했을 때
    {

        $result = $conn->query("INSERT INTO easyeditor_users(user,password) VALUES ('$username','$password')");

        $result = $conn->query("SELECT * FROM easyeditor_users WHERE '$username' = user ");

        while($row=$result->fetch_assoc()) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["user"];
        }

        $_SESSION["login"] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    else {
        $result = $conn->query("SELECT * FROM easyeditor_users where '$username'=user AND '$password'=password");

        if($result->num_rows == 1) {
            $_SESSION["login"] = true;

            while($row=$result->fetch_assoc()) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["user"];
            }
        }
        else {
            $_SESSION["login"] = false;
            $_SESSION["fail_reason"] = "PASSWORD";
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $conn->close();
}

