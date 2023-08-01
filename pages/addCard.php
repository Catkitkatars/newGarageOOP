<?php 
session_start();
require_once '../autoloader.php';
require_once '../init.php'; 
require_once '../templates/ob_include.php';


if(!isset($_SESSION['login'])) {
    header('location: /');
}

$sub_table = $_GET['table'] ?? '';

$add_card = new \classes\DataHandler(
    $GLOBALS['connect']->sqlite,
    $sub_table,
);

$get_column_names = $add_card->get_column_names();

$html = ob_include(__DIR__ .'/../templates/addCard.phtml', 
['get_column_names' => $get_column_names, 'main_table' => $GLOBALS['config']['sqlite']['main_table'], 'sub_table' => $sub_table]); 

echo ob_include(__DIR__ .'/../templates/doctype.phtml', ['html' => $html]); 






