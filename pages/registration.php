<?php 

if(!empty($_POST['login']) && !empty($_POST['password'])) {
    $db = new SQLite3('../database/login.db');

    $login = $db->escapeString($_POST['login']);
    $password = $db->escapeString($_POST['password']);

    $sql_insert = "INSERT INTO users (name, password) VALUES ('$login', '$password')";

    $db->query($sql_insert);

    header('location: /');
}
?>

<h3>Ragistration</h3>

<form method="POST" action="">
    <p>Your Login</p>
    <input type="text" name="login">
    <p>Your Password</p>
    <input type="password" name="password">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>