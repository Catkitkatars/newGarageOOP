<?php
require_once '../database/DataHandler.php';
require_once '../database/config.php';

$add = new DataHandler(
    $arrayFromEnter['servername'],
    $arrayFromEnter['username'], 
    $arrayFromEnter['password'],
    $arrayFromEnter['dbname'],
    $arrayFromEnter['tableName'] 
);

$add->addData();
?>

<a href="/">switch to home</a>