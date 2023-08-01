<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>Cards</title>
</head>
<body>
<h1>Garage</h1>

<?php
require_once 'autoloader.php';
require_once 'templates/ob_include.php';
require_once 'init.php';

session_start();

$banner = new \classes\MainBanner(
    $GLOBALS['connect']->sqlite,
    $GLOBALS['config']['sqlite']['banner_table']
);

$data = new \classes\DataHandler(
    $GLOBALS['connect']->sqlite,
    $GLOBALS['config']['sqlite']['sub_tables'],
);

$widget_card = new \classes\WidgetCard(
    $GLOBALS['connect']->sqlite,
    $data->get_datas()
);

$login = $_SESSION['login'] ?? false;

echo $banner->render();

if($login) {
    echo ob_include(__DIR__ . '/templates/login.phtml', ['login' => $login]);
    echo $widget_card->render($login);
}
else 
{
    echo ob_include(__DIR__ . '/templates/no_login.phtml', []);
    echo $widget_card->render($login);
}



?>
</body>
</html>
<script src='JS/like.js'></script>
