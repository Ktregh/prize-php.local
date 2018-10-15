<?php

    include_once ('../config.php');
    include_once (ROOT.'/models/User.php');
    $user = new User;
    $bonus = $user->getBonus($_SESSION['login']);