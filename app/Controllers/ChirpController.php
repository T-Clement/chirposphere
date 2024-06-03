<?php

namespace Controllers;

use Repository\ChirpRepository;
use Views\View;

// require_once '../app/Views/View.php';

class ChirpController
{
    private $chirpRepository;
    public function __construct(ChirpRepository $chirpRepository)
    {
        $this->chirpRepository = $chirpRepository;
    }

    public function index()
    {
        $chirps = $this->chirpRepository->getAllChirps();

        $view = new View('ChirpView.php', ['chirps' => $chirps]);
        $view->render();

    }
}
