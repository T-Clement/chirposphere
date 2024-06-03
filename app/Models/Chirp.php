<?php

namespace Models;

use DateTime;

class Chirp {
    private int $id;
    private string $author;
    private string $message;
    private DateTime $date;


    public function __construct(int $id, string $author, string $message, string $date) 
    {
        $this->id = $id;
        $this->author = $author;
        $this->message = $message;
        $this->date = new DateTime($date);
    }




    

}