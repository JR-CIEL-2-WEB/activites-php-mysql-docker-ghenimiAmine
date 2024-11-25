<?php
function afficher_tableau_valeur(array $t): void {

    echo "Tableau trié (passage par valeur) : \n";
    print_r($t); 
}

function afficher_tableau_reference(array &$t): void {
    echo "Tableau trié (passage par référence) : \n";
    print_r($t); 
}
?>
