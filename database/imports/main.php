<?php
// Connection details
define('IMPORT_FROM_HOST', 'localhost');
define('IMPORT_FROM_DATABASE', 'triad_weyrdb');
define('IMPORT_FROM_USERNAME', 'root');
define('IMPORT_FROM_PASSWORD', '');

define('IMPORT_TO_HOST', 'localhost');
define('IMPORT_TO_DATABASE', 'triadweyrs');
define('IMPORT_TO_USERNAME', 'root');
define('IMPORT_TO_PASSWORD', '');

use Illuminate\Database\Capsule\Manager as Capsule;

// Add autoloader
require __DIR__.'\..\..\vendor\autoload.php';
spl_autoload_register(function($className) {
    $filename = __DIR__."\\".$className.".php";
    if (file_exists($filename))
    {
        require $filename;
        return true;
    }
    return false;
});

// Set up database connections
$capsule = new Capsule;

$capsule->addConnection([
    "driver" => "mysql",
    "host" => IMPORT_FROM_HOST,
    "database" => IMPORT_FROM_DATABASE,
    "username" => IMPORT_FROM_USERNAME,
    "password" => IMPORT_FROM_PASSWORD
], "from");

$capsule->addConnection([
    "driver" => "mysql",
    "host" => IMPORT_TO_HOST,
    "database" => IMPORT_TO_DATABASE,
    "username" => IMPORT_TO_USERNAME,
    "password" => IMPORT_TO_PASSWORD
], "to");

$capsule->setAsGlobal();
$capsule->bootEloquent();

Member::run();
?>