<h2>Edit Card</h2>

<?php 
require_once '../database/DataHandler.php';
require_once '../init.php';
require_once '../templates/ob_include.php';

$colunmName = new DataHandler(
    $GLOBALS['connect']->mysqli,
    $_GET['tableName']
);

$placeholderData = $colunmName->getOneData();
$getColumnNames = $colunmName->getColumnNames($GLOBALS['config']['mysql']['dbname']);


echo ob_include(__DIR__ .'/../templates/editCard.phtml', ['placeholderData' => $placeholderData, 'getColumnNames' => $getColumnNames]);