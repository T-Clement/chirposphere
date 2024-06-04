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
        header('Location: /chirposphere/public/index.php/chirps');
        exit();

    }


    public function add () {
        $view = new View("addChirpForm.php", []);
        $view->render();
    }

    public function insert() {
        // var_dump($_POST);
        // var_dump($data);

        extract($_POST);
        $formChirp = new Chirp(0, $user, $message, date("Y-m-d H:i:s"));
        // var_dump($formChirp);
        $chirpInserted = $this->chirpRepository->newChirp($formChirp);

        $view = new View("ChirpView.php", ["chirp" => $chirpInserted]);
        $view->render();


    }


}
