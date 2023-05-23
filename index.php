<?php 
require_once 'database/DataHandler.php';
require_once 'widgets/WidgetCard.php';
require_once 'widgets/MainBanner.php';
require_once 'templates/ob_include.php';

require_once 'init.php';


$banner = new MainBanner(
    $GLOBALS['connect']->mysqli,
    $GLOBALS['config']['mysql']['tableName']['banner_db']
);
$carsData = new DataHandler(
    $GLOBALS['connect']->mysqli,
    $GLOBALS['config']['mysql']['tableName']['cards_db']
);
$motoData = new DataHandler(
    $GLOBALS['connect']->mysqli,
    $GLOBALS['config']['mysql']['tableName']['moto_db']
);


$widgetCardCars = new WidgetCard($carsData->getData($GLOBALS['config']['mysql']['dbname']));
$widgetCardMoto = new WidgetCard($motoData->getData($GLOBALS['config']['mysql']['dbname']));

echo ob_include(__DIR__ .'/templates/index.phtml', ['banner'=>$banner, 'widgetCardCars'=> $widgetCardCars, 'widgetCardMoto'=> $widgetCardMoto]);

