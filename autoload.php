<?php

// Autoloader mit Sub-Ordner / Namespaces
function autoload(string $className): void {
    $c = (substr($className, -10) == "Controller") ? 'controller/' : '';
    $path = './classes/' . $c . str_replace('\\', '/', $className) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
}
spl_autoload_register('autoload');