<?php


class Chirp {
    private string $author;
    private string $message;
    private DateTime $date;


    public function __construct(string $author, string $message, DateTime $date) 
    {
        $this->author = $author;
        $this->message = $message;
        $this->date = $date;
    }




    

}