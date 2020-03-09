<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($classname){
    $path = 'Classes/';
    $extension = '.class.php';
    $fullPath = $path.$classname.$extension;

    if (!file_exists($fullPath)) {
       return false;
    }

    include_once $fullPath;
}