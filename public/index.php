<?php

use App\Router;
use Controllers\ChirpController;
use Repository\ChirpRepository;

require '../config/database.php';
require_once '../vendor/autoload.php';

define('APP_PATH', realpath(__DIR__ . '/../app'));

$router = new Router();

$chirpController = new ChirpController(new ChirpRepository($dbCo));


$router->addRoute('GET', '/chirposphere/public/index.php/chirps', $chirpController, 'index');

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/new', $chirpController, 'add');
$router->addRoute('POST', '/chirposphere/public/index.php/chirps/new', $chirpController, 'insert');

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/:id', $chirpController, 'show');

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/:id/edit', $chirpController, 'edit');
$router->addRoute('POST', '/chirposphere/public/index.php/chirps/:id/edit', $chirpController, 'edit');

$router->addRoute('DELETE', '/chirposphere/public/index.php/chirps/:id', $chirpController, 'delete');



$router->route();