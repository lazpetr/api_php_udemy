<?php

// This setting will apply globally, since all requests go through this script.
declare(strict_types=1);


//ini_set("display_errors", "On");
require dirname(__DIR__) . "/vendor/autoload.php";

set_exception_handler("ErrorHandler::handleException"); 



$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
// Loads files from .env to PHO $_ENV super global
$dotenv->load();

// echo $_SERVER["REQUEST_URI"];

// echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$parts = explode("/", $path);

// print_r($parts);

$resource = $parts[3];
$id = $parts[4] ?? null;

// echo "<br> Laz \$resource is: $resource <br>";


// echo "Laz \$id is: $id";

// echo "<b>Resource:</b> $resource<br> <b>Id:</b> $id <br>";
// echo "<b>Request Method:</b>", $_SERVER["REQUEST_METHOD"], "<br>";

if ($resource != "tasks") {
  // header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");

  http_response_code(404);

  exit;
}


// echo ("__DIR__ is: " . __DIR__);

// require dirname(__DIR__) . "/api/src/TaskController.php";



header("Content-type: application/json; charset=UTF-8");

// header("Content-type: text/html; charset=UTF-8");

// $database = new Database("localhost", "laz_api_db", "laz_api_db_user", "laz123" );
// $database->getConnection();


// Passing the values from $_ENV Superglobal
$database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASS"] );



$controller = new TaskController;
$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
