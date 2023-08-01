<?php 
require_once '../templates/ob_include.php';

if(!empty($_POST['login']) && !empty($_POST['password'])) {
    $db = new SQLite3('../database/sqlite_database.db');

    $login = $db->escapeString($_POST['login']);
    $password = $db->escapeString($_POST['password']);

    $sql_insert = "INSERT INTO users (name, password) VALUES ('$login', '$password')";

    $db->query($sql_insert);

    header('location: /');
}

$html = ob_include(__DIR__ . '/../templates/registration.phtml', []);

echo ob_include(__DIR__ . '/../templates/doctype.phtml', ['html' => $html]);
?>

