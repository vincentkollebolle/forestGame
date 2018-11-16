<?php
class Joueur {
    private $position;
    private $pseudo;

    function __construct($unePosition, $unPseudo) {
        $this->position = $unePosition;
        $this->pseudo = $unPseudo;
    }

    function getPosition() {
        return $this->position;
    }
    function setPosition($nouvellePos) {
        $this->position = $nouvellePos;
    }
    
    function getPseudo() {
        return $this->pseudo; 
    }

    function setPseudo($string) {
        //si pseudo plus de 18 char gardé que les 18premiers.
        $this->pseudo = $string;
    }
}