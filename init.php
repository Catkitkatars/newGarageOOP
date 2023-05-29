<?php 

require_once 'autoloader.php';

$config = require 'config.php';

$GLOBALS['config'] = $config;
$GLOBALS['connect'] = new Classes\Connect(
    $config['mysql']['servername'],
    $config['mysql']['username'], 
    $config['mysql']['password'],
    $config['mysql']['dbname'],
);