<?php 
session_start();
require_once '../autoloader.php';
require_once '../init.php';

if(!isset($_SESSION['login'])) {
    header('location: /');
}

$id = $_GET['id'];
$sub_table = $_GET['table'];


$edit = new \classes\DataHandler(
    $GLOBALS['connect']->sqlite,
    $sub_table
);

$edit->update_data($id);
header('location: /');
?>