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

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/:id', $chirpController, 'show');

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/:id/edit', $chirpController, 'edit');


$router->addRoute('GET', '/chirposphere/public/index.php/chirps/new', $chirpController, 'create');


$router->route();