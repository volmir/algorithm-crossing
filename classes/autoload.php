<?php

spl_autoload_register('autoload');

function autoload($className) 
{
    $fileName = $className . '.php';
    include $fileName;
}
