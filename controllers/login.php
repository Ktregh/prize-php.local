<?php
include_once ('../config.php');
include_once (ROOT.'/models/User.php');
if($_POST["enter"])
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    $auth_success = $user->login($login, $password);
    header("Location: /index.php");
    exit;
}