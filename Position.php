<?php

class Position {
    private $posX;
    private $posY;

    function __construct($x, $y) {
        $this->posX = $x;
        $this->posY = $y;

        if($this->posX < 0 ) { $this->posX = 0; }
        if($this->posX > 2 ) { $this->posX = 2; }
        if($this->posY < 0 ) { $this->posY = 0; }
        if($this->posY > 2 ) { $this->posY = 2; } 
    }

    function setX($x) { 
        $this->posX = $x;
        if($this->posX < 0 ) { $this->posX = 0; }
        if($this->posX > 2 ) { $this->posX = 2; }
    }

    function setY($y) { 
        $this->posY = $y;
        if($this->posY < 0 ) { $this->posY = 0; }
        if($this->posY > 2 ) { $this->posY = 2; } 
    }

    function getX() { 
        return $this->posX;
    }

    function getY() { 
        return $this->posY;
    }
}

?>