<?php 
require_once 'database/DataHandler.php';
require_once 'widgets/WidgetCard.php';
require_once 'database/config.php';

$data = new DataHandler(
    $arrayFromEnter['servername'],
    $arrayFromEnter['username'], 
    $arrayFromEnter['password'],
    $arrayFromEnter['dbname'],
    $arrayFromEnter['tableName'] 
);

$widgetCard = new WidgetCard($data->getData());


function ob_include(): string
{
    extract(func_get_arg(1));
    ob_start();
    require func_get_arg(0);
    return ob_get_clean();
}

echo ob_include('./index.phtml', ['widgetCard'=> $widgetCard]);



