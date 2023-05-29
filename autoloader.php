<?php 

function my_autoloader($class) {
    require_once __DIR__ .'/'. strtr($class, '\\', '/') . '.php';
    return $class;
}

spl_autoload_register('my_autoloader');