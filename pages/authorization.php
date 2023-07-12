<?php 
session_start();

if(!empty($_POST['login']) && !empty($_POST['password'])) {
    $db = new SQLite3('../database/login.db');

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
?>

<h3>Authorization</h3>

<form method="POST" action="">
    <p>Login:</p>
    <input type="text" name="login">
    <p>Password:</p>
    <input type="password" name="password">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

