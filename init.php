<?php 

require_once __DIR__ . '/database/Connect.php';

$config = require 'config.php';

$GLOBALS['config'] = $config;
$GLOBALS['connect'] = new Connect(
    $config['mysql']['servername'],
    $config['mysql']['username'], 
    $config['mysql']['password'],
    $config['mysql']['dbname'],
);