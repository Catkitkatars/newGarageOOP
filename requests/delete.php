<?php 
require_once '../database/DataHandler.php';

$config = require_once '../config.php';

$delete = new DataHandler(
    $config['mysql']['servername'],
    $config['mysql']['username'], 
    $config['mysql']['password'],
    $config['mysql']['dbname'],
    $config['mysql']['tableName'] 
);

$delete->deleteData();
?>

<a href="/">switch to home</a>