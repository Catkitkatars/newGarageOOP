<?php 
function my_autoloader($class) {
    include 'classes/' . $class . '.php';
    return $class;
}

spl_autoload_register('my_autoloader');