<?php

namespace App;

class Router
{
    private $routes = []; // Tableau pour stocker les routes
    public function addRoute($method, $path, $controller, $action)
    {
        // Ajouter une nouvelle route au tableau
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }
    public function route()
    {
        // Récupérer la méthode HTTP et l'URI de la requête
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // require_once '../config/database.php';

        // var_dump($dbCo);


        // Parcourir les routes enregistrées
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['path'] == $uri) {
                $controller = $route['controller'];
                $action = $route['action'];
                $controller->$action();
                return;
            }
        }
        // Si aucune route ne correspond, afficher une erreur
        echo "404 - Page not found";
    }
}
