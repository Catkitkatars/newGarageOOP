<?php 

require_once 'autoloader.php';

$config = require 'config.php';

$GLOBALS['config'] = $config;
$GLOBALS['connect'] = new classes\Connect($config['sqlite']['path']);