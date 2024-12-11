<?php
function moyenne($tab) {
    if (count($tab) === 0) {
        return 0; 
    }
    
    $somme = array_sum($tab);
    return $somme / count($tab);
}

function mediane(array $listes) {
    sort($listes);
    $nb_elements = count($listes);
    if ($nb_elements % 2 == 0) {
        $milieu = ($listes[$nb_elements / 2 - 1] + $listes[$nb_elements / 2]) / 2;
    } else {
        $milieu = $listes[floor($nb_elements / 2)];
    }
    echo "La médiane est " . $milieu . "<br>";
}
?>
