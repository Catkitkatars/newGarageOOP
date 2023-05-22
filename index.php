<?php 
require_once 'database/DataHandler.php';
require_once 'widgets/WidgetCard.php';
require_once 'widgets/MainBanner.php';
require_once 'templates/ob_include.php';


$config = require_once 'config.php';

$banner = new MainBanner(    
    $config['mysql']['servername'],
    $config['mysql']['username'], 
    $config['mysql']['password'],
    $config['mysql']['dbname'],
    $config['mysql']['tableName']['banner_db']);

$data = new DataHandler(
    $config['mysql']['servername'],
    $config['mysql']['username'], 
    $config['mysql']['password'],
    $config['mysql']['dbname'],
    $config['mysql']['tableName']['cards_db']
);

$widgetCard = new WidgetCard($data->getData());

echo ob_include(__DIR__ .'/templates/index.phtml', ['banner'=>$banner, 'widgetCard'=> $widgetCard]);



