<?php
session_start();
require_once '../autoloader.php';
require_once '../init.php';

if(!isset($_SESSION['login'])) {
    header('location: /');
}

$sub_table = $_GET['table'] ?? '';

$add = new \classes\DataHandler(
    $GLOBALS['connect']->sqlite,
    $sub_table
);

$add->add_data();
header('Location: /');



