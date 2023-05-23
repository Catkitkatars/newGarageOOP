<?php 
require_once '../database/DataHandler.php';
require_once '../init.php';



$delete = new DataHandler(
    $GLOBALS['connect']->mysqli,
    $_GET['tableName']
);

$delete->deleteData();
?>

<a href="/">switch to home</a>