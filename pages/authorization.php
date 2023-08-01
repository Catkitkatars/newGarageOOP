<?php 
session_start();

require_once '../templates/ob_include.php';

if(!empty($_POST['login']) && !empty($_POST['password'])) {
    $db = new SQLite3('../database/sqlite_database.db');

    $login = $db->escapeString($_POST['login']);
    $password = $db->escapeString($_POST['password']);

    $sql_find = "SELECT * FROM users WHERE name = '$login'";

    $confirmed = $db->query($sql_find)->fetchArray(SQLITE3_ASSOC);

    if(!$confirmed) {
        die('your login or pass not found');
    }
    elseif($confirmed['name'] == $login && $confirmed['password'] != $password) {
        die('your login or pass not found');
    }

    if($confirmed['name'] == $login && $confirmed['password'] == $password) {
        $_SESSION["login"] = $login;
        header('location: /');
        die();
    }
}

$html = ob_include(__DIR__ . '/../templates/auth.phtml', []);

echo ob_include(__DIR__ . '/../templates/doctype.phtml', ['html' => $html]);
?>


