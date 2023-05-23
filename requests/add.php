<?php
require_once '../database/DataHandler.php';

require_once '../init.php';


$tableName = $_GET['tableName'];

$add = new DataHandler(
    $GLOBALS['connect']->mysqli,
    $tableName
);

$add->addData();
?>

<a href="/">switch to home</a>