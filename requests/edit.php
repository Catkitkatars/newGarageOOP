<?php 
require_once '../autoloader.php';
require_once '../init.php';




$edit = new DataHandler(
    $GLOBALS['connect']->mysqli,
    $_GET['tableName']
);

$edit->editData();
?>

<a href="/">switch to home</a>