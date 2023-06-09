<h2>Add New Car</h2>

<?php 
require_once '../autoloader.php';
require_once '../init.php';
require_once '../templates/ob_include.php';

$tableName = $_GET['tableName'] ?? '';


$addCard = new \classes\DataHandler(
    $GLOBALS['connect']->mysqli,
    $tableName
);

$getColumnNames = $addCard->getColumnNames($GLOBALS['config']['mysql']['dbname']);

echo ob_include(__DIR__ .'/../templates/addCard.phtml', ['getColumnNames' => $getColumnNames, 'tableName' => $tableName]);

