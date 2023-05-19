<?php 
require_once 'database/DataHandler.php';
require_once 'widgets/WidgetCard.php';


$config = require_once 'config.php';


$data = new DataHandler(
    $config['mysql']['servername'],
    $config['mysql']['username'], 
    $config['mysql']['password'],
    $config['mysql']['dbname'],
    $config['mysql']['tableName'] 
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



