<?php

// use App\DIContainer;
use Controllers\ChirpController;
use Repository\ChirpRepository;

require '../config/database.php';
require_once '../vendor/autoload.php';

define('APP_PATH', realpath(__DIR__ . '/../app'));

$router = new App\Router();

$chirpController = new \Controllers\ChirpController(new ChirpRepository($dbCo));


$router->addRoute('GET', '/chirposphere/public/index.php/chirps', $chirpController, 'index');

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/:id', $chirpController, 'show');

$router->addRoute('GET', '/chirposphere/public/index.php/chirps/new', $chirpController, 'create');


$router->route();