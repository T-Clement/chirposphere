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
        return new Chirp(...$chirp);
    }


    

    public function deleteChirp(int $id) : bool {
        $query = $this->db->prepare("DELETE FROM chirp WHERE id = :id");
        return $query->execute([
            "id" => intval($id)
        ]);
    }



    // id à 0 côté vue / controller lors de la soumission du formulaire
    public function newChirp(Chirp $chirp) : Chirp | bool {
        $query = $this->db->prepare("INSERT INTO chirp (author, message, date) VALUES (:author, :message, :date)");
        $isOk = $query->execute([
            "author" => intval(htmlspecialchars($chirp->get_author())),
            "message" => htmlspecialchars($chirp->get_message()),
            "date" => $chirp->get_date()->format('Y-m-d H:i:s')
        ]);

        if(!$isOk) return false;

        $lastId = $this->db->lastInsertId();
        $insertedChirp = $this->db->prepare("SELECT * FROM chirp WHERE id = :id");
        $insertedChirp->execute([
            'id' => intval($lastId)
        ]);

        return new Chirp(...$insertedChirp->fetch());

    }


}

