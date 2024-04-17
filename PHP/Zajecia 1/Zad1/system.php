<?php

declare(strict_types=1);

session_start();

include('setup.php');
include('functions.php');

checkLogout();

echo languages();
$lang = setLanguage();
if(getFromData($login, $password))
    echo $lang[checkLogin($login, $password)];
if(logged()) echo content(); else echo loginForm($lang, $login, $password);

?>

