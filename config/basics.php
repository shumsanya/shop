<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("CONTROLLER_PATH", ROOT."/controllers/");
define("MODEL_PATH", ROOT."/models/");
define("VIEW_PATH", ROOT."/views/");


spl_autoload_register(function ($class){
        $filePath = ROOT . str_replace(['app', '\\'], ['', '/'], $class) . '.php';
        if(file_exists($filePath)) {
            return require_once $filePath;
        }
        throw new Exception('Class -> '.$filePath.' not found: ');
});

