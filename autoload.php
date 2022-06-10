<?php

spl_autoload_register(function (string $className){

    $basePath = __DIR__ . DIRECTORY_SEPARATOR;
	$filePath = str_replace('RodyDB\\Core', "$basePath/src", $className);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath); // DIRECTORY_SEPARATOR is a default constant of PHP
    $filePath .= '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        echo "\"$filePath\" not found!";
        exit();
    }
});