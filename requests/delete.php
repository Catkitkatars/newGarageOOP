<?php 
require_once '../autoloader.php';
require_once '../init.php';



$delete = new \classes\DataHandler(
    $GLOBALS['connect']->mysqli,
    $_GET['tableName']
);

$delete->deleteData();
?>

<a href="/">switch to home</a>