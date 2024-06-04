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


    public function edit(int $id) 
    {
        // var_dump($id);
        // var_dump("On est dans l'edit du " . $id);
        // var_dump($_SERVER['REQUEST_METHOD']);
        if($_SERVER['REQUEST_METHOD'] === "GET") {
            $chirp = $this->chirpRepository->getChirp($id);
            $view = new View("UpdateChirpForm.php", ["chirp" => $chirp]);
            $view->render();
        } else if($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            $updatedChirpForm = new Chirp($id, $user, $message, date("Y-m-d H:i:s"));
            // var_dump($updatedChirpForm);
            $chirp = $this->chirpRepository->updateChirp($updatedChirpForm);
            // $view = new View("ChirpView.php", ["chirp" => $chirp]);
            // $view->render();

            // var_dump($chirp);
            
            header('Location: /chirposphere/public/index.php/chirps/' . $chirp->get_id());
            exit();

        }
    }


    public function delete(int $id) 
    {
        var_dump($_POST);
        $chirpDeleted = $this->chirpRepository->deleteChirp($id);
        header('Location: /chirposphere/public/index.php/chirps');
        exit();

    }


    public function add() {
        $view = new View("addChirpForm.php", ["user" => 1]);
        $view->render();
    }

    public function insert() {
        
        extract($_POST);
        $formChirp = new Chirp(0, $user, $message, date("Y-m-d H:i:s"));

        $chirpInserted = $this->chirpRepository->newChirp($formChirp);

        // return view of insertedChirp
        $view = new View("ChirpView.php", ["chirp" => $chirpInserted]);
        $view->render();


    }


}
