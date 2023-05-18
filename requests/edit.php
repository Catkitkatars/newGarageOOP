<?php 
require_once '../database/DataHandler.php';
require_once '../database/config.php';

$edit = new DataHandler(
    $arrayFromEnter['servername'],
    $arrayFromEnter['username'], 
    $arrayFromEnter['password'],
    $arrayFromEnter['dbname'],
    $arrayFromEnter['tableName'] 
);

$edit->editData();
?>

<a href="/">switch to home</a>