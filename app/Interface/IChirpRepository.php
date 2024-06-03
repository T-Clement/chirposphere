<?php

namespace Interface;

use Models\Chirp;


interface IChirpRepository {
    public function getAllChirps();
    public function getChirp(int $id) : Chirp | null ;

}