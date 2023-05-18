<?php 
require_once '../database/DataHandler.php';
require_once '../database/config.php';

$delete = new DataHandler(
    $arrayFromEnter['servername'],
    $arrayFromEnter['username'], 
    $arrayFromEnter['password'],
    $arrayFromEnter['dbname'],
    $arrayFromEnter['tableName'] 
);

$delete->deleteData();
?>

<a href="/">switch to home</a>