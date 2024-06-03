<?php

namespace Controllers;

use Repository\ChirpRepository;
class ChirpController
{
    private $chirpRepository;
    public function __construct(ChirpRepository $chirpRepository)
    {
        // require '../config/database.php';
        $this->chirpRepository = $chirpRepository;
    }

    public function index()
    {
        // echo "Dans index du Controller";
        $chirps = $this->chirpRepository->getAllChirps();
        // Transmettre $chirps à la vue
        var_dump($chirps);
        // require_once '../Views/ChirpView.php';
        $viewFilePath = __DIR__ . '/../' .'/../Views/ChirpView.php';
        scandir($viewFilePath);
        if (file_exists($viewFilePath)) {
            require_once $viewFilePath;
        } else {
            echo "Error: View file not found";
        }
        // var_dump($chirps);
    }
}
