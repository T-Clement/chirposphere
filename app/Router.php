<?php

namespace App;

class Router
{
    private $routes = []; // rableau pour stocker les routes

    public function addRoute($method, $path, $controller, $action)
    {
        // ajouter une nouvelle route au tableau
        $this->routes[] = [
            'method' => $method,
            'path' => preg_replace('/:[a-zA-Z0-9]+/', '([a-zA-Z0-9]+)', $path), // Remplacer les paramètres par des expressions régulières
            'controller' => $controller,
            'action' => $action,
            'params' => [] // tableau de paramètres matchant le gabarit (ici :id)
        ];
    }

    public function route()
    {
        
        // midlleware to handle DELETE, PUT, INSERT methods send by forms
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        } else {
            $method = $_SERVER['REQUEST_METHOD'];
        }
        
        // récupérer la méthode HTTP et l'URI de la requête
        // $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];




        // traitement à réaliser avant le de retourner les éléments

        // parcourir les routes enregistrées
        // foreach ($this->routes as &$route) {
        foreach ($this->routes as $route) {
            // comparaison method
            // et récupération des paramètres (éléments matchant :id par exemple) dans un tableau
            if ($route['method'] == $method && preg_match('#^' . $route['path'] . '$#', $uri, $matches)) {
                // extraire les paramètres de l'URI
                array_shift($matches);
                $route['params'] = $matches;

                $controller = $route['controller'];
                $action = $route['action'];

                // passer les paramètres à la méthode du contrôleur
                call_user_func_array([$controller, $action], $route['params']);
                return;
            }
        }

        // si aucune route ne correspond, afficher une erreur
        echo "404 - Page not found";
    }
 
    
}
