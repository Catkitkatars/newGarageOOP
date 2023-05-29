<?php 
require_once 'autoloader.php';
require_once 'templates/ob_include.php';
require_once 'init.php';


$banner = new \classes\MainBanner(
    $GLOBALS['connect']->mysqli,
    $GLOBALS['config']['mysql']['tableName']['banner_db']
);
$carsData = new \classes\DataHandler(
    $GLOBALS['connect']->mysqli,
    $GLOBALS['config']['mysql']['tableName']['cards_db']
);
$motoData = new \classes\DataHandler(
    $GLOBALS['connect']->mysqli,
    $GLOBALS['config']['mysql']['tableName']['moto_db']
);


$widgetCardCars = new \classes\WidgetCard($carsData->getData($GLOBALS['config']['mysql']['dbname']));
$widgetCardMoto = new \classes\WidgetCard($motoData->getData($GLOBALS['config']['mysql']['dbname']));

echo ob_include(__DIR__ .'/templates/index.phtml', ['banner'=>$banner, 'widgetCardCars'=> $widgetCardCars, 'widgetCardMoto'=> $widgetCardMoto]);

