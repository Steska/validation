<?php
spl_autoload_register(function($name) {
    if (stripos($name, 'Validation') !== false)
    {
    include_once 'lib/Validation/' . $name . '.php';
    }
    else if (stripos($name, 'Exception') !== false){
        include_once 'lib/Exceptions/' . $name . '.php';
    }else{
        include_once 'lib/' . $name . '.php';
    }
});

