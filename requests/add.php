<?php
require_once '../autoloader.php';

require_once '../init.php';


$tableName = $_GET['tableName'];

$add = new \classes\DataHandler(
    $GLOBALS['connect']->mysqli,
    $tableName
);

$add->addData();
?>

<a href="/">switch to home</a>