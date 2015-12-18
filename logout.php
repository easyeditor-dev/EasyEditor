<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-18
 * Time: 오전 5:32
 */

session_start();

$_SESSION["login"] = false;
$_SESSION["id"] = -1;

header('Location: ' . $_SERVER['HTTP_REFERER']);
