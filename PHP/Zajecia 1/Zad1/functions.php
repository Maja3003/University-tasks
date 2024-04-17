<?php

include('setup.php');

function checkLogout(): void
{
    if (isset($_GET['logout'])) {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php'); // Redirect to avoid POST/GET data persistence
        exit;
    }
}

function languages(): string
{
    global $languages;
    $output = '<div>';
    foreach ($languages as $lang => $labels)
    {
        $output .= '<a href="?lang=' . $lang . '">' . strtoupper($lang) . '</a> ';
    }
    $output .= '</div>';
    return $output;
}

function setLanguage(): array
{
    global $languages;
    // Ustawienie domyślne na angielski, jeśli w sesji nie ma ustawionego języka
    $lang = $_SESSION['lang'] ?? 'eng';

    // Sprawdzenie, czy język został przekazany przez POST lub GET i czy istnieje w dostępnych językach
    if ((isset($_POST['lang']) && array_key_exists($_POST['lang'], $languages)) ||
        (isset($_GET['lang']) && array_key_exists($_GET['lang'], $languages))) {
        $lang = $_POST['lang'] ?? $_GET['lang']; // Ustawienie języka z POST lub GET
        $_SESSION['lang'] = $lang;
    }

    return $languages[$lang];
}

function getFromData(&$login, &$password): bool {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        return true;
    }
    return false;
}

function checkLogin($login, $password): string
{
    global $users;
    if (array_key_exists($login, $users) && $users[$login] == $password) {
        $_SESSION['loggedin'] = true;
        return '4'; // Index for 'logged in' message
    }
    return '3'; // Index for 'please enter correct login and passwd'
}

function logged(): bool
{
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
}

function content(): string
{
    $lang = setLanguage();
    return $lang[4];
}

function loginForm($lang, $login = '', $password = ''): string
{
    $output = '<form method="post">';
    $output .= htmlspecialchars($lang[0]) . ': <input type="text" name="login" value="' . htmlspecialchars($login) .'"><br>';
    $output .= htmlspecialchars($lang[1]) . ': <input type="password" name="password" value="' . htmlspecialchars($password) .'"><br>';
    $output .= '<input type="submit" name="submit" value="' . htmlspecialchars($lang[2]) .'">';
    $output .= '</form>';
    return $output;
}
