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


    public function get_id() {
        return $this->id;
    }

    public function get_author() {
        return $this->author;
    }
    public function get_message() {
        return $this->message;
    }
    public function get_date() {
        return $this->date;
    }

    
    public static function formatDate (DateTime $date) {
        return $date->format("d-m-Y");
    }


}