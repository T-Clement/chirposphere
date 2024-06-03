<?php

namespace Repository;


use PDO;
use Models\Chirp;
use Interface\IChirpRepository;

class ChirpRepository implements IChirpRepository {

    private PDO $db;


    public function __construct(PDO $db) {
        $this->db = $db;
    }


    public function getAllChirps() : array | null
    {
        $query = $this->db->prepare("SELECT * FROM chirp");
        $query->execute();

        $chirps = $query->fetchAll(PDO::FETCH_FUNC, function($id, $author, $message, $date) {
            
            return new Chirp ($id, $author, $message, $date); 
             
        });

        if(!$chirps) return null;

        return $chirps;
    }

    public function getChirp(int $id) : ?Chirp {
        $query = $this->db->prepare("SELECT * FROM chirp WHERE id = :id");
        $query->execute([
            ":id" => $id
        ]);
    
        $chirp = $query->fetch();
        return new Chirp($chirp->id, $chirp->author, $chirp->message, $chirp->date);
    }


}

