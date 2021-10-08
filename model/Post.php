<?php

class Post{
    private $text;
    private $image;

    public function __construct($email, $username, $password){
        $this->text = $text;
        $this->image = $image;
    }

    function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
?>