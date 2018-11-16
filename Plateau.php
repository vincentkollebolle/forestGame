<?php 
class Plateau { 
   
    
    private $plateau;
    private $joueur;

    public function __construct() {
        $colonne1 = ['J', 'O', 'O'];
        $colonne2 = ['O', 'T', 'O'];
        $colonne3 = ['A', '-', 'P'];
        $this->plateau = [$colonne1, $colonne2, $colonne3];
        $positionJoueur = new Position(0,0);
        $this->joueur = new Joueur($positionJoueur,'vincent');
    }

    public function getJoueur() {
        return $this->joueur;
    }

    public function jeuFini() {
        if($this->plateau[2][2] == 'J') { 
            return TRUE; 
        } else {
            return FALSE;
        }
    }

    public function render() {
        echo "\n";
        foreach($this->plateau as $colonne) {
            foreach($colonne as $case) {
                echo "| ";
                echo $case;
                echo " |";
            }
            echo "\n";
        }
    }

    function zeroObstacle($position) {
        //voir ce qu'il y'a à la position du joueur
        $posX = $position->getX();
        $posY = $position->getY();

        if($this->plateau[$posX][$posY] == 'A') {
            echo "y'a un arbre !";
            return FALSE;
        } else if($this->plateau[$posX][$posY] == 'T') {
            die("t'as perdu, t'es tombé dans un true^^ Looser ! \n");
            return FALSE;
        } else if($this->plateau[$posX][$posY] == 'P') {
            echo "c'est la porte :) si t'as les piece c'est cool sinon tchao!";
            return TRUE;
        } else {
            return TRUE;
        }
    
    }

    function deplacerJoueur($nouvellePosition) {
        $positionInitiale = $this->getJoueur()->getPosition();
        //maj l'ancienne position: TODO
        $plateau[$positionInitiale->getX()][$positionInitiale->getY()] = '-';
        //je mette à jour le nouvel emplacement du joueur
        $plateau[$nouvellePosition->getX()][$nouvellePosition->getY()] = 'J';
        //assigner nouvelle position au joueur
        $this->getJoueur()->setPosition($nouvellePosition);
    }

    public function getCaseGauche($position) {
        return new Position($position->getX(), $position->getY()-1);
    }
    public function getCaseDroite($position) {
        return new Position($position->getX(), $position->getY()+1);
    }

    public function getCaseHaut($position) {
        return new Position($position->getX()-1, $position->getY());
    }
    public function getCaseBas($position) {
        return new Position($position->getX()+1, $position->getY());
    }

    function tourDeJeu() {
        //Demander où veut aller l'utilisateur ?
        echo "---------------------------------------\n";
        echo "*    Où voulez vous aller ? (h,b,g,d)    * \n";
        echo "---------------------------------------\n";
        $input = rtrim(fgets(STDIN));
    
        //calculer la nouvelle position voulu ? 
        $nouvellePosition = new Position(0,0);
        $positionActuelle = $this->getJoueur()->getPosition(); 
        switch ($input) {
            case 'h':
                $nouvellePosition = $this->getCaseHaut($positionActuelle);
                break;
            case 'b':
                $nouvellePosition = $this->getCaseBas($positionActuelle);   
                break;
            case 'g':
                $nouvellePosition = $this->getCaseGauche($positionActuelle);
                break;
            case 'd' : 
                $nouvellePosition = $this->getCaseDroite($positionActuelle);
                break;
            default:
                echo "veuillez taper h,b,g,d ... \n";
        }
    
        //vérifier si le déplacement est possible ?
        if($this->zeroObstacle($nouvellePosition)) {
            echo "déplacement en cours \n";
            $this->deplacerJoueur($nouvellePosition);
        } else {
            echo "deplacement impossible cause obstacle ou hors plateau \n";
        }
    
    }

}