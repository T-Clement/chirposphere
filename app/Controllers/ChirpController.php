<?php

namespace Controllers;

use Repository\ChirpRepository;
use Views\View;


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

        $view = new View('ChirpsView.php', ['chirps' => $chirps]);
        $view->render();

    }


    public function show(int $id) {
        
    }

    public function create() {

        var_dump($_REQUEST);
        
        // $chirp = $this->chirpRepository->newChirp
    }





}
