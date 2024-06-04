<?php

namespace Controllers;

use Repository\ChirpRepository;
use Views\View;
use Models\Chirp;



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



    public function show($id) 
    {
        // var_dump($id);
        // var_dump($_SERVER['PHP_SELF']);
        // var_dump("Dans la vue ChirpView");

        $chirp = $this->chirpRepository->getChirp($id);
        // var_dump($chirp);
        $view = new View('ChirpView.php', ['chirp' => $chirp]);
        $view->render();

    }



    public function create() 
    {
        var_dump($_REQUEST);
        // $chirp = $this->chirpRepository->newChirp
    }


    public function edit(int $id) 
    {
        var_dump($id);
        var_dump("On est dans l'edit du " . $id);
    }


    public function delete(int $id) 
    {
        var_dump($_POST);
        $chirpDeleted = $this->chirpRepository->deleteChirp($id);
        header('Location: /chirosphere/public/index.php/chirps');
        exit();

    }

}
