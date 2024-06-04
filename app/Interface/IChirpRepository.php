<?php

namespace Interface;

use Models\Chirp;


interface IChirpRepository {
    public function getAllChirps() : array | null;
    public function getChirp(int $id) : Chirp | null ;
    public function deleteChirp(int $id) : bool;
    public function newChirp(Chirp $chirp) : Chirp | bool;

}