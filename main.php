
<?php 
include "Position.php";
include "Plateau.php";
include "Joueur.php";

$plateau = new Plateau();
 

while($plateau->jeuFini() != TRUE) {
    $plateau->render();
    $plateau->tourDeJeu(); 
}



