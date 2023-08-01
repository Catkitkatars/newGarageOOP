<?php 
session_start();
require_once '../autoloader.php';
require_once '../init.php';
require_once '../templates/ob_include.php';

if(!isset($_SESSION['login'])) {
    header('location: /');
}

$sub_table = $_GET['table'] ?? '';
$id = $_GET['id'] ?? '';

$update_card = new \classes\DataHandler(
    $GLOBALS['connect']->sqlite,
    $sub_table
);

$data = $update_card->get_one_data($id);

$html = ob_include(__DIR__ .'/../templates/editCard.phtml', [
    'data' => $data, 
    'table' => $sub_table,
    'id' => $id
]);

echo ob_include(__DIR__ .'/../templates/doctype.phtml', ['html' => $html]);